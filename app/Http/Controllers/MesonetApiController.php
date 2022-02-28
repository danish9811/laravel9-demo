<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Http;
use OTIFSolutions\CurlHandler\Curl;
use OTIFSolutions\Laravel\Settings\Models\Setting;
use Response;

class MesonetApiController extends Controller {

    private string $latitude = '31.520370';
    private string $longitude = '74.358749';

    public function __construct() {
        Setting::set('token', 'ce770603a6654e2bb78695214ca6245b');
    }

    /**
     * <b>getMesonetApiResultViaHttp() : Respose</b>
     * <p>this method will fetch the current weather by hitting api https://api.synopticdata.com/v2/stations/metadata </p>
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function getMesonetApiResultViaHttp() {

        try {
            $response = json_decode(
                Http::get('https://api.synopticdata.com/v2/stations/metadata?', [
                    'token' => Setting::get('token'),
                    'radius' => $this->latitude . ',' . $this->longitude . ',10'
                ])
                , true, 512, JSON_THROW_ON_ERROR);

        } catch (Exception $exception) {
            return Response::json([
                'code' => 400,
                'message' => 'Error fetching weather',
                'description' => $exception->getMessage()
            ]);
        }
        return $response;
    }

    public function getMesonetApiResultViaOtifCurl() {
        try {
            $response = Curl::Make()
                ->url('https://api.synopticdta.com/v2/stations/metadata')
                ->params([
                    'token' => Setting::get('token'),
                    'radius' => $this->latitude . ',' . $this->longitude . ',10'
                ])
                ->execute();

        } catch (Exception $exception) {
            return Response::json([
                'code' => 400,
                'message' => 'error fetching weather',
            ]);
        }

        return $response;
    }

    public function getMesonetApiResultViaCurl() {

        $curl = curl_init();
        $token = Setting::get('token');
        $queryString = "token={$token}&radius={$this->latitude},{$this->longitude},10&limit=10";

        try {
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.synopticdata.com/v2/stations/metadata?' . $queryString,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
            ));

            $response = curl_exec($curl);

        } catch (Exception $exception) {
            return Response::json([
                'code' => 400,
                'message' => 'Error fetching weather',
                'description' => $exception->getMessage()
            ]);
        }

        curl_close($curl);
        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);

    }


    public function __destruct() {
        // Setting::remove('token');
    }

}

<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use OTIFSolutions\CurlHandler\Curl;
use OTIFSolutions\Laravel\Settings\Models\Setting;
use Response;

class MesonetApiController extends Controller {

    private string $latitude = '31.520370';
    private string $longitude = '74.358749';
    private string $mesonetApiToken;

    public function __construct() {
        Setting::set('mesonet_api_token', 'ce770603a6654e2bb78695214ca6245b');
    }




    /**
     * <b>getMesonetApiResultViaHttp() </b>
     * <p>this method will fetch the current weather by hitting api endpoint with HTTP Method
     * <a href="https://api.synopticdata.com/v2/stations/metadata?">https://api.synopticdata.com/v2/stations/metadata?</a> </p>
     * @return JsonResponse|mixed
     */
    public function getMesonetApiResultViaHttp() {
        try {
            $response = json_decode(
                Http::get('https://api.synopticdata.com/v2/stations/metadata?', [
                    'token' => Setting::get('mesonet_api_token'),
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

    /**
     * <b>getMesonetApiResultViaOtifCurl()</b>
     * <p>this method will fetch the current weather by hitting api endpoint library with Otif Curl library
     * <a href="https://api.synopticdata.com/v2/stations/metadata?">https://api.synopticdata.com/v2/stations/metadata?</a> </p>
     * @return JsonResponse|mixed
     */
    public function getMesonetApiResultViaOtifCurl() {
        try {
            $response = Curl::Make()
                ->url('https://api.synopticdata.com/v2/stations/metadata')
                ->params([
                    'token' => Setting::get('mesonet_api_token'),
                    'radius' => $this->latitude . ',' . $this->longitude . ',10'
                ])
                ->execute();
        } catch (Exception $exception) {
            return Response::json([
                'code' => 400,
                'message' => 'error fetching weather',
                'description' => $exception->getMessage()
            ]);
        }

        return $response;
    }

    /**
     * <b>getMesonetApiResultViaOtifCurl() </b>
     * <p>this method will fetch the current weather by hitting api endpoint library with Curl
     * <a href="https://api.synopticdata.com/v2/stations/metadata?">https://api.synopticdata.com/v2/stations/metadata?</a> </p>
     * @return JsonResponse|mixed
     * @throws \JsonException
     */
    public function getMesonetApiResultViaCurl() {
        $curl = curl_init();

        $query = http_build_query([
            'token' => Setting::get('mesonet_api_token'),
            'radius' => $this->latitude . ',' . $this->longitude . ',10',
            'limit' => 10
        ]);

        try {
            curl_setopt_array($curl, [
                CURLOPT_URL => 'https://api.synopticdata.com/v2/stations/metadata?' . $query,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
            ]);

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

}

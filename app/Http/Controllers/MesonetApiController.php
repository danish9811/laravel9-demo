<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use OTIFSolutions\CurlHandler\Curl;
use OTIFSolutions\Laravel\Settings\Models\Setting;

class MesonetApiController extends Controller {

    private string $latitude = '31.520370';
    private string $longitude = '74.358749';


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
            return response()->json([
                'message' => 'Error fetching weather',
                'description' => $exception->getMessage()
            ], 400);
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
            return response()->json([
                'message' => 'error fetching weather',
                'description' => $exception->getMessage()
            ], 400);
        }

        return $response;
    }

    /**
     * <b>getMesonetApiResultViaOtifCurl() </b>
     * <p>this method will fetch the current weather by hitting api endpoint library with Curl
     * <a href="https://api.synopticdata.com/v2/stations/metadata?">https://api.synopticdata.com/v2/stations/metadata?</a> </p>
     * @return JsonResponse
     */
    public function getMesonetApiResultViaCurl(): JsonResponse {
        // $this->paramCheck();

        // todo : handle errors here, the response must be in json

        $curl = curl_init();

        try {
            curl_setopt_array($curl, [

                CURLOPT_URL => 'https://api.synopticdata.com/v2/stations/metadata?' . http_build_query([
                        'token' => Setting::get('mesonet_api_token'),
                        'radius' => $this->latitude . ',' . $this->longitude . ',10',
                        'limit' => 10
                    ]),

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
            return response()->json([
                'message' => 'Error fetching weather',
                'description' => $exception->getMessage()
            ], 400);
        }

        curl_close($curl);

        // return response($response, 512, true, JSON_THROW_ON_ERROR);
         return response()->json($response, 200);
    }

    private function paramCheck() {
        if (!$this->latitude && $this->longitude && isset($this->getToken)) {
            return response()->json([
                'message' => 'the parameters are not set',
                'description' => 'ensure that some of the parameters in the query string are valid'
            ], 400);
        }
        return true;
    }

}

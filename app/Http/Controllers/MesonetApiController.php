<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use OTIFSolutions\CurlHandler\Curl;
use OTIFSolutions\Laravel\Settings\Models\Setting;

class MesonetApiController extends Controller {

    /**
     * <b>getMesonetApiResultViaHttp() </b>
     * <p>this method will fetch the current weather by hitting api endpoint with HTTP Method
     * <a href="https://api.synopticdata.com/v2/stations/metadata?">https://api.synopticdata.com/v2/stations/metadata?</a> </p>
     * @return JsonResponse
     */
    public function getMesonetApiResultViaHttp() {
        try {
            $response = json_decode(
                Http::get(env('MESONET_API_URL'), [
                    'token' => Setting::get('mesonet_api_token'),
                    'radius' => Setting::get('location_radius')
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
     * @return JsonResponse
     */
    public function getMesonetApiResultViaOtifCurl() {
        try {
            $response = json_decode(Curl::Make()
                ->url(env('MESONET_API_URL'))
                ->params([
                    'token' => Setting::get('mesonet_api_token'),
                    'radius' => Setting::get('location_radius')
                ])
                ->execute(), true, 512, JSON_THROW_ON_ERROR);
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
    public function getMesonetApiResultViaCurl() {
        $curl = curl_init();

        try {
            curl_setopt_array($curl, [
                CURLOPT_URL => env('MESONET_API_URL') . http_build_query([
                        'token' => Setting::get('mesonet_api_token'),
                        'radis' => Setting::get('location_radius')
                    ]),

                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
            ]);

            $response = json_decode(curl_exec($curl), true, 512, JSON_THROW_ON_ERROR);
        } catch (Exception $exception) {
            return response()->json([
                'message' => 'Error fetching weather',
                'description' => $exception->getMessage()
            ], 400);
        }

        curl_close($curl);
        return $response;
    }
}
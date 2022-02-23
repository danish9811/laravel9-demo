<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use OTIFSolutions\CurlHandler\Curl;
use OTIFSolutions\CurlHandler\Exceptions\CurlException;

class WeatherMapController extends Controller {

    private $lat = '31.520370';
    private $lon = '74.358749';
    private $appId = '90a6ab89199947a53f4f3df4cbb52fa8';

    /**
     * <b>usingHttp()</b>
     * call to weather api via http method, generates response, converts it to an array and then pass it to a view as $data variable
     * @return Factory|View
     */
    public function usingHttp() {

        $data = json_decode(
            Http::get('api.openweathermap.org/data/2.5/weather?',
                [
                    'lat' => $this->lat,
                    'lon' => $this->lon,
                    'appid' => $this->appId
                ]
            ), true, 512, JSON_THROW_ON_ERROR);

        return view('firstResult', ['data' => $data]);
    }

    /**
     * <b>usingHttp()</b>
     * call to weather api via curl lib written ob otif, generates response, converts it to an array and then pass it to a view as $data variable
     * @return Factory|View
     */
    public function usingOtifCurl() {
        try {
            $response = Curl::Make()
                ->GET
                ->url("api.openweathermap.org/data/2.5/weather?lat={$this->lat}&lon={$this->lon}&appid={$this->appId}")
                ->execute();

        } catch (CurlException $curlException) {
            return $curlException->getCurlErrors();
        }

        return view('secondResult', ['data' => $response]);
    }

    /**
     * <b>usingCurl()</b>
     * call to weather api via curl, generates response, converts it to an array and then pass it to a view as $data variable
     * @return Factory|View
     */
    public function usingCurl() {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "api.openweathermap.org/data/2.5/weather?lat={$this->lat}&lon={$this->lon}&appid={$this->appId}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);
        curl_close($curl);


        return view('thirdResult', [
            'data' => json_decode($response, true, 512, JSON_THROW_ON_ERROR)
        ]);

    }

    private function printFormattedArray(array $array): void {
        echo "<br><pre>";
        print_r($array);
        echo "</pre><br>";
    }

}

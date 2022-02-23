<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class WeatherMapController extends Controller {

    private $lat = '31.520370';
    private $lon = '74.358749';
    private $appId = '90a6ab89199947a53f4f3df4cbb52fa8';

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

    public function secondMethod() {
        return 'second method used';
    }

    public function thirdMethod() {
        return 'third method used';
    }

}

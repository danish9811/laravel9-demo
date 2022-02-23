<?php

namespace App\Http\Controllers;

use OTIFSolutions\CurlHandler\Curl;

class GetApiResults extends Controller {

    public function getResultwithPhp() : void {
        $radius = 'KHOU,50';
        $limit = 10;
        $vars = 'air_temp';
        $within = 100;
        $accessToken = 'ce770603a6654e2bb78695214ca6245b';

        $apiString = "{$radius}&limit={$limit}&vars={$vars}&within={$within}&token={$accessToken}";
        $response = file_get_contents("https://api.synopticdata.com/v2/stations/latest?radius={$apiString}");
        $data = json_decode($response, true, JSON_THROW_ON_ERROR);

        echo "<br><pre>";
        print_r($data);

    }

    public function getResultWithCurl(): void {

        $curl = curl_init();

        $radius = 'KHOU,50';
        $limit = 10;
        $vars = 'air_temp';
        $within = 100;
        $accessToken = 'ce770603a6654e2bb78695214ca6245b';
        $queryString = "https://api.synopticdata.com/v2/stations/latest?radius={$radius}&limit={$limit}&vars={$vars}&within={$within}&token={$accessToken}";

        curl_setopt_array($curl, array(
            CURLOPT_URL => $queryString,
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
        echo $response;

    }

    public function getResultWithHttp(): void {
        // todo : write code for http method and get api results by hitting the endoipoint with certain paramters
    }

}

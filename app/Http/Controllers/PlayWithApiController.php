<?php

namespace App\Http\Controllers;

class PlayWithApiController extends Controller {

    /**
     * curl with get Method
     * learning curl by watching the perfect web solution videos
     * https://youtu.be/nWA6PXuJpb0
     *
     * these curl methods written inside the method are necessarily needed for the curl
     * visit : https://www.php.net/manual/en/function.curl-init.php
     *
     * @return string | json
     * @author danish mehmood
     **/
    public function playWithGetCurl() {

        $header = [
            'Accept: application/json',
            'Content-Type: application/json'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://jsonplaceholder.typicode.com/users");
        // curl_setopt($ch, CURLOPT_URL, "https://api.github.com/users/hadley/orgs");

        // do a post
        curl_setopt($ch, CURLOPT_POST, false);

        // if this is post request, we have to pass some paramters as array
        // curl_setopt($ch, CURLOPT_POSTFIELDS, "id=333");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // return the output of the curl_exec(), instead of outputting it directly

        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);    // the header information

        $result = curl_exec($ch);

        curl_close($ch);

        // print_r(json_encode($result));
        // print_r(json_decode($result));
        // print_r($result);
        // echo json_decode($result);   // array to string conversion

        $result = json_decode($result);
        // $this->printFormattedArray($result);

    }

    public function playWithPostCurl() {

        $header = [
            'Accept: application/json',
            'Content-Type: application/json'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://jsonplaceholder.typicode.com/posts/");
        // curl_setopt($ch, CURLOPT_URL, "https://api.github.com/users/hadley/orgs");

        // do a post
        curl_setopt($ch, CURLOPT_POST, false);

        $params = [
            'userId' => 10,
            'title' => 'practicing the code with APIs',
            'body' => 'now im writing method where i post data to jsonplaceholder.typicode.com websites'
        ];

        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

        // todo : add more fields here with setopt_array()

        // curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // return the output of the curl_exec(), instead of outputting it directly

        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);    // the header information

        $result = curl_exec($ch);

        curl_close($ch);

        // print_r(json_encode($result));
        // print_r(json_decode($result));
        // print_r($result);
        // echo json_decode($result);   // array to string conversion

        $result = json_decode($result);
        // dd($result);

        // showing null, error
        $this->printFormattedArray($result);

    }

    public function postCurlPostmanCode() {
        $curl = curl_init();

        $params = [
            'userId' => '21',
            'title' => 'the title demo one',
            'body' => 'the body of the code'
        ];

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://jsonplaceholder.typicode.com/posts/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $params,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
        // print_r(json_encode($response));
        // print_r(json_decode($response));
        // $this->printFormattedArray($response);
    }

    private function printFormattedArray(array $array): void {
        echo "<br><pre>";
        print_r($array);
        echo "</pre><br>";
    }

}

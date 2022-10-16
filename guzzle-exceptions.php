<?php

require '../vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

$client = new Client(['base_uri' => 'https://httpbin.org/']);

try {
//    $response = $client->request('GET', 'cookies1');

    $response = $client->request('GET', 'status/504');
    echo $response->getBody() . "\r\n";

} catch (ClientException $e) {

    echo $e->getCode();
    echo $e->getMessage();

} catch (ServerException $e) {

    echo $e->getCode();
    echo $e->getMessage();
}
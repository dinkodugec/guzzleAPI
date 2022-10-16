<?php

require '../vendor/autoload.php';
use GuzzleHttp\Client;

$client = new Client(['base_uri' => 'http://jsonplaceholder.typicode.com/']);

//$response = $client->request('POST', 'posts', [
//    'form_params' => [
//        'userId' => 11,
//        'title' => 'Guzzle Post',
//        'body' => 'Hello Guzzle first post'
//    ]
//]);

$response = $client->request('POST', 'posts', [
    'json' => [
        'userId' => 11,
        'title' => 'Guzzle Post',
        'body' => 'Hello Guzzle first post'
    ]
]);

echo $response->getBody() . "\r\n";
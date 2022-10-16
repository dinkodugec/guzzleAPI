<?php

require '../vendor/autoload.php';
use GuzzleHttp\Client;

$client = new Client(['base_uri' => 'http://jsonplaceholder.typicode.com/']);

//$response = $client->request('GET', 'posts?userId=2');
//
//$response = $client->request('GET', 'posts', ['query' => 'userId=2']);

$response = $client->request('GET', 'posts', [
    'query' => ['userId' => '3']
]);

echo $response->getBody() . "\r\n";
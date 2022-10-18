<?php
require '../../../../vendor/autoload.php';
use GuzzleHttp\Client;


$client = new Client(['base_uri' => 'http://jsonplaceholder.typicode.com/']);

$response = $client->request('GET', 'posts/2');

echo $response->getStatusCode() . "\n\r";
echo $response->getReasonPhrase() . "\n\r";
echo $response->getProtocolVersion() . "\n\r";

echo $response->getBody();


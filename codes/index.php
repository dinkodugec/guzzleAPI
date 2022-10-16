<?php

require '../vendor/autoload.php';
use GuzzleHttp\Client;

$client = new Client(['base_uri' => 'http://jsonplaceholder.typicode.com/']);

$response = $client->request('GET', 'posts/1');

/* var_dump($response); */

echo $response->getBody();


$response1 = $client->get('posts/1');
echo $response1->getBody() . "\r\n";
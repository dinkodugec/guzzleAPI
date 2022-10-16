<?php

require '../vendor/autoload.php';
use GuzzleHttp\Client;

$client = new Client(['base_uri' => 'http://jsonplaceholder.typicode.com/']);

$promise1 = $client->getAsync('posts/1');
$promise2 = $client->getAsync('posts/2');

$promises = [$promise1, $promise2];

//$promise = [
//    $client->getAsync('posts/1'),
//    $client->getAsync('posts/2')];

$results = GuzzleHttp\Promise\settle($promises)->wait();

foreach ($results as $result) {
    echo $result['value']->getBody() . "\r\n";
}
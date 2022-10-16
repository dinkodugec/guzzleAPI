asynchronousRequest.php<?php

require '../../../../vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;

$client = new Client(['base_uri' => 'http://jsonplaceholder.typicode.com/']);

$promise = $client->requestAsync('GET', 'posts/1');

$promise = $client->requestAsync('GET', 'posts/1');

$users_promise = $client->getAsync('posts/2');

$request = new Request('GET', 'posts/3');
$promise = $client->sendAsync($request);

$promise->then(
  function (Response $res){
    echo $res->getStatusCode(). "\r\n";
    echo $res->getBody();
  },
     function (RequestException $e){
      echo $e->getMessage();
     }
);

$promise->wait();
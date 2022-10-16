<?php

require '../vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;

$client = new Client(['base_uri' => 'https://httpbin.org/', 'cookies' => true]);

$domain = 'httpbin.org';
$values = ['user_token' => '2c2esd'];

$cookiesJar = CookieJar::fromArray($values, $domain);

$response = $client->request('GET', 'cookies', [
    'cookies' =>$cookiesJar
]);

print_r($cookiesJar->toArray());

echo $response->getBody();
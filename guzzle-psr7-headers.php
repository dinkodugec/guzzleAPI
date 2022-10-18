<?php
require '../../../../vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;

$client = new Client(['base_uri' => 'http://jsonplaceholder.typicode.com/']);
$response = $client->request('GET', 'users/1');

$headers = $response->getHeaders();
print_r($headers);

foreach ($headers as $header => $value) {
    echo "$header: " . implode(',' , $value) . "\r\n";
}

if ($response->hasHeader('Content-length'))
    echo "Content exist \r\n";

if ($response->hasHeader('content-type')) {
    $parsed_header = Psr7\parse_header($response->getHeader('content-type'));
    print_r($parsed_header);
}
<?php

require '../vendor/autoload.php';
use GuzzleHttp\Client;

// Uploading file contents
$client = new Client();

$response = $client->request('POST', 'http://httpbin.org/post', [
    'multipart' => [
        [
            'name'     => 'Test File',
            'contents' => fopen('testfile.txt', 'r')
        ],
    ]
]);

echo $response->getBody();
<?php
require '../../../../vendor/autoload.php';
use GuzzleHttp\Psr7\Request;

$request = new Request('GET', 'http://jsonplaceholder.typicode.com/users/1');

echo $request->getMethod() . "\r\n"; // GET
echo $request->getUri() . "\r\n"; // http://jsonplaceholder.typicode.com/users/1
echo $request->getUri()->getScheme() . "\r\n"; // http

echo $request->getUri()->getHost() . "\r\n";
echo $request->getUri()->getPort() . "\r\n";
echo $request->getUri()->getPath() . "\r\n";
echo $request->getUri()->getQuery() . "\r\n";
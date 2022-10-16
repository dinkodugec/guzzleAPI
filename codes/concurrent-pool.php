<?php
require '../vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Pool;
use GuzzleHttp\Psr7\Request;

// Using Pool when you do not know the number of requests you are sending
$client = new Client(['base_uri' => 'http://jsonplaceholder.typicode.com/posts/']);

$requests = function ($total) use($client) {
    for ($i = 1; $i <= $total; $i++) {
        $req = new Request('GET', $i);
        yield $req;
    }
};

$pool = new Pool($client, $requests(10), [
    'concurrency' => 5,
    'fulfilled' => function ($response, $index) {
        // this is delivered each successful response
        echo $index . "\r\n";
        echo $response->getBody();
    },
    'rejected' => function ($reason, $index) {
        // this is delivered each failed request
        echo 'sorry' . "\n";
    },
]);

// Initiate the transfers and create a promise
$promise = $pool->promise();
//
//// Force the pool of requests to complete.
$promise->wait();


// Pool::batch
$pool_batch = Pool::batch($client, $requests(10));

foreach ($pool_batch as $pool => $res) {

    if ($res instanceof RequestException) {
        echo 'sorry';
        continue;
    }

    echo $res->getBody();
}
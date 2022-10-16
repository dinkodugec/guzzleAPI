<?php
require '../vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

$client = new Client(['base_uri' => 'http://jsonplaceholder.typicode.com/']);
$user_id = $_GET['userId'];

?>
<h3>List of Posts</h3>
<?php

$response_posts = $client->request('GET', 'posts', [
    'query' => ['userId' => $user_id]
]);

$posts = $response_posts->getBody();
echo $posts;

?>
<h3>List of Albums</h3>

<?php

$response_albums = $client->request('GET', 'albums', [
    'query' => ['userId' => $user_id]
]);

$albums = $response_albums->getBody();
echo $albums;
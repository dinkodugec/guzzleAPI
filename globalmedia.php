<?php

require '../vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Response;

$client = new Client(['base_uri' => 'http://jsonplaceholder.typicode.com/']);

$users_promise = $client->getAsync('users');

$users_promise->then(
    function (Response $res) {
        $users = $res->getBody();

        foreach (json_decode($users) as $user) {
            ?>
<h2><a href="globomantics-media-posts.php?userId=<?php echo $user->id?>"><?php echo $user->name?></a></h2>
<?php

            print_r($user);
        }

    },
    function (RequestException $e) {
        echo $e->getMessage();
    }
);

$users_promise->wait();
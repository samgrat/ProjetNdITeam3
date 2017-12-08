<?php
header('Content-Type: application/json');
require '../vendor/autoload.php';
require 'config.php';
require 'functions.php';


use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

$app = new \Slim\App;

/* USER */
$app->post('/user/{name}', function ($request, $response, $args) {
    $parsedBody = $request->getParsedBody();
    var_dump($parsedBody);
    // $req_body = $_POST;
    $res = add_user_to_db($parsedBody, $conn);
    echo $res;

});

// $app->delete('/user/{pseudo}', function ($request, $response, $args) {
//     $parsedBody = $request->getParsedBody();
//     var_dump($parsedBody);
// });

// $app->info('/user/{id}', function ($request, $response, $args) {
//     $parsedBody = $request->getParsedBody();
//     var_dump($parsedBody);
// });


/* */ 



$app->run();



?>
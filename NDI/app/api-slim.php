<?php
require '../vendor/autoload.php';

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

$app = new \Slim\App;
$app->add(function (ServerRequestInterface $request, ResponseInterface $response, callable $next) {

	$method = $request->getMethod();

	echo $request->isGet();

    return $response->withJson("lol");
});


$app->run();



?>
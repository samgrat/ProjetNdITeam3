<?php
require_once("../vendor/autoload.php");

$loader = new Twig_Loader_Filesystem("views/");

$twig = new Twig_Environment($loader,
			      array("debug" => true));

$args["text"] = "Hello";

$page = "index";

echo $twig->render("index.html", $args);

?>
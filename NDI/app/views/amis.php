<?php
require_once("../vendor/autoload.php");

$loader = new Twig_Loader_Filesystem("views/");

$twig = new Twig_Environment($loader,
			      array("debug" => true));

$args["login"] = "LOGIN";


$page = "amis";

echo $twig->render("amis.html", $args);

?>
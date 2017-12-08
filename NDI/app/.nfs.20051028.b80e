<?php
require_once("../vendor/autoload.php");
session_start();

$loader = new Twig_Loader_Filesystem("views/");

$twig = new Twig_Environment($loader,
			      array("debug" => true));

$args["login"] = "LOGIN";


$page = "index";

echo $twig->render("urgence.html", $args);

?>

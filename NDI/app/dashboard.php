<?php
require_once("../vendor/autoload.php");

$loader = new Twig_Loader_Filesystem("views/");

$twig = new Twig_Environment($loader,
			      array("debug" => true));

$args["login"] = "LOGIN";


$page = "dashboard";

echo $twig->render("dashboard.html", $args);

?>
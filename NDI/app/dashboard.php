<?php
require_once("../vendor/autoload.php");

$loader = new Twig_Loader_Filesystem("views/");

$twig = new Twig_Environment($loader,
			      array("debug" => true));

$args["login"] = "LOGIN";
$args["tabSoiree"] = array(
	array("nom" => "soire boloss", "date" => "2/12/2017"),
	array("nom" => "soiree jeudi", "date" => "2/12/2017"),
	array("nom" => "ricm party", "date" => "2/12/2017")
);

$page = "dashboard";

echo $twig->render("dashboard.html", $args);

?>
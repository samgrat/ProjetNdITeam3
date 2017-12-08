<?php
session_start();

require_once("../vendor/autoload.php");

$loader = new Twig_Loader_Filesystem("views/");

$twig = new Twig_Environment($loader,
			      array("debug" => true));

if(isset($_SESSION["pseudo"])){
	$args["login"] = $_SESSION["pseudo"];
}

$args["points"] = array(
	array("lng" => 50.0, "lat" => 50.0, "rayon" => 50000),
	array("lng" => 70.0, "lat" => 50.0, "rayon" => 50000),
	array("lng" => 30.0, "lat" => 50.0, "rayon" => 50000)
);


echo $twig->render("index.html", $args);

?>

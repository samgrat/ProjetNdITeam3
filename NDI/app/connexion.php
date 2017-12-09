<?php
require_once("../vendor/autoload.php");
session_start();

$loader = new Twig_Loader_Filesystem("views/");

$twig = new Twig_Environment($loader,
			      array("debug" => true));


$args["login"] = "LOGIN";

$args = array();
if(isset($_GET["error"])){
	$args["message"] = $_GET["error"];
}
else if(isset($_GET["success"])){
	$args["message"] = $_GET["success"];
}

echo $twig->render("connexion.html", $args);

?>

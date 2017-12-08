<?php
require_once("../vendor/autoload.php");

$loader = new Twig_Loader_Filesystem("views/");

$twig = new Twig_Environment($loader,
			      array("debug" => true));

$args["text"] = "Hello";
$args["login"] = "LOGIN";

$args = array();
if(isset($_GET["error"])){
	$args["message"] = $_GET["error"];
}
else if(isset($_GET["success"])){
	$args["message"] = $_GET["success"];
}

echo $twig->render("inscription.html", $args);

?>

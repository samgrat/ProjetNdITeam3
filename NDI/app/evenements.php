<?php
require_once("../vendor/autoload.php");

$loader = new Twig_Loader_Filesystem("views/");

$twig = new Twig_Environment($loader,
			      array("debug" => true));


session_start();
if(isset($_SESSION["pseudo"])){
	$args["login"] = $_SESSION["pseudo"];
}

echo $twig->render("evenements.html", $args);
?>

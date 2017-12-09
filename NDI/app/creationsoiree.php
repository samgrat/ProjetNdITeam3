<?php

require_once("../vendor/autoload.php");

$loader = new Twig_Loader_Filesystem("views/");

$twig = new Twig_Environment($loader,
			      array("debug" => true));


$args["friendsTab"] = array(
	array("username" => "toto", "email" => "toto@gmail.com", "sobriete" => "20"),
	array("username" => "titi", "email" => "tata@gmail.com", "sobriete" => "50"),
	array("username" => "tata", "email" => "titi@gmail.com", "sobriete" => "100")
);

$page = "creationsoiree.html";

echo $twig->render("creationsoiree.html", $args);

?>

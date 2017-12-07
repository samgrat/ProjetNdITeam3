<?php
require_once("../vendor/autoload.php");

$loader = new Twig_Loader_Filesystem("views/");

$twig = new Twig_Environment($loader,
			      array("debug" => true));


$args["tabSoiree"] = array(
	array("nom" => "soire boloss", "date" => "2/12/2017"),
	array("nom" => "soiree jeudi", "date" => "2/12/2017"),
	array("nom" => "ricm party", "date" => "2/12/2017")
);

//Page a afficher, modifiez moi


echo $twig->render("soiree.html", $args);

?>
<?php
require_once("../vendor/autoload.php");

$loader = new Twig_Loader_Filesystem("views/");

$twig = new Twig_Environment($loader,
			      array("debug" => true));

//Tableau contenant tout ce qui sera affiché sur la $page, modifiez moi
$args = array();

//Variable simple
$args["text"] = "Hello";

//Tableau sans clé (parcours avec boucle for)
$args["users"] = array(
	"1",
	"2",
	"3"
);

//Tableau avec clé (acces direct aux éléments)
$args["tab"]["nom"] = "TABNOM";
$args["tab"]["prenom"] = "TABPRENOM";

//Tableau de Tableau
$args["tabTab"] = array(
	array("nom" => "MonNom1", "prenom" => "MonPrenom1"),
	array("nom" => "MonNom2", "prenom" => "MonPrenom2"),
	array("nom" => "MonNom3", "prenom" => "MonPrenom3")
);

//Page a afficher, modifiez moi
$page = "examplePage";

echo $twig->render("examplePage.html", $args);

?>

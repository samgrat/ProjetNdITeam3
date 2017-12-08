<?php
require_once("../vendor/autoload.php");

$loader = new Twig_Loader_Filesystem("views/");

session_start();
$args=array();
if(isset($_SESSION["pseudo"])){
	$args["login"] = $_SESSION["pseudo"];
}

$twig = new Twig_Environment($loader,
			      array("debug" => true));


$args["tabSoiree"] = array(
	array("nom" => "soire boloss", "date" => "2/12/2017"),
	array("nom" => "soiree jeudi", "date" => "2/12/2017"),
	array("nom" => "ricm party", "date" => "2/12/2017")
);

$args["friendsTab"] = array(
	array("username" => "toto", "email" => "toto@gmail.com", "sobriete" => "20"),
	array("username" => "titi", "email" => "tata@gmail.com", "sobriete" => "50"),
	array("username" => "tata", "email" => "titi@gmail.com", "sobriete" => "100")
);


$page = "dashboard";

echo $twig->render("dashboard.html", $args);

?>

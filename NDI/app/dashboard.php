<?php
require_once("../vendor/autoload.php");
require_once("config.php");

$loader = new Twig_Loader_Filesystem("views/");

$twig = new Twig_Environment($loader,
			      array("debug" => true));

$args = array();
session_start();
if(isset($_SESSION["pseudo"])){
	$args["login"] = $_SESSION["pseudo"];
}

function get_events_of_user($login, $conn){
		$stmt = $conn->prepare("SELECT description, date FROM Evenement WHERE FK_username = ?");
		$stmt->bind_param("s", $l);
		$stmt->bind_result($desc, $date);

		// set parameters and execute

		$l = $login;

		$res = $stmt->execute();

		$arr = array();
		while ($stmt->fetch()) {
	        $arr[] = array("nom" => $desc, "date" => $date);
	    }


		return $arr;
	}

	function get_friends($login, $conn){
		// get friends
		$stmt = $conn->prepare("SELECT username2 FROM Friends2 WHERE username1 = ?");
		$stmt->bind_param("s", $login);
		$stmt->bind_result($username1);
		$stmt->execute();

		$arr = [];
		while($stmt->fetch()){
			$st = $conn->prepare("SELECT mail, taux_sobriete FROM Users WHERE username = ?");
			$st->bind_param("s", $username1);

			$st->bind_result($mail, $taux_sobriete);
			$st->execute();
			$st->fetch();

			$arr[] = array("username" => $username1, "email" => $mail, "sobriete" => $taux_sobriete);
			echo("I ");
		}
		echo("DUMP:");
			var_dump($arr);

		return $arr;
	}

	$args["tabSoiree"] = get_events_of_user($args["login"], $conn);

	$args["friendsTab"] = get_friends($args["login"], $conn);


$page = "dashboard";

echo $twig->render("dashboard.html", $args);

?>

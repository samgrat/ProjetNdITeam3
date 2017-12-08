<?php
require("config.php");

function add_user_to_db($data, $conn){
	if(!isset($data["email"]) || !isset($data["pseudo"]) || !isset($data["mdp"]) || !isset($data["confirm_mdp"])){
		return array('error' => 1, 'messageError' => "Missing paramter", 'messageSuccess' => null);
	}
	if(strcmp($data["mdp"], $data["confirm_mdp"]) !== 0){
		return array('error' => 1, 'messageError' => "Les mosts de passe ne concordent pas", 'messageSuccess' => null);
	}

	// sanitize input

	// execute request
	// Check connection
	if ($conn->connect_error) {
	    return array('error' => 1, 'messageError' => 'Erreur de connexion à la base', 'messageSuccess' => null);
	}


	$stmt = $conn->prepare("INSERT INTO Users (username, mail, pass) VALUES (?, ?, ?)");
	$stmt->bind_param("sss", $un, $ma, $pa);

	// set parameters and execute
	$un = $data["pseudo"];
	$ma = $data["email"];
	$pa = $data["mdp"];
	$res = $stmt->execute();
	return array('error' => !$res, 'messageError' => null, 'messageSuccess' => "User added");

}







?>
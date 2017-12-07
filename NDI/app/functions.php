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
	//$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}


	$stmt = $conn->prepare("INSERT INTO Users (username, mail, pass) VALUES (?, ?, ?)");
	$stmt->bind_param("sss", $un, $ma, $pa);

	// set parameters and execute
	$un = $data["pseudo"];
	$ma = $data["email"];
	$pa = $data["mdp"];
	$stmt->execute();
	return array('error' => 0, 'messageError' => null, 'messageSuccess' => "User added");

}







?>
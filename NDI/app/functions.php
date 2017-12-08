<?php
require("config.php");
session_start();



function get_user_info($id, $conn){
	$stmt = $conn->prepare("SELECT username, mail, taux_sobriete FROM Users WHERE username=?");
	$stmt->bind_param("s", $id);

	$stmt->execute();

	$username = "";
	$mail = "";
	$taux_sobriete = "";

	$stmt->bind_result($username, $mail, $taux_sobriete);

	 /* Récupération des valeurs */
	 $stmt->fetch();

	if($username == NULL){
		return array("error" => 1, "messageError" => "Utilisateur introuvable");
	}
	else{
		return array("error" => 0,
									"username"=>$username,
									"mail"=>$mail,
									"taux_sobriete"=>$taux_sobriete);
	}

}

function get_soiree_info($id, $conn){
	$stmt = $conn->prepare("SELECT date, coord_x, coord_y, lieu_description, description FROM Soiree WHERE id=?");
	$stmt->bind_param("s", $id);

	$stmt->execute();

	$date = "";
	$coord_x = "";
	$coord_y = "";
	$lieu_description = "";
	$description = "";

	$stmt->bind_result($date, $coord_x, $coord_y, $lieu_description, $description);

	 /* Récupération des valeurs */
	 $stmt->fetch();

	if($date == NULL){
		return array("error" => 1, "messageError" => "Soirée introuvable");
	}
	else{
		return array("error" => 0,
									"date"=>$date,
									"long"=>$coord_x,
									"lat"=>$coord_y,
									"lieu_description"=>$lieu_description,
									"description"=>$description);
	}

}

function get_event_info($id, $conn){
	if($id = -1){
		$stmt = $conn->prepare("SELECT date, coord_x, coord_y, description, type, FK_username, rayon FROM Evenement");
	}
	else{
		$stmt = $conn->prepare("SELECT date, coord_x, coord_y, description, type, FK_username, rayon FROM Evenement WHERE id=?");
		$stmt->bind_param("s", $id);
	}

		$stmt->execute();

		$date = "";
		$coord_x = "";
		$coord_y = "";
		$description = "";
		$type = "";
		$FK_username = "";
		$rayon = "";

		$stmt->bind_result($date, $coord_x, $coord_y, $description, $type, $FK_username, $rayon);

		$ret = array();
		$i = 0;
		/* Récupération des valeurs */
		while ($stmt->fetch()) {
				$ret[$i] = array("error" => 0,
												"date"=>$date,
												"long"=>$coord_x,
												"lat"=>$coord_y,
												"description"=>$description,
												"type"=>$type,
												"FK_username"=>$FK_username,
												"rayon" => $rayon);
				$i++;
	   }

		if($ret[0]["date"] == NULL){
			return array("error" => 1, "messageError" => "Evenement introuvable");
		}
		else{
			return $ret;
		}
}

function add_user_to_db($data, $conn){
	if(!isset($data["email"]) || !isset($data["pseudo"]) || !isset($data["mdp"]) || !isset($data["confirm_mdp"])){
		return array('error' => 1, 'messageError' => "Ajout d'un utilisateur : paramètre(s) manquant(s) ", 'messageSuccess' => null);
	}
	if(strcmp($data["mdp"], $data["confirm_mdp"]) !== 0){
		return array('error' => 1, 'messageError' => "Les mots de passe ne concordent pas", 'messageSuccess' => null);
	}

	// sanitize input

	// execute request
	// Check connection
	if ($conn->connect_error) {
	    return array('error' => 1, 'messageError' => 'Erreur de connexion à la base', 'messageSuccess' => null);
	}


	$stmt = $conn->prepare("INSERT INTO Users (username, mail, pass, taux_sobriete, lost_pass) VALUES (?, ?, ?, 15, 0)");
	$stmt->bind_param("sss", $un, $ma, $pa);

	// set parameters and execute by vinc'aub
	$un = $data["pseudo"];
	$ma = $data["email"];
	$pa = $data["mdp"];
	$res = $stmt->execute();

	if(!$res){
		return array('error' => 1, 'messageError' => "Un utilisateur est déjà enregistré avec ce pseudo.", 'messageSuccess' => null);
	}
	else{
		return array('error' => 0, 'messageError' => null, 'messageSuccess' => "Compte créé.");
	}
}

function add_event_to_db($data, $conn){
	if(!isset($data["date"]) || !isset($data["long"]) || !isset($data["lat"]) || !isset($data["description"]) || !isset($data["user"]) || !isset($data["rayon"]) || !isset($data["type"])){
		return array('error' => 1, 'messageError' => "Ajout d'un évènement : paramètre(s) manquant(s)", 'messageSuccess' => null);
	}

	// sanitize input

	// execute request
	// Check connection
	if ($conn->connect_error) {
	    return array('error' => 1, 'messageError' => 'Erreur de connexion à la base', 'messageSuccess' => null);
	}


	$stmt = $conn->prepare("INSERT INTO Evenement (coord_x, coord_y, description, type, FK_username, rayon) VALUES (?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("ddisss", $lo, $la, $d, $t, $u, $r);

	// set parameters and execute

	//$da = $data["date"];
	$lo = $data["long"];
	$la = $data["lat"];
	$d = $data["description"];
	$u = $data["user"];
	$r = $data["rayon"];
	$t = $data["type"];
	$res = $stmt->execute();

	if($res == 0){
		return array('error' => 1, 'messageError' => "Erreur lors de l'ajout de l'évènement", 'messageSuccess' => null);
	}
	else{
		return array('error' => 0, 'messageError' => null, 'messageSuccess' => "L'évenement a bien été ajouté");
	}
}

function add_soiree_to_db($data, $conn){
	if(!isset($data["date"]) || !isset($data["long"]) || !isset($data["lat"]) || !isset($data["description"]) || !isset($data["user"])){
		return array('error' => 1, 'messageError' => "Ajout de la soirée : paramètre(s) manquant(s)", 'messageSuccess' => null);
	}

	// sanitize input

	// execute request
	// Check connection
	if ($conn->connect_error) {
	    return array('error' => 1, 'messageError' => 'Erreur de connexion à la base', 'messageSuccess' => null);
	}


	$stmt = $conn->prepare("INSERT INTO Soiree (date, coord_x, coord_y, description, FK_idUserOrga) VALUES (?, ?, ?, ?, ?)");
	$stmt->bind_param("sddss", $da, $lo, $la, $d, $u);

	// set parameters and execute

	$da = $data["date"];
	$lo = $data["long"];
	$la = $data["lat"];
	$d = $data["description"];
	$u = $data["user"];
	$res = $stmt->execute();

	return array('error' => !$res, 'messageError' => "Erreur de l'ajout de la soirée", 'messageSuccess' => "La soirée a bien été ajoutée");

}



?>

<?php
	header('Content-Type: application/json');
	require("config.php");
	require("functions.php");
	/* get params, and filter them */
	$query = explode('?', $_SERVER['REQUEST_URI'])[1];
	$arr = explode('/', $query);

	$res = "";

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$req_body = $_POST;

		 switch ($arr[0]) {
	    	case 'user':
	    		$action = $arr[1];
	    		switch ($action) {
	    			case 'add':

	    				$data["email"] = $_POST["email"];
						$data["pseudo"] = $_POST["pseudo"];
						$data["mdp"] = $_POST["mdp"];
						$data["confirm_mdp"] = $_POST["confirm_mdp"];

	    				$res = add_user_to_db($data, $conn);
	    				break;
	    		}

	    		break;
	    	
	    	case 'event':
	    		$action = $arr[1];
	    		switch ($action) {
	    			case 'add':
	    				echo "adding event";
	    				break;

	    		}

	    }

	}

	if($_SERVER['REQUEST_METHOD'] == "GET"){
		echo "getting ressource<br>";

	}

	if($_SERVER['REQUEST_METHOD'] == "DELETE"){
		echo "deleting ressource<br>";

		/* return message */
	}

	if($_SERVER['REQUEST_METHOD'] == "PUT"){
		echo "modifying ressource<br>";

	}

	echo json_encode($res);
?>
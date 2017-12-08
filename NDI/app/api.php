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
	    				$data["date"] = $_POST["date"];
						$data["lat"] = $_POST["lat"];
						$data["long"] = $_POST["long"];
						$data["description"] = $_POST["description"];
						$data["type"] = $_POST["type"];
						$data["user"] = $_POST["user"];
						$data["rayon"] = $_POST["rayon"];

	    				$res = add_event_to_db($data, $conn);
	    				break;
	  
	    		}

	    	case 'soiree':
	    		$action = $arr[1];
	    		switch ($action) {
	    			case 'add':
	    				$data["date"] = $_POST["date"];
						$data["lat"] = $_POST["lat"];
						$data["long"] = $_POST["long"];
						$data["description"] = $_POST["description"];
						$data["user"] = $_POST["user"];

	    				$res = add_soiree_to_db($data, $conn);
	    				break;

	  
	    		}

	    }

	}

	if($_SERVER['REQUEST_METHOD'] == "GET"){
		 switch ($arr[0]) {
	    	case 'user':
	    		$id = $arr[1];
	    				$res = get_user_info($id, $conn);
	    				break;
	    		}

	    		break;
	    	
	    	case 'event':
	    		$id = $arr[1];
	    		$res = get_event_info($id, $conn);
	    		break;
	    		
	    	case 'soiree':
	    		$id = $arr[1];
	    		$res = get_soiree_info($id, $conn);
	    		break;

	    }

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
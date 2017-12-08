<?php
	/* DB INFO */
$servername="127.0.0.1";
$username="root";
$password="sqlisatourist";
$dbname="app";

	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
?>

<?php
	/* DB INFO */
$DB_NAME="app";
$DB_USER="root";
$DB_PASS="sqlisatourist";
$DB_URI="127.0.0.1";

$DB_CONN = new PDO('mysql:host='+ $DB_URI + ';dbname='+ $DB_NAME +';charset=utf8,' + $DB_USER +', '+$DB_PASS);

?>

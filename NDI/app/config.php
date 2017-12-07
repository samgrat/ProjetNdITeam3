<?php
	/* DB INFO */
$DB_NAME="app";
$DB_USER="root";
$DB_PASS="sqlisatourist";
<<<<<<< HEAD
$DB_URI="127.0.0.1";

$DB_CONN = new PDO('mysql:host='+ $DB_URI + ';dbname='+ $DB_NAME +';charset=utf8,' + $DB_USER +', '+$DB_PASS);

=======
$DB_URI="54.37.149.174";

$DB_CONN = new PDO('mysql:host='+ $DB_URI + ';dbname='+ $DB_NAME +';charset=utf8,' + $DB_USER +', '+$DB_PASS);

echo $DB_CONN;

>>>>>>> FrontEnd
?>

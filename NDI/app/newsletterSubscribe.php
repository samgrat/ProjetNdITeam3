<?php
include "config.php";

if(isset($_GET["email"])){
  $stmt = $conn->prepare("INSERT INTO newsletter(email) VALUES (?)");
  $stmt->bind_param("s", $_GET["email"]);
  $stmt->execute();
}
?>

<form action="newsletterSubscribe.php">
 Email:<br>
 <input type="text" name="email" id="email"><br>
 <input type="submit" value="Submit">
</form>

<?php
include("config.php");

if(isset($_POST["pseudo"]) && isset($_POST["mdp"])){
  $stmt = $conn->prepare("SELECT pass FROM Users WHERE username=?");
  $stmt->bind_param("s", $_POST["pseudo"]);

  $stmt->execute();

  $pass = "";
  $stmt->bind_result($pass);

   /* Récupération des valeurs */
   $stmt->fetch();

  if($pass == NULL){
    echo "0";
  }
  else{
    if($_POST["mdp"] == $pass){
      $_SESSION["pseudo"] = $_POST["pseudo"];
      echo "1";
    }
    else{
      echo "0";
    }
  }
}

 ?>

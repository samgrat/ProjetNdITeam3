<?php
echo "lol";
if(isset($_POST["email"])
  && isset($_POST["pseudo"])
  && isset($_POST["mdp"])
  && isset($_POST["confirm_mdp"])){

    if($_POST["mdp"] == $_POST["confirm_mdp"]){
      $hashMdp = hash("sha256" , $_POST["mdp"]):
      $bdd=>exec("INSERT INTO users(username, TauxSobriete, pass, lost_pass)
                  VALUES('"+ $_POST["pseudo"]+"', "+ $_POST["TauxSobriete"]+", '$$hashMdp', 0)"):
    }
}

?>

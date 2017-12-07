function inscription(){
	var lsite_inscription = document.forms["formulaire"];
	var mdp2 = document.forms["formulaire"].mdp.value;
	var mdp1 = document.forms["formulaire"].mdp_confirm.value;
	if( mdp1 != mdp2){
		alert("mauvais mot de passe");
	}
}
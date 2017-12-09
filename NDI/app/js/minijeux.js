var valeur_alias;
var valeur_alias1;
var valeur_alias2;
var string ="";

function Recup_select_info(obj,choix_rech){
    var idx = obj.selectedIndex;
    return obj.options[idx].value; // récupère valeur du select
}

function remplissageAuto(obj) {
    valeur_alias = Recup_select_info(obj,'valeur');
    
}
function affiche(){
	string = "";
	var compteur = 0 ;
	if(valeur_alias == "C"){
    	compteur++;
    	string = string + "Question 1 Vrai \n"
    }else{
    string = string + "Question 1 Faux \n"}
    if(valeur_alias1 == "D"){
    	compteur++;
    	string = string + "Question 2 Vrai \n"
    }else{
    string = string + "Question 2 Faux \n"}
    if(valeur_alias2 == "A"){
    	compteur++;
    	string = string + "Question 3 Vrai \n"
    }else{
    string = string + "Question 3 Faux \n"}

    alert("Vous avez "+compteur+" bonne réponse sur 3\n" + string );

}
function remplissageAuto1(obj) {
    valeur_alias1 = Recup_select_info(obj,'valeur');
    
}
function remplissageAuto2(obj) {
    valeur_alias2 = Recup_select_info(obj,'valeur');
    
}
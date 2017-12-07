function reportEvent(){
	console.log(circle._latlng.lat + " " + circle._latlng.lng);
}

var mymap = L.map('mapid').setView([51.505, -0.09], 13);
mymap.on('click', onMapClick);
L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
  maxZoom: 18,
  attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
    '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
    'Imagery © <a href="http://mapbox.com">Mapbox</a>',
  id: 'mapbox.streets'
}).addTo(mymap);

var circle = L.circle([51.508, -0.11], {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,
    radius: 500
});

var valeur_alias;

function onMapClick(e) {
    if (valeur_alias != null && valeur_alias != "0") {
	    circle
	        .setLatLng(e.latlng)
	        .setRadius(valeur_alias)
	        .addTo(mymap);
    }
}

function Recup_select_info(obj,choix_rech){
    var idx = obj.selectedIndex;
    return obj.options[idx].value; // récupère valeur du select
}

function remplissageAuto(obj) {
    valeur_alias = Recup_select_info(obj,'valeur');
}

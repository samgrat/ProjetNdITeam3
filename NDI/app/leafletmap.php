<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>test coordonnées</title>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css"
   integrity="sha512-M2wvCLH6DSRazYeZRIm1JnYyh22purTM+FDB5CsyxtQJYeKq83arPe5wgbNmcFXGqiSH2XR8dT/fJISVA1r/zQ=="
   crossorigin=""/>
<style type="text/css">
	     #mapid { height: 180px; }
</style>
<script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"
	    integrity="sha512-lInM/apFSqyy1o6s89K4iQUKg6ppXEgsVxT35HbzUupEVRh2Eu9Wdl4tHj7dZO0s1uvplcYGmt3498TtHq+log=="
	    crossorigin=""></script>

<script type="text/javascript">function onclick_page(event)
{
  var x = event.clientX;
  var y = event.clientY - 100;
}
function onMapClick(e) {
    alert("You clicked the map at " + e.latlng);
}

</script>
</head>
<body>

	type: <form method = \"post\" action =\"type.php\">
	<select name = \"type\">
		<option name =\"PbVoirie\">PbVoirie</option>
		<option name =\"Accident\">Accident</option>
		<option name =\"Feu\">Feu</option>
		<option name =\"Meteorites\">Meteorites</option>
	</select>
	</form>

	taille:
	<form method = \"post\" action =\"taille.php\">
	<select name = \"taille\">
		<option name =\"Petite\">Petite</option>
		<option name =\"Moyenne\">Accident</option>
		<option name =\"Feu\">Feu</option>
		<option name =\"Meteorites\">Meteorites</option>
	</select>
	</form>

	position:
<div id="mapid" style="width: 600px; height: 400px;" onclick="onclick_page(event);"></div>
<script>
	// changer le setView[] pour mettre la position de la map par default
	var mymap = L.map('mapid').setView([51.505, -0.09], 13);
	mymap.on('click', onMapClick);
	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
			'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="http://mapbox.com">Mapbox</a>',
		id: 'mapbox.streets'
	}).addTo(mymap);

</script>
</div>
</body>
</html>

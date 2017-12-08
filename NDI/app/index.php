<?php

require_once("../vendor/autoload.php");

$loader = new Twig_Loader_Filesystem("views/");

$twig = new Twig_Environment($loader,
	array("debug" => true));

$args = array();
session_start();
$args=array();
if(isset($_SESSION["pseudo"])){
	$args["login"] = $_SESSION["pseudo"];
}

$geoplugin = unserialize( file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']) );
$lat = $geoplugin['geoplugin_latitude'];
$long = $geoplugin['geoplugin_longitude'];


$string = file_get_contents("http://api.openweathermap.org/data/2.5/find?lat=".$lat."&lon=".$long."&APPID=777c795f08f824fa670b48a4b80019a6");

$array = json_decode($string);
foreach ($array as $key => $value) {
	if( $key == "list"){
		$list = $value;
	}
}

foreach ($list[0] as $key2 => $value2) {

	if($key2 == "name"){
		$name = $value2;
	}
	if($key2 == "main"){
		if($value2 != NULL){
			$main = $value2;
			foreach ($main as $key => $value) {
				if($key == "temp"){
					if($value != NULL){

						$temperature = $value -273.15;
					}else{ $temperature = False;}
				}
				if($key == "pressure"){
					if($value != NULL){
						$pression = $value;
					}else{ $pression = False;}
				}
				if($key == "humidity"){
					if($value != NULL){
						$humidite = $value;
					}else{ $humidite = False;}
				}
			}
		}

	}
	if($key2 == "wind"){
		if($value2 != NULL){
			foreach ($value2 as $key3 => $value3) {
				if($key3 == "speed"){
					$vitessevent = $value3;
				}
			}

		}else{$vitessevent = NULL;}

	}
	if($key2 == "rain"){
		if($value2 != NULL){
			$pluie = True;
		} else{ $pluie = False;}
	}
	if($key2 == "snow"){
		if($value2 != NULL){
			$neige = True;
		}else{ $neige = False;}
	}
	if($key2 == "clouds"){
		if($value2 != NULL){
			$nuageux = True;
		}else{ $nuageux = False;}
	}
	if($key2 == "weather"){
		if($value2 != NULL){
			foreach ($value2 as $key3 => $value3) {
				if($key3 == 0){
					foreach ($value3 as $key4 => $value4) {
						if($key4 == "main"){
							$tempsprincipal = $value4;
						}
						if($key4 == "description"){
							$description = $value4;
						}

					}
				}
			}
		}else{ $tempsprincipal = NULL;
			$description = NULL;}
		}
	}

	if($neige){
		$args["param"]["image"] = "img/snowflake.png";
	}else{
		if($pluie){
			$args["param"]["image"] = "img/raining.png";
		}else{
			if($nuageux){
				$args["param"]["image"] = "img/clouds.png";
			}else{
				$args["param"]["image"] = "img/sunny.png";
			}
		}
	}
	$args["param"]["nom"] = $name;
	$args["param"]["temp"] = $temperature;
	$args["param"]["pression"] = $pression;
	$args["param"]["humidite"] = $humidite;
	$args["param"]["speed"] = $vitessevent;


	$args["points"] = array(
		array("lng" => 50.0, "lat" => 50.0, "rayon" => 50000),
		array("lng" => 70.0, "lat" => 50.0, "rayon" => 50000),
		array("lng" => 30.0, "lat" => 50.0, "rayon" => 50000)
	);


	echo $twig->render("index.html", $args);

	?>

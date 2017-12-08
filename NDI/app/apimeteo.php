<?php

$lat =  43;
$long = 0;
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


    var_dump($temperature);
    var_dump($pression);
    var_dump($humidite);
    var_dump($vitessevent);
    var_dump($pluie);
    var_dump($neige);
    var_dump($nuageux);
    var_dump($tempsprincipal);
    var_dump($description);

?>

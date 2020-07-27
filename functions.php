<?php
function get_tabs($dir) {
#  $dir = "./";
#  $dir = "./pages/";
  $a = scandir($dir);
  $tabs = "";
  $c = 0;
  $tabs = array();
  foreach ($a as $filename) {
    $id = "title";
    $b = stripos($filename, ".php");
    if($b > 0 && is_numeric(substr($filename, 0, $b))) {
      $c = $c+1;

      $handle = fopen($dir.$filename, 'r');
      $valid = false;
      $title = "";
      while (($buffer = fgets($handle)) !== false) {
        if (strpos($buffer, $id) !== false) {
          $valid = TRUE;
          $d = strpos($buffer, "=")+1;
          $title = substr($buffer, $d, strlen($buffer)-$d);
          $title = trim(str_replace(';', '', str_replace('"', '', $title)));
          break; // Once you find the string, you should break out the loop.
        }      
      }
      fclose($handle);

      $tabs[$c]['path'] = strtolower($dir);
      $tabs[$c]['filename'] = substr($filename, 0, $b);
      if(strlen($title)>0) {
        $tabs[$c]['title'] = $title;
      } else {
        $tabs[$c]['title'] = "Tab ".$tabs[$c]['filename'];
      }
    }
  }
  return $tabs;
}

function getDistancebyAPI($addressFrom, $addressTo, $unit = ''){
  // Google API key
  $apiKey = 'Your_Google_API_Key';
    
  // Change address format
  $formattedAddrFrom    = str_replace(' ', '+', $addressFrom);
  $formattedAddrTo     = str_replace(' ', '+', $addressTo);
    
  // Geocoding API request with start address
  $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false&key='.$apiKey);
  $outputFrom = json_decode($geocodeFrom);
  if(!empty($outputFrom->error_message)){
    return $outputFrom->error_message;
  }
    
  // Geocoding API request with end address
  $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false&key='.$apiKey);
  $outputTo = json_decode($geocodeTo);
  if(!empty($outputTo->error_message)){
    return $outputTo->error_message;
  }

  // Get latitude and longitude from the geodata
  $latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;
  $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;
  $latitudeTo        = $outputTo->results[0]->geometry->location->lat;
  $longitudeTo    = $outputTo->results[0]->geometry->location->lng;
    
  // Calculate distance between latitude and longitude
  $theta    = $longitudeFrom - $longitudeTo;
  $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
  $dist    = acos($dist);
  $dist    = rad2deg($dist);
  $miles    = $dist * 60 * 1.1515;
    
  // Convert unit and return distance
  $unit = strtoupper($unit);
  if($unit == "K"){
    return round($miles * 1.609344, 2).' km';
  }elseif($unit == "M"){
    return round($miles * 1609.344, 2).' meters';
  }else{
    return round($miles, 2).' miles';
  }
}

function getDistance($addressTo) {
  $handle = curl_init();
  // Set the url
  $url = 'https://www.google.co.uk/maps/dir/BL1+1RU/'.$addressTo.'?hl=en';
  curl_setopt($handle, CURLOPT_URL, $url);
  // Set the result output to be a string.
  curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

  $output = curl_exec($handle);

  curl_close($handle);

  return $output;
}

function super_json_decode($json, &$value, $assoc = false, $depth = 512, $options = 0) {
    $pValue = false;
    $result = json_decode($json, $assoc, $depth);
    if(json_last_error() == JSON_ERROR_NONE) {
        $pValue = $result;
        return true;
    }
    return false;
}

function get_google_direction($origin, $destination) {
    $ch = curl_init('http://maps.googleapis.com/maps/api/directions/json?origin='.$origin.'&destination='.$destination.'&sensor=false');
    curl_setopt_array($ch, array(
        CURLOPT_CONNECTTIMEOUT => 10,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 60,
    ));

    $response = false;
    if(super_json_decode(curl_exec($ch), $data)) {
        $response = $data;
    }

    $info = curl_getinfo($ch);
    if($data['info']['http_code'] !== 200) {
        return false;
    }

    return $response;
}



?>
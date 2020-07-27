<?php

  function getDistance($addressTo) {
    // Set the url
    $addressTo = str_replace(' ', '+', strtoupper(trim($addressTo)));
    $apiKey = 'AIzaSyDVH4ciNpRenZboKKcpAmw2rkFzd87OWXI';
    $travelMode = 'DRIVING';
    $result = [];

    $url = 'https://maps.googleapis.com/maps/api/directions/json?origin=BL1+1RU&destination='.$addressTo.'&mode='.$travelMode.'&units=imperial&amp;region=uk&key='.$apiKey;

    // Initialise cURL
    $handle = curl_init($url);

    curl_setopt_array($handle, array(
      CURLOPT_RETURNTRANSFER => true,
    ));

    $output = curl_exec($handle);
    curl_close($handle);

    $jsonData = json_decode($output, true);

    $result['crow'] = distanceAsCrow (
    	$jsonData['routes']['0']['legs']['0']['start_location']['lng'], 
    	$jsonData['routes']['0']['legs']['0']['start_location']['lat'], 
    	$jsonData['routes']['0']['legs']['0']['end_location']['lng'], 
    	$jsonData['routes']['0']['legs']['0']['end_location']['lat'], 
    	'M');

    $result['driving']['time'] = $jsonData['routes']['0']['legs']['0']['duration']['value']/60;
    $result['driving']['distance'] = $jsonData['routes']['0']['legs']['0']['distance']['value']/1609;

    $result['origin']['address'] = $jsonData['routes']['0']['legs']['0']['start_address'];
    $result['origin']['longitude'] = $jsonData['routes']['0']['legs']['0']['start_location']['lng'];
    $result['origin']['latitude'] = $jsonData['routes']['0']['legs']['0']['start_location']['lat'];

    $result['destination']['address'] = $jsonData['routes']['0']['legs']['0']['end_address'];
    $result['destination']['longitude'] = $jsonData['routes']['0']['legs']['0']['end_location']['lng'];
    $result['destination']['latitude'] = $jsonData['routes']['0']['legs']['0']['end_location']['lat'];

    return $result;
  }

  function distanceAsCrow ($lon1, $lat1, $lon2, $lat2, $unit) {
    if (($lat1 == $lat2) && ($lon1 == $lon2)) {
      return 0;
    }
    else {
      $theta = $lon1 - $lon2;
      $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
      $dist = acos($dist);
      $dist = rad2deg($dist);
      $miles = $dist * 60 * 1.1515;
      $unit = strtoupper($unit);

      switch (strtoupper(trim($unit))) {
      	case 'M':  //miles
      		return $miles;
      		break;
      	
      	case 'N':  //nautical miles
      		return ($miles * 0.8684);
      		break;
      	
      	case 'K':  //kilometers
      		return ($miles * 1.609344);
      		break;
      	
      	default:
      		$errorMsg = $unit." is not recognised as a measure of distance";
      		return $errorMsg;
      		break;
      }

    }
  }




?>
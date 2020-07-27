<?php

  $base_dir = "../../";
  include($base_dir."classes/cpl.php");
  include($base_dir.'pages/members/email_functions.php');

  $db = db_connect($base_dir);
  date_default_timezone_set("Europe/London");
  $dt = date("Y-m-d H:s:i", strtotime("now"));

  if(!empty($_POST)) {
    $postdata = new postdata($_POST);
  } else {
    $postdata = new postdata($_GET);
  }

  if(empty($postdata->position->firstname) || empty($postdata->position->surname) || empty($postdata->position->mobile) || empty($postdata->position->email)) {
    $valid = false;
  } else {
    $valid = true;
  }

  if($valid) {

    if(strtolower($postdata->form->type) == 'add') {
      $test_sql = "
        SELECT 
          `id`,
          `firstname`,
          `surname`,
          `mobile`
        FROM 
          `".$postdata->position->type."` 
        WHERE 
          `email`='".$postdata->position->email."';";

      $test_position = mysqli_query($db, $test_sql);
      foreach ($test_position as $z => $position) {
        $postdata->position->id = $position['id'];
        $postdata->form->type = 'update';
      }
    }

    switch (strtolower($postdata->form->type)) {
    	case 'update':
        $person_sql = "
          UPDATE 
            `".$postdata->position->type."` 
          SET 
            `firstname`='".$postdata->position->firstname."',
            `surname`='".$postdata->position->surname."',
            `mobile`='".$postdata->position->mobile."',
            `email`='".$postdata->position->email."',
            `modified` = '".$dt."'
          WHERE 
            `id`='".$postdata->position->id."';";

        $postdata->result = mysqli_query($db, $person_sql);

        $club_sql = NULL;
    		break;
  	
    	case 'add':
        $hash = rand(0, 1000);

        $person_sql="
          INSERT INTO `".$postdata->position->type."`(
            `firstname`, 
            `surname`, 
            `mobile`, 
            `email`, 
            `hash`, 
            `created`, 
            `active`) 
          VALUES (
            '".$postdata->position->firstname."',
            '".$postdata->position->surname."',
            '".$postdata->position->mobile."',
            '".$postdata->position->email."',
            '".MD5($hash)."',
            '".$dt."',
            '1');";

        mysqli_query($db, $person_sql);

        $find_person = "
        SELECT 
          `id`
        FROM 
          `".$postdata->position->type."` 
        WHERE 
          `email`='".$postdata->position->email."';";

        $test_persons = mysqli_query($db, $find_person);
        if(count($test_persons)>0) {
        	foreach($test_persons as $test_person) {
        	  $postdata->position->id = $test_person['id'];
      	  }
        }

        $club_sql = "
          UPDATE 
            `clubs` 
          SET 
            `".$postdata->position->type."` = '".$postdata->position->id."',
            `modified` = '".$dt."'
          WHERE 
            `id`='".$postdata->club->id."';";

        $postdata->result = mysqli_query($db, $club_sql);

        $name = $postdata->position->firstname." ".$postdata->position->surname;
        $position = ucwords($postdata->position->type);
        $email = $postdata->position->email;
        $club = $postdata->club->name;

//  Welcome email to person
        welcome_email($name, $club, $position, $email, $hash);

//  Registration email to league
        registration_email($name, $club, $position, $email);

        break;
  	
    	default:
    		# code...
  	  	break;
    }
  }

  echo json_encode($postdata);

  ?>
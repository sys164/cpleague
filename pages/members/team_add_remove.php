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
  $postdata->errormsg = '';

  switch ($postdata->type) {
    case 'remove':
      $sql_team = "
        UPDATE `teams` SET 
          `club` = NULL,
          `coach` = NULL,
          `modified`='".$dt."',
          `active` = '0' 
        WHERE 
          `id` = '".$postdata->team->id."';";

      mysqli_query($db, $sql_team);
      break;
    
    case 'add':
      $sql_coach_test = "SELECT `id` FROM `coaches` WHERE `email`='".$postdata->coach->email."';";
      $test_coach = mysqli_query($db, $sql_coach_test);

      if(count($test_coach) > 0) {
        foreach ($test_coach as $coach) {
          if(!empty($coach['id'])) {
            $postdata->coach->id = $coach['id'];
          }
        }
      }

      if(!empty($postdata->coach->id)) {  
        $sql_coach_set = "
          UPDATE `coaches` SET 
            `firstname` = '".$postdata->coach->firstname."',
            `surname` = '".$postdata->coach->surname."',
            `mobile`  = '".$postdata->coach->mobile."',
            `email` = '".$postdata->coach->email."',
            `modified` = '".$dt."',
            `active` = '1'
          WHERE
            `id` = '".$postdata->coach->id."';";
        $postdata->coach->result = 'update';
      } else {
        $sql_coach_set = "
          INSERT INTO `coaches` 
            (`firstname`, `surname`, `mobile`, `email`, `created`, `active`)
          VALUES 
            ('".$postdata->coach->firstname."', 
             '".$postdata->coach->surname."',
             '".$postdata->coach->mobile."',
             '".$postdata->coach->email."',
             '".$dt."',
             '1');";
        $postdata->coach->result = 'add';
      }
      $results = mysqli_query($db, $sql_coach_set);
      $test_coach = mysqli_query($db, $sql_coach_test);

      if(count($test_coach) > 0) {
        foreach ($test_coach as $coach) {
          $postdata->coach->id = $coach['id'];
        }
      }

      $sql_team_test = "SELECT `id`, `active` FROM `teams` WHERE `club`='".$postdata->club->id."' AND `age`='".$postdata->team->age."' AND UPPER(`name`)='".strtoupper($postdata->team->name)."';";

      $test_team = mysqli_query($db, $sql_team_test);
      $postdata->team->active = '0';

      if(count($test_team) > 0) {
        foreach ($test_team as $team) {
          $postdata->team->id = $team['id'];
          $postdata->team->active = $team['active'];
        }
      }

      if($postdata->team->active == 1) {
        $postdata->errormsg = 'Team already registered';
      } else {
        $postdata->errormsg = '';
      }

      if(empty($postdata->errormsg)) {
        if(empty($postdata->team->id)){
          $sql_team_set = "
            INSERT INTO `teams` 
              (`age`, `name`, `club`, `coach`, `active`)
            VALUES
              ('".$postdata->team->age."',
               '".$postdata->team->name."',
               '".$postdata->club->id."',
               '".$postdata->coach->id."',
               '1');";
        } else {
          $sql_team_set = "
            UPDATE `teams` SET 
              `coach` = '".$postdata->coach->id."',
              `modified` = '".$dt."',
              `active` = '1'
            WHERE
              `id` = '".$postdata->team->id."';";
        }
        mysqli_query($db, $sql_team_set);
      }
      break;
    
    default:
      # code...
      break;
  }

  echo json_encode($postdata);
?>
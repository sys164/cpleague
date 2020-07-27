<?php

$base_dir = '../../';

// include($base_dir.'classes/cpl.php');

include($base_dir.'config/config.database.php');
include($base_dir.'config/config.queries.php');
include($base_dir.'pages/members/email_functions.php');

date_default_timezone_set("Europe/London");
$dt = date("Y-m-d H:s:i", strtotime("now"));
$whitelist = 0;
$hash = rand(0, 1000);

$db = new mysqli($host_name, $user_name, $password, $database);
if ($db -> connect_errno) {
  echo '<p style="color: white;">'.$host_name.'</p>';
  echo '<p style="color: white;">Failed to connect to MySQL: ' . $db -> connect_error.'</p>';
} else {
//  return $connect;
}

  $postdata = []; 
  if(isset($_POST['club_name'])) {
    foreach ($_POST as $key => $value) {
      $a = explode('_', $key);
      switch (count($a)) {
        case '2':
          $postdata[$a[0]][$a[1]] = $value;
          break;
        case '1':
          $postdata[$a[0]] = $value;
          break;
        default:
          break;
      }
    }


//  Check Existing Secretary
    $sql_update_sec = "INSERT INTO `secretary`(`firstname`, `surname`, `mobile`, `email`, `hash`, `created`, `active`) VALUES ('".$postdata['sec']['firstname']."', '".$postdata['sec']['surname']."', '".$postdata['sec']['mobile']."', '".$postdata['sec']['email']."', '".md5($hash)."', '".$dt."', '1');";

    $sql_secretary = $sql_secretary."`firstname`='".$postdata['sec']['firstname']."' AND `surname`='".$postdata['sec']['surname']."';";

    $sec_test = $db->query($sql_secretary);
    $secretarys = [];
    if(count($sec_test) > 0) {
      foreach ($sec_test as $secretary) {
        $secretarys[] = $secretary;
      }
    }

    if(count($secretarys)>0) {
      switch(count($secretarys)) {
        case '1':
          $sec_id = $secretarys[0]['id'];
          $sql_update_sec = "UPDATE `secretary` SET `mobile`='".$postdata['sec']['mobile']."', `email`='".$postdata['sec']['email']."', `hash`='".md5($hash)."' `modified`='".$dt."', `active`='1' WHERE `id`='".$sec_id."';";
          break;
        default:
          break;
      }
    }
//    echo $sql_update_sec."<br><br>";
    $update_sec = $db->query($sql_update_sec);

    if(strlen($sec_id) < 1) {
      $sec_test = $db->query($sql_secretary);
      foreach ($sec_test as $secretary) {
        $sec_id = $secretary['id'];
      }
    }

//      echo "<br>";

//  Check Existing Chairperson
    $sql_update_chair = "INSERT INTO `chairperson`(`firstname`, `surname`, `mobile`, `email`, `hash`, `created`, `active`) VALUES ('".$postdata['chair']['firstname']."', '".$postdata['chair']['surname']."', '".$postdata['chair']['mobile']."', '".$postdata['chair']['email']."', '".md5($hash)."', '".$dt."', '1');";

    $sql_chairperson = $sql_chairperson."`firstname`='".$postdata['chair']['firstname']."' AND `surname`='".$postdata['chair']['surname']."';";

    $chair_test = $db->query($sql_chairperson);
    $chairpersons = [];
    if (count($chair_test) > 0) {
      foreach ($chair_test as $chairperson) {
        $chairpersons[] = $chairperson;
      }
    }

    $chair_id = '';
    if(count($chairpersons)>0) {
      switch(count($chairpersons)) {
        case '1':
          $chair_id = $chairpersons[0]['id'];
          $sql_update_chair = "UPDATE `chairperson` SET `mobile`='".$postdata['chair']['mobile']."', `email`='".$postdata['chair']['email']."', `hash`='".md5($hash)."' `modified`='".$dt."', `active`='1' WHERE `id`='".$chair_id."';";
          break;
        default:
          break;
      }
    }
//    echo $sql_update_chair."<br><br>";
    $update_chair = $db->query($sql_update_chair);

    if(strlen($chair_id) < 1) {
      $chair_test = $db->query($sql_chairperson);
      foreach ($chair_test as $chairperson) {
        $chair_id = $chairperson['id'];
      }
    }


//  Check Existing Clubs

    $sql_update_club = "INSERT INTO `clubs`(`name`, `street`, `area`, `town`, `postcode1`, `distance`, `chairperson`, `secretary`, `created`, `active`) VALUES ('".$postdata['club']['name']."', '".$postdata['club']['address']."', '".$postdata['club']['area']."', '".$postdata['club']['town']."', '".$postdata['club']['postcode']."', '".$postdata['club']['distance']."', '".$chair_id."', '".$sec_id."', '".$dt."', '1');";

    $sql_member_club = $sql_member_club."`postcode1`='".$postdata['club']['postcode']."' OR `postcode2`='".$postdata['club']['postcode']."';";

    $club_test = $db->query($sql_member_club);
    $clubs = [];
    if (count($club_test)>0) {
      foreach ($club_test as $club) {
        $clubs[] = $club;
      }
    }

    if(count($clubs > 0)) {
      $whitelist = 1;
      switch(count($clubs)) {
        case '1':
          $club_id = $clubs[0]['id'];
          $sql_update_club = "UPDATE `clubs` SET `name`='".$postdata['club']['name']."', `street`='".$postdata['club']['address']."', `area`='".$postdata['club']['area']."', `town`='".$postdata['club']['town']."', `distance`='".$postdata['club']['distance']."', `chairperson`='".$chair_id."', `secretary`='".$sec_id."', `modified`='".$dt."', `active`='1' WHERE `id`='".$club_id."';";
          break;
        default:
          break;
      }
    }

//    echo $sql_update_club."<br>";
    $update_club = $db->query($sql_update_club);

  }

  $name = $postdata['sec']['firstname']." ".$postdata['sec']['surname'];
  $position = "Secretary";
  $email = $postdata['sec']['email'];
  $club = $postdata['club']['name'];
  if($whitelist == 1) {

//  Welcome email to Secretary
    welcome_email($name, $club, $position, $email, $hash);

//  Registration email to league
    registration_email($name, $club, $position, $email);

//  Welcome email to Chairperson
    $name = $postdata['chair']['firstname']." ".$postdata['chair']['surname'];
    $position = "Chairperson";
    $email = $postdata['chair']['email'];
    welcome_email($name, $club, $position, $email, $hash);

  } else {
//  New Club what happens next email
    new_club_email($postdata);

//  New Club Registration to league
    welcome_new_email($name, $club, $position, $email);
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://www.communitypartnershipleague.co.uk/css/membership.php" type="text/css" charset="utf-8" />
</head>
<body style="background-color: transparent;">

<h2 style="text-align: center;">Welcome to the</h2>
<h1 style="text-align: center;">Community Partnership League</h1>
<p style="text-align: center;">Thank you for completing the first step in the registration process.</p>
<p style="text-align: center;">We will email your Secretary and Chairperson with details for the next step of the registration process.</p>

</body>
</html>
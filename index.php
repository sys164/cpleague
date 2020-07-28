<?php
// Start the session
  session_start();

  $path = explode('/', $_SERVER['SCRIPT_NAME']);
  switch (count($path)) {
    case '2':
      $dir = "./pages/";
      $base_dir = './';
      break;
    
    case '3':
      $dir = "./";
      $base_dir = '../';
      break;
    
    default:
      break;
  }

  include($base_dir.'classes/cpl.php');
  include($base_dir.'classes/videos.php');
//  include($base_dir.'classes/user.php');

  include($base_dir.'functions.php');

  $cpl = new cpl();
  $divisions = new divisions($base_dir);
  $fixtures = new fixtures(0,0);

  switch ($_SERVER['SERVER_NAME']) {
    case 'cpleague.co.uk':
      header("Location: https://www.communitypartnershipleague.co.uk");
      break;
    
    case 'communitypartnershipleague.co.uk':
      break;
    
    case 'cpl.localhost':
      break;
    
    default:
      echo "<h1>Access Denied</h1>";
      echo "<p>This site can only be accessed via a recognised URL.</p>";
      die();
      break;
  }

  if(!file_exists('config/config.colour.php') || !file_exists('config/config.club.php')) {
    header("Location: install/index.php");
  } else {
    include_once($base_dir.'config/config.club.php');
    include_once($base_dir.'config/config.colour.php');
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <title><?php echo CLUB_NAME;?></title>
  <meta name="DC.title" content="<?php echo CLUB_NAME;?>">
  <meta http-equiv="last-modified" content="Thur, 26 Dec 2019 23:30:00 GMT" />

  <meta charset="utf-8">

  <?php include_once('favicon.php'); ?>
  <link rel="stylesheet" href="css/bootstrap-4.2.1/bootstrap.min.css">

  <link rel="stylesheet" href="<?php echo $base_dir; ?>css/fonts.css" type="text/css" charset="utf-8" />
  <link rel="stylesheet" href="<?php echo $base_dir; ?>css/layout.php" type="text/css" charset="utf-8" />
  <link rel="stylesheet" href="<?php echo $base_dir; ?>css/membership.php" type="text/css" charset="utf-8" />
  <link rel="stylesheet" href="<?php echo $base_dir; ?>css/fixtures.php" type="text/css" charset="utf-8" />

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="js/bootstrap-4.2.1/bootstrap.min.js"></script>

  <script src="<?php echo $base_dir; ?>menu.js"></script> 
</head>
<body onload="openPage('Tab1', this, '<?php echo $settings->paper_colour; ?>');"> 

<!--- openPage('Tab1', 'defaultOpen', <?php # echo $settings->paper_colour ?>); --->
<!---  document.getElementById('defaultOpen').style.backgroundColor = '<?php # echo $settings->paper_colour ?>'; --->

<div id="page">

  <div id="top-bar">
    <div class="login-register" type="button" data-toggle="modal" data-target="#myModal" onclick="loginButton();">
      Login/Register
    </div>
  </div>

  <div id="header-bar">
    <?php 
      include($base_dir.'/pages/header.php'); 
    ?>
  </div>

  <div id="menu-bar">
<!---    <div class="menu"> --->
    <?php

      $tabs = get_tabs($dir);

      $x = count($tabs);
      for($i=1; $i<=$x-1; $i++) {
        echo "<button class=\"tablink\" onclick=\"openPage('Tab".$i."', this, '".PAPER_BG_COLOUR."')\">".$tabs[$i]['title']."</button>";
      }
      echo "<button class=\"tablink\" onclick=\"openPage('Tab".$x."', this, '".PAPER_BG_COLOUR."')\" style=\"border-right: none;\">".$tabs[$x]['title']."</button>";
    ?>
<!---    </div> --->
  </div>

  <div id="content">
  <?php

    for($i=1; $i<=$x-1; $i++) {
      echo "<div id=\"Tab".$i."\" class=\"tabcontent\">";
#      echo "<p>".$dir.$tabs[$i]['filename'].".php</p>";
      include $dir.$tabs[$i]['filename'].".php";
//      echo "<p><pre>";
//      print_r($_SESSION);
//      echo "</pre></p>";
      echo "</div>";
    }

  ?>
  </div>

  <div id="footer">
    <?php include($base_dir.'/pages/footer.php'); ?>
  </div>
  <div>
<!---
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
--->

<!---
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
--->

<!---
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
--->
  </div>
</div>
</body>
</html>

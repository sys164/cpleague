<!DOCTYPE html>
<html lang="en">
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>KingFish Club Site Installation</title>
  <meta name="copyright" content="Copyright Wray Services">
  <meta name="description" content="This is the installation script for KingFish Club Template">

  <meta name="robots" content="index, follow">
  <meta name="author" content="Chris Wray">
</head>
<body>
  <?php
  include('../config/config.club.php');

  $club_settings = array();
  $colour_settings = array();
  $tmp_club = "<?php \n\n" ;
  $tmp_colour = "<?php \n" ;
  $colour_section = '';

  $target_dir = '../images/';
  $filename = strtolower(basename($_FILES["fileToUpload"]["name"]));
#  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
  $target_file = $target_dir.seoUrl($filename);

  if((CLUB_LOGO == seoUrl($filename)) || (strlen(seoUrl($filename)) < 1)) {
    $uploadOk = 3;
  } else {
    $uploadOk = 1;
  }

  foreach($_POST as $key => $value){
    if(substr($key, 0, 4) == 'club') {
      $club_settings[$key] = $value;
      $tmp_club = $tmp_club."define('".strtoupper($key)."', '".ucwords(strtolower($value))."'); \n";
    } else {
      $value = '#'.str_replace('#', '', strtolower($value));
      if(substr($key, 0, strpos($key, '_')) != $colour_section) {
        $tmp_colour = $tmp_colour."\n";
        $colour_section = substr($key, 0, strpos($key, '_'));
      }
      $colour_settings[$key] = $value;
      $tmp_colour = $tmp_colour."define('".strtoupper($key)."', '".strtolower($value)."'); \n";
    }
  }

  if($uploadOk < 3) {
    $tmp_club = $tmp_club."define('CLUB_LOGO', '".seoUrl($filename)."'); \n";
  } else {
    $tmp_club = $tmp_club."define('CLUB_LOGO', '".CLUB_LOGO."'); \n";
  }

  $tmp_club = $tmp_club."\n?>";
  $tmp_colour = $tmp_colour."\n?>";

  $result_club = file_put_contents("../config/config.club.php", $tmp_club);
  $result_colour = file_put_contents("../config/config.colour.php", $tmp_colour);

  if(uploadOk > 1) {
// Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }
// Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
// Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
      echo $fiename;
      $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if(is_int($result_club) && is_int($result_colour) && $uploadOk == 1) {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Success!<br><br>";
        echo "The file ".$target_file." has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
  }

  function seoUrl($string) {
// Lower case everything
    $string = strtolower($string);
// Determine filetype
    $imageFileType = strtolower(pathinfo($string,PATHINFO_EXTENSION));
// Strip file extension
    $string = str_ireplace('.'.$imageFileType, '', $string);
// Make alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
// Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
// Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
// Add file extension
    $string = $string.".".$imageFileType;
    return $string;
  }

  ?>
</body>
</html>
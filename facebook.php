<?php

date_default_timezone_set("Europe/London");

include('./classes/facebook.php');

if(!empty($_POST)) {
  $to = $_POST['to'];
  $from = "Facebook <facebook@cpleague.co.uk>";
  $subject = "Players wanted by ".$_POST['club']."";
  $message = fb_msg_body($_POST['club'].' '.$_POST['team'], $_POST['email'], $_POST['mobile']);
//  $message = "<html><body><div><p>wibble</p></div></body></html>";

// Always set content-type when sending HTML email
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
  $headers .= "From: ".$from."\r\n";
//  $headers .= 'Cc: myboss@example.com' . "\r\n";
//  $headers .= "Bcc: ". $bcc . "\r\n";

  mail($to,$subject,$message,$headers);

//  $message = "Email sent";
}



?>

<!DOCTYPE html>
<html lang="en">
<head>

  <title>Player recruitment</title>
  <meta charset="utf-8">
</head>

<body>

<form action="" method="post">
  <label for="to">Email to:</label>
  <input type="text" id="to" name="to" value="Email address..."><br><br>

  <label for="club">Club name:</label>
  <input type="text" id="club" name="club" value="Club..."><br>

  <label for="club">Team name:</label>
  <input type="text" id="team" name="team" value="Team..."><br>

  <label for="club">Coach email:</label>
  <input type="text" id="email" name="email" value="Coach email..."><br>

  <label for="club">Coach Mobile:</label>
  <input type="text" id="mobile" name="mobile" value="Coach mobile..."><br><br>

  <input type="submit" value="Submit">
</form>

<?php
  echo "<br>".$message."<br><br>";
?>

</body>
</html>
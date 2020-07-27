<?php

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
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://www.communitypartnershipleague.co.uk/css/layout.php" type="text/css" charset="utf-8" />
  <link rel="stylesheet" href="https://www.communitypartnershipleague.co.uk/css/membership.php" type="text/css" charset="utf-8" />
</head>
<body style="background-color: transparent;">

<div id="content">
  <p>Thank you <?php echo $postdata['contact']['firstname']; ?> for getting in touch.</p>

  <h3>We will contact you soon.</h3>
</div>
    <?php 
    email_club(json_encode($postdata));
    email_league(json_encode($postdata));
    ?>

</body>
</html>

<?php

function email_club ($json) {
  $postdata = json_decode($json, true);

  $to = $postdata['club']['name'].' - '.$postdata['contact']['firstname'].' '.$postdata['contact']['surname'].'<'.$postdata['contact']['email'].'>';
  $from = 'CP League <secretary@cpleague.co.uk>';
  $subject = 'Thank you for your interest';

  $message = "
    <html>
     <head>
      <title>CP League - Club outside 8 miles</title>
     </head>
     <body>
      <p>Hi ".$postdata['conntact']['firstname']."</p>
      <p>Thank you for your application on behalf of ".$postdata['club']['name']." to join our league.</p>
      <p>Unfortunately, the address that you provided is outside the 8 mile radius from Bolton Town Hall.</p>
      <p>We will contact you soon using the details that you provided.</p>
      <p>Regards</p>
      <p>Community Partnership League</p>
     </body>
    </html>
  ";

// Always set content-type when sending HTML email
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
  $headers .= "From: ".$from."\r\n";
//  $headers .= 'Cc: myboss@example.com' . "\r\n";

  mail($to,$subject,$message,$headers);

}

function email_league ($json) {
  $postdata = json_decode($json, true);

//  $to = 'CP League <secretary@cpleague.co.uk>';
  $to = 'Chris Wray <chris_wray2001@yahoo.co.uk>';

  $from = $postdata['club']['name'].' - '.$postdata['contact']['firstname'].' '.$postdata['contact']['surname'].'<'.$postdata['contact']['email'].'>';
  $subject = 'New Club application - '.$postdata['club']['name'];

  $message = "
    <html>
     <head>
      <title>CP League - Club outside 8 miles</title>
     </head>
     <body>
      <p>Hi</p>
      <table style='border: none;'>

       <tr>
        <td style='text-align: right;'>Club Name - </td>
        <td>".$postdata['club']['name']."</td>
       </tr>

       <tr>
        <td style='text-align: right;'>Club Address - </td>
        <td>".$postdata['club']['address'].", ".$postdata['club']['postcode']."</td>
       </tr>

       <tr>
        <td style='text-align: right;'>Distance from Town Hall - </td>
        <td>".$postdata['club']['distance']."</td>
       </tr>

       <tr>
        <td colspan='2' style='text-align: right;'>&nbsp;</td>
       </tr>

       <tr>
        <td style='text-align: right;'>Contact person - </td>
        <td>".$postdata['contact']['firstname']." ".$postdata['contact']['surname']."</td>
       </tr>

       <tr>
        <td style='text-align: right;'>Email Address - </td>
        <td>".$postdata['contact']['email']."</td>
       </tr>

       <tr>
        <td style='text-align: right;'>Phone number - </td>
        <td>".$postdata['contact']['mobile']."</td>
       </tr>
      </table>

      <p>We would like to join your league, but unfortunately we are outside the 8 mile radius from Bolton Town Hall.</p>

      <p>Would you kindly contact ".$postdata['contact']['firstname']." ".$postdata['contact']['surname']." using the details above so that we can discuss options?</p>

      <p>Regards</p>
      <p>".$postdata['club']['name']."</p>
     </body>
    </html>
  ";

// Always set content-type when sending HTML email
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
  $headers .= "From: ".$from."\r\n";
//  $headers .= 'Cc: myboss@example.com' . "\r\n";

  mail($to,$subject,$message,$headers);

}

?>


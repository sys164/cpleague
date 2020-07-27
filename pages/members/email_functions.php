<?php

function email_club () {
  echo "<br>Wibble<br>";
}

function email_league () {
  echo "<br>Wobble<br>";
}

function welcome_email($name, $club, $position, $email, $hash) {
  $to = $email;
  $from = "CPL Registrations <registrations@cpleague.co.uk>";
  $subject = "Welcome to the CPL";
  $verify = "https://www.communitypartnershipleague.co.uk/pages/members/first_login.php?email=".$email."&hash=".$hash;

// Always set content-type when sending HTML email
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
  $headers .= "From: ".$from."\r\n";
  $headers .= "Reply-To: "."CPL Secretary<secretary@cpleague.co.uk>"."\r\n";

/*
  $headers .= "Reply-To: "."CPL Secretary<secretary@cpleague.co.uk>"."\r\n";
  $headers .= "BCC: "."CPL Registrations <registrations@cpleague.co.uk>"."\r\n";
*/
  
  $message = '
<html><body>
<div>
  <table>
    <tr>
      <td style="width: 15%;"><img src="https://www.communitypartnershipleague.co.uk/images/new_logo_small.gif" style="max-width: 100%; height: auto;"></td>
  	  <td><h1>Community Partnership League</h1></td>
    </tr>
    <tr>
      <td colspan="2">
        <h4>Welcome to the Community Partnership League.</h4>
        <p>Dear <strong><i>'.$name.'</i></strong>,</p>
        <p>We have received a registration request for <strong><i>'.$club.'</i></strong> to join the Community Partnership League for the upcoming season.</p>
        <p>You have been listed as the club <strong><i>'.$position.'</i></strong>.  Please find your first time login to our online registration system.  This will be needed in order to register your teams and coaches.</p>
        <p><strong><i><a href="'.$verify.'">Click here for your first Login</a></i></strong></p>
        <p>We will be opening team registrations in July. Once the teams are registered, your invoice wll be generated and emailed.  Our fees are not altering from last season and are still £10 for the club and £5 per team.  Please arrange for this to be paid before the 1st September.</p>
        <h4>Kind Regards</h4>
        <p>CPL Committee</p>
      </td>
    </tr>
  </table>
</div>
</body></html>
';

//  echo $message."<br>";
  mail($to, $subject, $message, $headers);
}

function welcome_new_email($name, $club, $position, $email) {
  $to = $email;
  $from = "CPL Registrations <registrations@cpleague.co.uk>";
  $subject = "Welcome to the CPL";

// Always set content-type when sending HTML email
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
  $headers .= "From: ".$from."\r\n";
  $headers .= "Reply-To: "."CPL Secretary<secretary@cpleague.co.uk>"."\r\n";
  
  $message = '
<html><body>
<div>
  <table>
    <tr>
      <td style="width: 15%;"><img src="https://www.communitypartnershipleague.co.uk/images/new_logo_small.gif" style="max-width: 100%; height: auto;"></td>
  	  <td><h1>Community Partnership League</h1></td>
    </tr>
    <tr>
      <td colspan="2">
        <h4>Welcome to the Community Partnership League.</h4>
        <p>Dear <strong><i>'.$name.'</i></strong>,</p>
        <p>We have received a registration request for <strong><i>'.$club.'</i></strong> to join the Community Partnership League for the upcoming season.</p>
        <p>You have been listed as the club <strong><i>'.$position.'</i></strong> and it would seem as though you are looking to register with the league for the first time.</p>
        <p>What happens now?</p>
        <p>As a prospective new club, we (the League Committee) will contact all current league members and ask if there are any objections to you being accepted.  Once we have had replies, we will let you know the outcome.</p>
        <p><i>Depending upon holidays, this process is usually compleyed within 10days.</i></p>
        <p>Once accepted, your Secretary and Chairperson will both receive welcome emails which provide access to the member section of the website for registering teams and coaches.</p>
        <h4>Kind Regards</h4>
        <p>CPL Committee</p>
      </td>
    </tr>
  </table>
</div>
</body></html>
';

//  echo $message."<br>";
  mail($to, $subject, $message, $headers);
}

function registration_email($name, $club, $position, $email) {
  $to = "CPL Secretary <secretary@cpleague.co.uk>";
  $from = $club." <".$email.">";
  $subject = "Successful Registration - returning";
//  $verify = "https://www.communitypartnershipleague.co.uk/pages/members/first_login.php?email=".$email."&hash=".$hash;

// Always set content-type when sending HTML email
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
  $headers .= "From: ".$from."\r\n";
//  $headers .= "Reply-To: "."CPL Secretary <secretary@cpleague.co.uk>"."\r\n";

  $message = '
<html><body>
<div>
  <table>
    <tr>
      <td style="width: 15%;"><img src="https://www.communitypartnershipleague.co.uk/images/new_logo_small.gif" style="max-width: 100%; height: auto;"></td>
  	  <td><h1>Community Partnership League</h1></td>
    </tr>
    <tr>
      <td colspan="2">
        <h4>Initial Registration Complete.</h4>
        <p>Dear League Committee,</p>
        <p>As club <strong><i>'.$position.'</i></strong>, I (<strong><i>'.$name.'</i></strong>) have registered <strong><i>'.$club.'</i></strong> with your league for the upcoming season.</p>
        <p>Your online system has recognised that we are a returing member club, and we agree to update the registration with details of our teams and coaches before the end of July.</p>
        <p>We understand that this information will be used to generate an invoice that will then be emailed to us - and that this will need to be paid before 1st September.</p>
        <h4>Kind Regards</h4>
        <p><strong><i>'.$name.'</i></strong> - on behalf of <strong><i>'.$club.'</i></strong></p>
      </td>
    </tr>
  </table>
</div>
</body></html>
  ';

//  echo $message."<br>";
  mail($to, $subject, $message, $headers);
																																																																																																																																																																																																																																																								}

function new_club_email($postdata) {

  $club = $postdata['club'];
  $secretary = $postdata['sec'];
  $chair = $postdata['chair'];

  $name = $secretary['firstname']." ".$secretary['surname'];
  $address = $club['address'];
  if(strlen($club['area'])> 0){ $address .= ", ".$club['area']; }
  if(strlen($club['town'])> 0){ $address .= ", ".$club['town']; }
  $address .= ", ".$club['postcode'];

  $to = "CPL Secretary <secretary@cpleague.co.uk>";
  $from = $club['name']." <".$secretary['email'].">";
  $subject = "Successful Registration - new club";
//  $verify = "https://www.communitypartnershipleague.co.uk/pages/members/first_login.php?email=".$email."&hash=".$hash;

// Always set content-type when sending HTML email
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
  $headers .= "From: ".$from."\r\n";
//  $headers .= "Reply-To: "."CPL Secretary <secretary@cpleague.co.uk>"."\r\n";

  $message = '
<html><body>
<div>
  <table>
    <tr>
      <td style="width: 15%;"><img src="https://www.communitypartnershipleague.co.uk/images/new_logo_small.gif" style="max-width: 100%; height: auto;"></td>
  	  <td><h1>Community Partnership League</h1></td>
    </tr>
    <tr>
      <td colspan="2">
        <h4>Initial Registration Complete.</h4>
        <p>Dear League Committee,</p>
        <p>As club <strong><i>Secretary</i></strong>, I (<strong><i>'.$name.'</i></strong>) have registered <strong><i>'.$club["name"].'</i></strong> with your league for the upcoming season.</p>
        <p>Your online system has recognised that we are new to your league.  Below are our details.  We look forwrd to hearing back from you once your current club members have voted on accepting us.</p>

        <h4>Club Details</h4>
        <ul>
          <li>'.$club["name"].'</li>
          <li>'.$address.'</li>
          <li>'.sprintf("%0.2f", round($club["distance"], 2)).'miles from Bolton Town Hall</li>
          <li>Secretary - '.$name.'</li>
          <li>Chairperson - '.$chair["firstname"].' '.$chair["surname"].'</li>
        </ul>

        <h4>Kind Regards</h4>
        <p><strong><i>'.$name.'</i></strong> - on behalf of <strong><i>'.$club["name"].'</i></strong></p>
      </td>
    </tr>
  </table>
</div>
</body></html>
  ';

//  echo $message."<br>";
  mail($to, $subject, $message, $headers);

}

?>

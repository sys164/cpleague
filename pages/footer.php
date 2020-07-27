<?php
// Start the session
#  session_start();
# include('../config/config.club.php');
include($_SERVER['HTTP_HOST'].'/config/config.club.php');
?>

<p>
  <table style="border-collapse: collapse; width: 100%;">
    <tbody>
      <tr>
        <td rowspan="3" style="border: none; width:12.5%"></td>
        <td style="border: none; width:30%; text-align: left;"><strong><u>Address</u>:</strong></td>
  	    <td rowspan="2" style="border: none; width: 15%; vertical-align: text-bottom; text-align: left;"></td>
  	    <td style="border: none; width: 30%; text-align: right;"><strong><u>Contact Us</u>:</strong></td>
  	    <td rowspan="3" style="border: none; width: 12.5%;"></td>
      </tr>

      <tr>
        <td style="border: none; vertical-align: text-top; text-align: left;">
          <?php echo CLUB_ADDRESS1."<br>"; 
          if(strlen(CLUB_ADDRESS2)>0) {echo CLUB_ADDRESS2."<br>";}
          if(strlen(CLUB_REGION)>0) {echo CLUB_REGION."<br>";}
          if(strlen(CLUB_TOWN)>0) {echo CLUB_TOWN."<br>";}
          echo CLUB_POSTCODE;
          ?>
        </td>
        <td style="border: none; vertical-align: text-top; text-align: right;">
          <?php echo CLUB_CONTACT."<br>"; 
          if(strlen(CLUB_TELEPHONE)>0) {echo '<a href="tel:'.CLUB_TELEPHONE.'">'.CLUB_TELEPHONE.'</a><br>';}
          if(strlen(CLUB_EMAIL)>0) {echo '<a href="mailto:'.CLUB_EMAIL.'">'.CLUB_EMAIL.'</a><br>';}
          ?>
        </td>
      </tr>

      <tr>
      	<td colspan="3" style="border: none; text-align: center;">
      	  <b>&copy;</b> Kingfish Computing 2019-<?php echo date('Y'); ?>
      	</td>
      </tr>
    </tbody>
  </table>
</p>
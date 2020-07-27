<?php

include('./mem_functions.php');

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
    if(isset($postdata['club']['postcode']) && !isset($postdata['club']['distance'])) {
      $google_data = getDistance($postdata['club']['postcode']);
      $tmp_data = explode(',', $google_data['destination']['address']);
      $postdata['club']['area'] = trim($tmp_data['1']);
      $postdata['club']['town'] = trim(str_ireplace($postdata['club']['postcode'], ' ', $tmp_data['2']));
      $postdata['club']['distance'] = $google_data['crow'];
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://www.communitypartnershipleague.co.uk/css/membership.php" type="text/css" charset="utf-8" />
</head>
<body style="background-color: transparent;">
  <div class="modal-body">

  <?php
  if(isset($postdata['club']['distance']) && $postdata['club']['distance'] > 8) {
    ?>
    <form class="modal-form" method="post" target="mem_form" action="email_form.php">
      <?php 
      if(count($postdata) > 0) {
        foreach ($postdata as $page => $a) {
          if(count($a) > 1) {
            foreach ($a as $key => $value) {
              ?>
              <input type="hidden" id="<?php echo $page.'_'.$key;?>" name="<?php echo $page.'_'.$key;?>" value="<?php echo $value;?>">
              <?php
            }
          }
        }
      }
      ?>
      <fieldset>
        <legend><strong>Contact Us</strong></legend>

        <h4 style="color: red;">Unfortunately you appear to be outside our 8 mile limit</h4>
        <p>Thank you for your enquiry.</p>
        <p>To proceed with your clubs request, please email us using the form below.</p>

        <div class="row">
          <div class="col-25">
            <label for="contact_firstname">First Name</label>
          </div>
          <div class="col-75">
            <input type="text" id="contact_firstname" name="contact_firstname" placeholder="First name..." value="" pattern="[A-zÀ-ž]{3,}" required>
          </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label for="contact_surname">Family Name</label>
          </div>
          <div class="col-75">
            <input type="text" id="contact_surname" name="contact_surname" placeholder="Family name..." value="" pattern="[A-zÀ-ž-]{3,}" required>
          </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label for="contact_mobile">Mobile Number</label>
          </div>
          <div class="col-75">
            <input type="tel" id="contact_mobile" name="contact_mobile" placeholder="Mobile number..." value="" pattern="07[0-9]{3}[0-9]{6}" required>
            <small>Format: 07xxxxxxxxx</small>
          </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label for="contact_email">Email Address</label>
          </div>
          <div class="col-75">
            <input type="email" id="contact_email" name="contact_email" placeholder="Email address..." value="" required>
          </div>
        </div>

      </fieldset>

      <div class="row">
        <label></label>
        <input type="submit" value="Contact Us">
      </div>
    </form>

    <?php
  } else {

    if($_POST['page'] == "chairperson") {
      $form_action = "success_page.php";
    } else {
      $form_action = "";
    }
    ?>
    <p style="text-align: center;">&nbsp;</p>
    <form class="modal-form" method="post" target="mem_form" action="<?php echo $form_action; ?>">
      <fieldset>
      
      <?php 
      if(count($postdata) > 0) {
        foreach ($postdata as $page => $a) {
          if(count($a) > 1) {
      	    foreach ($a as $key => $value) {
      	      ?>
      	      <input type="hidden" id="<?php echo $page.'_'.$key;?>" name="<?php echo $page.'_'.$key;?>" value="<?php echo $value;?>">
      	      <?php
            }
          }
        }
      }

      switch ($_POST['page']) {
        case 'chairperson':
          ?>

          <h3>Club Registration</h3>
          <h4>2020-2021</h4>

          <hr>

          <p>Please read and confirm the following.</p>

          <p>Once you have been accepted, the club login detals will be sent to the club Secretary and Chairperson.  At this point we ask that you add details of your treasurer, welfare officer and teams that will be entering.</p>

          <p>Then we will send an invoice to you club Treasurer</p>

          <hr>

          <p>I confirm that <?php echo $postdata['club']['name']; ?> wish to register with the Community Partnership League for the 2020-2021 season.</p>

          <p>On behalf of our club secretary(<?php echo $postdata['sec']['firstname'].' '.$postdata['sec']['surname']; ?>) and chairperson(<?php echo $postdata['chair']['firstname'].' '.$postdata['chair']['surname']; ?>) :-</p>

          <p>I confirm that we have seen a copy of the rules and regulations of the Community Partnership Football League and do hereby agree on behalf of the club, if accepted into membership, to conform to those rules and Regulations and to accept, abide by and implement the decisions of the Management Committee of the competition, subject to the right of appeal in accordance with rule 16.</p>


          <div class="row">
            <input type="checkbox" id="confirmed" name="confirmed" required>
            <label for="confirmed">Please tick to confirm...</label>
          </div>

          <?
          break;

        case 'secretary':
          ?>
          <legend><strong>Club Chairperson</strong></legend>

          <input type="hidden" id="page" name="page" value="chairperson">

          <div class="row">
          	<div class="col-25">
              <label for="chair_firstname">First Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="chair_firstname" name="chair_firstname" placeholder="First name..." value="" pattern="[A-zÀ-ž]{3,}" required>
            </div>
          </div>

          <div class="row">
            <div class="col-25">
              <label for="chair_surname">Family Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="chair_surname" name="chair_surname" placeholder="Family name..." value="" pattern="[A-zÀ-ž-]{3,}" required>
            </div>
          </div>

          <div class="row">
            <div class="col-25">
              <label for="chair_mobile">Mobile Number</label>
            </div>
            <div class="col-75">
              <input type="tel" id="chair_mobile" name="chair_mobile" placeholder="Mobile number..." value="" pattern="07[0-9]{3}[0-9]{6}" required>
              <small>Format: 07xxxxxxxxx</small>
            </div>
          </div>

          <div class="row">
            <div class="col-25">
              <label for="chair_email">Email Address</label>
            </div>
            <div class="col-75">
              <input type="email" id="chair_email" name="chair_email" placeholder="Email address..." value="" required>
            </div>
          </div>
          <?php

          break;

        case 'club':
          ?>
          <legend><strong>Club Secretary</strong></legend>

          <input type="hidden" id="page" name="page" value="secretary">

          <div class="row">
            <div class="col-25">
              <label for="sec_firstname">First Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="sec_firstname" name="sec_firstname" placeholder="First name..." value="" pattern="[A-z]{3,}" required>
            </div>
          </div>

          <div class="row">
            <div class="col-25">
              <label for="sec_surname">Family Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="sec_surname" name="sec_surname" placeholder="Family name..." value="" pattern="[A-zÀ-ž-]{3,}" required>
            </div>
          </div>

          <div class="row">
            <div class="col-25">
              <label for="sec_mobile">Mobile Number</label>
            </div>
            <div class="col-75">
              <input type="tel" id="sec_mobile" name="sec_mobile" placeholder="Mobile number..." value="" pattern="07[0-9]{3}[0-9]{6}" required>
              <small>Format: 07xxxxxxxxx</small>
            </div>
          </div>

          <div class="row">
            <div class="col-25">
              <label for="sec_email">Email Address</label>
            </div>
            <div class="col-75">
              <input type="email" id="sec_email" name="sec_email" placeholder="Email address..." value="" required>
            </div>
          </div>
          <?php

          break;

        default:
          ?>
          <legend><strong>Club Name and Address</strong></legend>

          <input type="hidden" id="page" name="page" value="club">

          <div class="row" style="text-align: center;">
            Please provide an address for your clubhouse, pitch or a committee member.
          </div>

          <div class="row">
            <div class="col-25">
              <label for="club_name">Club Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="club_name" name="club_name" placeholder="Name of Club..." value="" pattern="[A-z ]{5,}" required>
            </div>
          </div>

          <div class="row">
            <div class="col-25">
              <label for="club_address">Street Address</label>
            </div>
            <div class="col-75">
              <input type="text" id="club_address" name="club_address" placeholder="First line of address..." value="" pattern="[A-z0-9À-ž ]{4,}" required>
            </div>
          </div>

          <div class="row">
            <div class="col-25">
              <label for="club_postcode">Postcode</label>
            </div>
            <div class="col-75">
              <input type="text" id="club_postcode" name="club_postcode" placeholder="Club postcode..." value="" pattern="[A-Z0-9]{3}[ ][A-Z0-9]{3,}" required>
              <small>Format: xx0 0xx</small>
            </div>
          </div>

          <?php
          break;
      }
      if($_POST['page'] == 'chairperson') {
      	$btn_value = 'Submit';
      } else {
      	$btn_value = 'Next';
      }
      ?>

      <div class="row">
        <label></label>
        <input type="submit" value="<?php echo $btn_value; ?>">
        <?php
        if(strlen($_POST['page']) > 0) { ?>
          <br>
          <input type='reset' value='Start again' onclick='document.location.href = "club_name.php"'>
          <?php
        }
        ?>
      </div>
      </fieldset>
    </form>

  <?php
  }
  ?>
  </div>
</body>
</html>

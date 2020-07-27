<?php

  $base_dir = "../../";
  $member_dir = "./";
  $email = $_GET['email'];
  $hash = $_GET['hash'];
  $reg_type = 0;

  include($base_dir."classes/cpl.php");
  include($base_dir.'config/config.club.php');
  include($base_dir."config/config.colour.php");

  $user = new user($email, "", "", $hash, $base_dir);

  switch ($user->regtype) {
    case '1':
      $firstname = $secretary->user->firstname;
      $surname = $secretary->user->surname;
      $type = 'Secretary';
      $club = $secretary->user->club_name;
      break;

    case '2':
      $firstname = $chairperson->user->firstname;
      $surname = $chairperson->user->surname;
      $type = 'Chairperson';
      $club = $secretary->user->club_name;
      break;

    case '3':
      $firstname = $secretary->user->firstname;
      $surname = $secretary->user->surname;
      $type = 'Secretary and Chairperson';
      $club = $secretary->user->club_name;
      break;

    default:
      # code...
      break;
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <title><?php echo CLUB_NAME;?></title>
  <meta name="DC.title" content="<?php echo CLUB_NAME;?>">
  <meta http-equiv="last-modified" content="Thur, 26 Dec 2019 23:30:00 GMT" />

  <meta charset="utf-8">

  <?php include($base_dir.'favicon.php'); ?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link rel="stylesheet" href="<?php echo $base_dir; ?>css/fonts.css" type="text/css" charset="utf-8" />
  <link rel="stylesheet" href="<?php echo $base_dir; ?>css/layout.php" type="text/css" charset="utf-8" />
  <link rel="stylesheet" href="<?php echo $base_dir; ?>css/membership.php" type="text/css" charset="utf-8" />
  <link rel="stylesheet" href="<?php echo $base_dir; ?>css/fixtures.php" type="text/css" charset="utf-8" />
  <link rel="stylesheet" href="<?php echo $base_dir; ?>css/password.css" type="text/css" charset="utf-8" />

  <script src="<?php echo $base_dir; ?>menu.js"></script> 
</head>

<body>
<div id="page">
  <div id="top-bar">
    <div class="top-bar">
      &nbsp;
    </div>
  </div>

  <div id="header-bar">
    <?php 
      $split_name = explode(' ', CLUB_NAME);
    ?>
    <img class="logo" src=<?php echo $base_dir.'images/new_logo.gif';?>></img>

    <div class="name">
      <p>
        <?php
        for($rows = 0; $rows <= $i; $rows++) {
          if((($rows + 1) * 2) >= count($split_name)) {
            echo $split_name[($rows * 2)];
          } else {
            echo $split_name[($rows * 2)]." ".$split_name[(($rows * 2)+1)]."<br>";
          }
        }
        ?>
      </p>
    </div>
  </div>

  <div id="content" style="border-radius: 10px 10px 0 0;">
    <div>
      <h1 style="text-align: center;">First Time Login</h1>

      <?php if($user->regtype == 0) { ?>
      <p style="text-align: center;">Unfortunately you have used an invalid link.</p>
      <p style="text-align: center;">If this is an error, please <a href="mailto: secretary@cpleague.co.uk">email</a> us so that we can get you access:)</p>
      <?php } else {?>

      <p style="text-align: center;">Thank you <?php echo $firstname;?> for registering with the CPL on behalf of <?php echo $club; ?> as their <?php echo $type; ?></p>
      <p style="text-align: center;">We now need you to create a password so that you can register your Treasurer, Welfare officer, teams and coaches.</p>
    </div>

<!---
    <div>
      <p><pre>
      <?php // print_r($user) ?>
      </pre></p>
    </div>
--->

    <div class="container">
      <form action="index.php" method="post">
        <input type="hidden" id="usrname" name="usrname" value="<?php echo $email; ?>">
        <label for="psw">Password</label>
        <input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>

        <label for="pswConfirm">Confirm password</label>
        <input type="password" id="pswConfirm" name="pswConfirm" title="Must match your new password" required>

        <div id="savePassword"><input type="submit" value="Set password"></div>
      </form>
    </div>

    <div id="message">
      <Ul><strong>Your password must contain the following:</strong>
        <li id="letter" class="invalid">A <b>lowercase</b> letter</li>
        <li id="capital" class="invalid">A <b>capital (uppercase)</b> letter</li>
        <li id="number" class="invalid">A <b>number</b></li>
        <li id="length" class="invalid">Minimum <b>8 characters</b></li>
        <li id="confirm" class="invalid">Confirmed by <b>retype</b></li>
      </ul>
    </div> 
    <?php } ?>      
  </div>

   <div id="footer">
    <?php include($base_dir.'pages/footer.php'); ?>
  </div>
  <div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script>
      var myInput = document.getElementById("psw");
      var pswConfirm = document.getElementById("pswConfirm");
      var letter = document.getElementById("letter");
      var capital = document.getElementById("capital");
      var number = document.getElementById("number");
      var length = document.getElementById("length");
      var confirm = document.getElementById("confirm");

      // When the user clicks on the password field, show the message box
      myInput.onfocus = function() {
        document.getElementById("message").style.display = "block";
      }

      // When the user clicks outside of the password field, hide the message box
      myInput.onblur = function() {
        document.getElementById("message").style.display = "none";
      }

      // When the user clicks on the password confirm field, show the message box
      pswConfirm.onfocus = function() {
        document.getElementById("message").style.display = "block";
      }

      // When the user clicks outside of the password confirm field, hide the message box
      pswConfirm.onblur = function() {
        document.getElementById("message").style.display = "none";
      }
      // When the user starts to type something inside the password field
      myInput.onkeyup = function() {
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        if(myInput.value.match(lowerCaseLetters)) {
          letter.classList.remove("invalid");
          letter.classList.add("valid");
        } else {
          letter.classList.remove("valid");
          letter.classList.add("invalid");
        }

        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if(myInput.value.match(upperCaseLetters)) {
          capital.classList.remove("invalid");
          capital.classList.add("valid");
        } else {
          capital.classList.remove("valid");
          capital.classList.add("invalid");
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if(myInput.value.match(numbers)) {
          number.classList.remove("invalid");
          number.classList.add("valid");
        } else {
          number.classList.remove("valid");
          number.classList.add("invalid");
        }

        // Validate length
        if(myInput.value.length >= 8) {
          length.classList.remove("invalid");
          length.classList.add("valid");
        } else {
          length.classList.remove("valid");
          length.classList.add("invalid");
        }
      }

      pswConfirm.onkeyup = function() {
        // Confirm by retype
        var newPassword = myInput.value
        var checkPassword = pswConfirm.value
        if(newPassword == checkPassword) {
          confirm.classList.remove("invalid");
          confirm.classList.add("valid")
          document.getElementById("savePassword").style.display = "block";
        } else {
          confirm.classList.remove("valid");
          confirm.classList.add("invalid")
          document.getElementById("savePassword").style.display = "none";
        }
      }
    </script>

  </div>
</div>

</body>
</html>

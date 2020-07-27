<?php
// Start the session
  session_start();

  $base_dir = "../../";
  $member_dir = "./";

  include($base_dir."classes/cpl.php");
//  include($base_dir."classes/user.php");

  $db = db_connect($base_dir);
  $divisions = new divisions($base_dir);
  $postdata = new postdata($_POST);
  $user = new user($postdata->usrname, $postdata->psw, $postdata->pswConfirm, "", $base_dir);

  if($user->regtype > 0) {
    $teams = new teams($user->secretary->club_id, $user->chairperson->club_id, $user->treasurer->club_id, $user->welfare->club_id, $base_dir);
    $clubs = new clubs($user->secretary->club_id, $user->chairperson->club_id, $user->treasurer->club_id, $user->welfare->club_id, $base_dir);
  } else {
    $teams = '';
    $clubs = '';
  }

//  unset($_POST);

  switch ($_SERVER['SERVER_NAME']) {
    case 'cpleague.co.uk':
      header("Location: https://www.communitypartnershipleague.co.uk/pages/members");
      break;

    case 'communitypartnershipleague.co.uk':
      if($_SERVER['HTTPS'] == 'on') {
        $postdata->secure = TRUE;
      } else {
        echo "Wibble";
      }
      break;

    case 'members.communitypartnershipleague.co.uk':
      header("Location: https://www.communitypartnershipleague.co.uk/pages/members");
      break;

    case 'members.cpleague.co.uk':
      header("Location: https://www.communitypartnershipleague.co.uk/pages/members");
      break;
    default:
      echo "<h1>Access Denied</h1>";
      echo "<p>This site can only be accessed via a recognised URL.</p>";
      break;
  }


    include($base_dir.'config/config.club.php');
    include($base_dir."config/config.colour.php");

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
  <link rel="stylesheet" href="<?php echo $base_dir; ?>css/form.css" type="text/css" charset="utf-8" /> 

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="<?php echo $base_dir; ?>menu.js"></script>

</head>

<body> 
<div id="page">
  <div id="top-bar">
    <div class="login-register" type="button" data-toggle="modal" data-target="#myModal" onclick="loginButton();">
      Login/Register
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

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog .modal-lg" role="document">
        <div class="modal-content">
          <?php
          include($base_dir.'pages/members/login-register.php');
          ?>
        </div>
      </div>
    </div>

  </div>
  <div id="content" style="border-radius: 10px 10px 0 0;">
    <?php
    if ($user->regtype == 0) {
      include('login.php');
    } else {
      ?>
      <div>
        <h1 style="text-align: center;">Your Profile</h1>
        <p style="text-align: center;">Thank you for registering</p>
      </div>

<!---
      <div>
        <p><pre><br>
          <?php // print_r($_POST); ?>
        </pre></p>
      </div>
--->

      <div id="clubs"><?php include('clubs.php');?></div>
      <div id="teams"><?php include('teams.php');?></div>
      <div>
        <p style="text-align: center;"><br></p>
        <p style="text-align: center;">Please bear with us while we are developing this functionality</p>
        <p style="text-align: center;">Regards</p>
        <p style="text-align: center;">The CPL Committee</p>
        <p style="text-align: center;"><br></p>
      </div>
      <?php
    }
    ?>
  </div>

  <div id="footer">
    <?php include($base_dir.'pages/footer.php'); ?>
  </div>
  <div>

<!---
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
--->

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script>
      $(document).ready( function() {
        $(".update_club").click(function(){
          var club_name_uri = encodeURIComponent($(this).data('club'));
          $("#clubs").load($(this).data('page')+"?usrname="+$(this).data('usr')+"&psw="+$(this).data('psw')+"&club_id="+$(this).data('id')+"&club_name="+club_name_uri+"&position_type="+$(this).data('position')+"&position_id="+$(this).data('position_id'));
        });
        $(".update_team").click(function(){
          var club_name_uri = encodeURIComponent(($(this).data('club_name')).trim());
          $("#teams").load($(this).data('page')+"?usrname="+$(this).data('usr')+"&psw="+$(this).data('psw')+"&club_id="+$(this).data('club_id')+"&club_name="+club_name_uri+"&team_id="+$(this).data('team_id')+"&team_name="+$(this).data('team')+"&team_age="+$(this).data('age')+"&coach_id="+$(this).data('coach_id')+"&coach_name="+$(this).data('coach'));
        });
      });
    </script>

<script language="javascript" type="text/javascript">
  function clubDetailsForm() {
    var usrname = document.getElementById("usrname").value;
    var psw = document.getElementById("psw").value;
    var club_id = document.getElementById("club_id").value;

    clubCommAPI();

    $("#updt_club").submit();
  }

  function teamDetailsForm() {
    var usrname = document.getElementById("usrname").value;
    var psw = document.getElementById("psw").value;

    teamAddRemAPI();

    $("#updt_team").submit();
  }

  function clubCommAPI() {
    var uname = document.getElementById("usrname").value;
    var psword = document.getElementById("psw").value;

    var club_name = $('#club_name').val().replace(' ', '-').trim();

    var fd = new FormData();
    fd.append( 'usrname', uname);
    fd.append( 'psw', psword);
    fd.append( 'club_id', $('#club_id').val().trim());
    fd.append( 'club_name', club_name);
    fd.append( 'form_type', $('#form_type').val().trim());
    fd.append( 'position_type', $('#position_type').val().trim());
    fd.append( 'position_id', $('#position_id').val().trim());

    fd.append( 'position_firstname', $('#position_firstname').val().trim());
    fd.append( 'position_surname', $('#position_surname').val().trim());
    fd.append( 'position_email', $('#position_email').val().trim());
    fd.append( 'position_mobile', $('#position_mobile').val().trim());

    $.ajax({
      url : 'club_comm_update.php',
      data: fd,
      processData: false,
      contentType: false,
      type: 'POST',
      success : function(data){
        var obj = jQuery.parseJSON(data);
        console.table(obj, null, 4);
      }
    });

//    console.table(fd, null, 4);
    postForm('index.php', {usrname: uname, psw: psword})
  }

  function teamAddRemAPI() {
    var a;

    var uname = document.getElementById("usrname").value.trim();
    var psword = document.getElementById("psw").value.trim();
    var club_name = $('#club_name').val().replace(' ', '-').trim();
    var type = $('#type').val().trim();
    var club_id = $('#club_id').val().trim();
    var coach_firstname = $('#coach_firstname').val().trim()
    var coach_surname = $('#coach_surname').val().trim()
    var coach_mobile = $('#coach_mobile').val().trim()
    var coach_email = $('#coach_email').val().trim()
    var team_id = $('#team_id').val().trim()
    var team_name = $('#team_name').val().trim()
    var team_age = $('#team_age').val().trim()

    var errormsg = "";
      if(type == "remove") {
//        alert('Remove');
      }
      if(type == "add") {
//        alert('Add');
        if(coach_firstname.length < 1) {errormsg = errormsg + '\nThe FIRSTNAME of your coach';}
        if(coach_surname.length < 1) {errormsg = errormsg + '\nThe SURNAME of your coach';}
        if(coach_mobile.length < 1) {errormsg = errormsg + '\nThe MOBILE of your coach';}
        if(coach_email.length < 1) {errormsg = errormsg + '\nThe EMAIL of your coach';}
      }

    if(errormsg.length > 0) {
      alert('Please correct the following details\n' + errormsg);
    } else {

      var fd = new FormData();
      fd.append( 'usrname', uname);
      fd.append( 'psw', psword);
      fd.append( 'type', type);
      fd.append( 'club_id', club_id);
      fd.append( 'club_name', club_name);
      fd.append( 'coach_firstname', coach_firstname);
      fd.append( 'coach_surname', coach_surname);
      fd.append( 'coach_mobile', coach_mobile);
      fd.append( 'coach_email', coach_email);
      fd.append( 'team_id', team_id);
      fd.append( 'team_name', team_name);
      fd.append( 'team_age', team_age);

      $.ajax({
        url : 'team_add_remove.php',
        data: fd,
        processData: false,
        contentType: false,
        type: 'POST',
        success : function(data){
          var obj = jQuery.parseJSON(data);
          if(obj.errormsg.length > 2) {
            alert(obj.errormsg);
          }
          console.table(obj, null, 4);
          postForm('index.php', {usrname: uname, psw: psword})
        }
      });

//      fd.forEach(myFormData);
//      postForm('index.php', {usrname: uname, psw: psword})
    }
  }

  function cancelForm() {
    var uname = document.getElementById("usrname").value;
    var psword = document.getElementById("psw").value;

    postForm('index.php', {usrname: uname, psw: psword})
  }

  function postForm(path, params, method) {
    method = method || 'post';

    var form = document.createElement('form');
    form.setAttribute('method', method);
    form.setAttribute('action', path);

    for (var key in params) {
      if (params.hasOwnProperty(key)) {
        var hiddenField = document.createElement('input');
        hiddenField.setAttribute('type', 'hidden');
        hiddenField.setAttribute('name', key);
        hiddenField.setAttribute('value', params[key]);

        form.appendChild(hiddenField);
      }
    }

    document.body.appendChild(form);
    form.submit();
  }

  function myFormData(item, index) {
    console.log(index + ' - ' + item);
  }

</script>

  </div>
</div>
</body>
</html>

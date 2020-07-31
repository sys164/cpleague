<?php
$cpl->user_type = '';
?>

        <div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin: 2vh 1vw 0 0;">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
<!---
          <h4 class="modal-title">Login or Register</h4>
--->
        <div class="modal-header logreg">
<!---
          <button class="memButton" onclick="showLogin();">Login</button>
--->
<!---          <button class="memButton" onClick="parent.location='https://members.communitypartnershipleague.co.uk/'">Login</button> --->
          <button class="memButton" onClick="parent.location='pages/members/index.php'">Login</button>
          <button class="memButton" onclick="showRegister();">Register</button>
        </div>

        <div class="modal-body">

          <div id="login" class="hide" style="width: 100%;">
            <hr>
            <p style="text-align: center;">Sorry, logins are not yet available</p>
            <hr>
          </div>

          <div id="register" class="hide logreg">
            <hr>
          	<p style="text-align: center;">We will be accepting registrations for the upcoming season very soon.</p>
          	<p style="text-align: center;">There are a small number of conditions, and we will be building checks in to the process.</p>
          	<ul>
          	  <li>The clubs address must be within an 8 mile radius of Bolton Town Hall</li>
          	  <li>The club must never have been asked to leave the league preiously</li>
          	  <li>The club must have a current affiliation to their county FA</li>
          	</ul>
          	<p style="text-align: center;">Costs for joining our league are simple and cheap ~ £10 per club per season plus £5 per team.  We will need this payment before any registrations are complete.</p>
            <p style="text-align: center;">In order to register with the league, you will need to provide a postal address for the club, the clubs affiliation number and contact details for the Secretary, Chairperson, Welfare Officer and Treasurer.
            <br><br>
            <button class="memButton" onclick="showDetails();">Continue registration</button>
            <form method="post" target="mem_form" action="https://www.communitypartnershipleague.co.uk/pages/members/club_name.php">
              <input type="hidden" id="page" name="page" value="">
              <input type="hidden" id="distance" name="distance" value="">
            </form>
            <br><br><br>
            </p>
            <hr>
          </div>

          <div id="reg-details" class="hide">
          	<hr>
          	  <div class="iframe-container">
<!---
                <iframe name="mem_form" src="./pages/members/club_name.php" style="width: 100%; position: relative; display: block; margin: auto; padding: 0; border-color: transparent;"></iframe>
--->
                <iframe name="mem_form" src="./pages/members/club_name.php" style="width: 100%;"></iframe>
              </div>
            </hr>
          </div>
        </div>

        <div class="modal-footer logreg">
<!---
          <p>This is currently being developed, and is not fully functional</p>
--->
        </div>


        <script type="text/javascript">
          function loginButton() {
            document.getElementById('login').style.display ='none';
            document.getElementById('register').style.display ='none';
            document.getElementById('reg-details').style.display ='none';
          }

          function showLogin(){
            document.getElementById('login').style.display ='block';
            document.getElementById('register').style.display ='none';
            document.getElementById('reg-details').style.display ='none';
          }

          function showRegister(){
            document.getElementById('login').style.display ='none';
            document.getElementById('register').style.display ='block';
            document.getElementById('reg-details').style.display ='none';
          }        	

          function showDetails(){
            document.getElementById('login').style.display ='none';
            document.getElementById('register').style.display ='none';
            document.getElementById('reg-details').style.display ='block';
            document.querySelector('form').submit();
          }
        </script>



<?php

  $base_dir = "../../";

  include($base_dir."classes/cpl.php");

  $db = db_connect($base_dir);
  $postdata = new postdata($_GET);

?>
<!---
  <div>
  	<p><pre>
    <?php // print_r($postdata); ?>
    </pre></p>
  </div>
--->

  <div style="clear: both; position: relative;">
    <form action="team_add_remove.php" id="updt_team" method="post">
      <h9><?php echo $postdata->club->name; ?></h9>

      <div>
        <input type="hidden" id="usrname" name="usrname" value="<?php echo $postdata->usrname; ?>">
        <input type="hidden" id="psw" name="psw" value="<?php echo $postdata->psw; ?>">
        <input type="hidden" id="club_id" name="club_id" value="<?php echo $postdata->club->id; ?>">
        <input type="hidden" id="club_name" name="club_name" value="<?php echo $postdata->club->name; ?>">

      <?php if(!empty($postdata->team->id)) { 
          $postdata->type = "remove";
    	  ?>
        <input type="hidden" id="coach_firstname" name="coach_firstname" value="">
        <input type="hidden" id="coach_surname" name="coach_surname" value="">
        <input type="hidden" id="coach_mobile" name="coach_mobile" value="">
        <input type="hidden" id="coach_email" name="coach_email" value="">
        <input type="hidden" id="team_id" name="team_id" value="<?php echo $postdata->team->id; ?>">
        <input type="hidden" id="team_name" name="team_name" value="">
        <input type="hidden" id="team_age" name="team_age" value="<?php echo $postdata->team->age; ?>">
      </div>

      <div>
        <p>Please confirm that you want to remove the following team...</p>
        <p><strong><?php echo trim($postdata->club->name.' '.$postdata->team->age.' '.$postdata->team->name); ?></strong></p>
      </div>

      <?php } else {
        $postdata->type = "add"; ?>
        <input type="hidden" id="team_id" name="team_id" value="">

      </div>
      <div>
        <div style="display: inline-block; width: auto; position: relative;">
          <?php echo $postdata->club->name.' '?>
        </div>
        <div class="custom-select" style="display: inline-block; width: auto; border-color: transparent; background-color: transparent; padding: 0; margin: 0; color: transparent;">
          <select id="team_age" name="team_age">
            <option value="U7">Under 7's</option>
            <option value="U8">Under 8's</option>
            <option value="U9">Under 9's</option>
            <option value="U10">Under 10's</option>
            <option value="U11">Under 11's</option>
            <option value="U12">Under 12's</option>
            <option value="U13">Under 13's</option>
          </select>
        </div>
        <div style="display: inline-block; width: auto; padding: 0; margin: 0;">
          <input style="padding: 1vh 1vw; margin: 0;" type="text" id="team_name" name="team_name" value="" pattern="\S+.*" required>
          <label for="team_name">Team name</label>
        </div>
      </div>  

      <div>
        <div style="display: inline-block; width: auto; position: relative;">
          Coach
        </div>

        <div style="display: inline-block; width: auto; position: relative;">
          <input style="padding: 1vh 1vw; margin: 0;" type="text" id="coach_firstname" name="coach_firstname" value="" pattern="\S+.*" required>
          <label for="coach_firstname">Firstname</label>
        </div>

        <div style="display: inline-block; width: auto; position: relative;">
          <input style="padding: 1vh 1vw; margin: 0;" type="text" id="coach_surname" name="coach_surname" value="" pattern="\S+.*" required>
          <label for="coach_surname">Surame</label>
        </div>
      </div>

      <div>
        <input style="padding: 1vh 1vw; margin: 0;" type="text" id="coach_mobile" name="coach_mobile" value="" pattern="\S+.*" required>
        <label for="coach_mobile">Coachs mobile</label>
      </div>

      <div>
        <input style="padding: 1vh 1vw; margin: 0;" type="email" id="coach_email" name="coach_email" value="" required>
        <label for="coach_email">Coachs email</label>
      </div>


      <?php } ?>
      <div>
        <td colspan="4"><input type="hidden" id="type" name="type" value="<?php echo $postdata->type; ?>"></td>
      </div>

      <div>
        <input type="button" name="button" value="<?php echo ucwords($postdata->type); ?>" onClick='teamAddRemAPI()'>
      </div>

      <div>
        <input type="button" name="cancel" value="Cancel" onClick="cancelForm()">
      </div>

    </form>
  </div>


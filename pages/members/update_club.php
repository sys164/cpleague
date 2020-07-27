<?php

  $base_dir = "../../";

  include($base_dir."classes/cpl.php");

  $db = db_connect($base_dir);
  if(!empty($_POST)) {
    $postdata = new postdata($_POST);
  } else {
    $postdata = new postdata($_GET);
  }

  if(!empty($postdata->position->id)) {

    $sql = "
      SELECT 
        `firstname`,
        `surname`,
        `mobile`,
        `email`
      FROM `".$postdata->position->type."` 
      WHERE 
        `id` = '".$postdata->position->id."';
    ";

    $details = mysqli_query($db, $sql);

    foreach ($details as $key => $detail) {
      $postdata->position->firstname = $detail['firstname'];
      $postdata->position->surname = $detail['surname'];
      $postdata->position->mobile = $detail['mobile'];
      $postdata->position->email = $detail['email'];
    }
    $postdata->type = "update";
  } else {
    $postdata->position->firstname = "";
    $postdata->position->surname = "";
    $postdata->position->mobile = "";
    $postdata->position->email = "";
    $postdata->type = "add";
  }

  switch ($postdata->position->type) {
  	case 'secretary':
  		$type = "sec";
  		break;
  	
  	case 'chairperson':
  		$type = "chair";
  		break;
  	
  	default:
  		$type = $postdata->position->type;
  		break;
  }

?>
<div>
  <form class="members" action="club_comm_update.php" id="updt_club" method="post">
    <h9><?php echo $postdata->club->name; ?></h9>

    <div>
      <input type="hidden" id="usrname" name="usrname" value="<?php echo $postdata->usrname; ?>">
      <input type="hidden" id="psw" name="psw" value="<?php echo $postdata->psw; ?>">
      <input type="hidden" id="club_id" name="club_id" value="<?php echo $postdata->club->id; ?>">
      <input type="hidden" id="club_name" name="club_name" value="<?php echo $postdata->club->name; ?>">
      <input type="hidden" id="form_type" name="form_type" value="<?php echo $postdata->type; ?>">
      <input type="hidden" id="position_type" name="position_type" value="<?php echo $postdata->position->type; ?>">
      <input type="hidden" id="position_id" name="position_id" value="<?php echo $postdata->position->id; ?>">
    </div>

    <div>
      <input style="padding: 1vh 1vw; margin: 0;" type="text" id="position_firstname" name="position_firstname" value="<?php echo $postdata->position->firstname; ?>" pattern="\S+.*" required>
      <label for="position_firstname">First name</label>
    </div>

    <div>
      <input style="padding: 1vh 1vw; margin: 0;" type="text" id="position_surname" name="position_surname" value="<?php echo $postdata->position->surname; ?>" pattern="\S+.*" required>
      <label for="position_surname">Surname</label>
    </div>

    <div>
      <input style="padding: 1vh 1vw; margin: 0;" type="email" id="position_email" name="position_email" value="<?php echo $postdata->position->email; ?>" pattern="\S+.*" required>
      <label for="position_email">Email</label>
    </div>

    <div>
      <input style="padding: 1vh 1vw; margin: 0;" type="text" id="position_mobile" name="position_mobile" value="<?php echo $postdata->position->mobile; ?>" pattern="\S+.*" required>
      <label for="position_mobile">Mobile</label>
    </div>

    <div>
      <input type="button" name="button" value="<?php echo trim(ucwords($postdata->type).' '.ucwords($postdata->position->type)); ?>" onClick='clubCommAPI()'>
    </div>

    <div>
      <input type="button" name="cancel" value="Cancel" onClick="cancelForm()">
    </div>

  </form>
</div>



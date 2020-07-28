<?php
// Start the session
#   session_start();
$split_name = explode(' ', CLUB_NAME);

?>

<!---  <img class="logo" src=<?php # echo '../images/'.CLUB_LOGO.'';?>></img> --->
  <img class="logo" src="<?php echo '../images/new_logo.gif';?>" onClick="location.href='../../index.php'"></img>

  <div class="name">
    <p>
      <?php # echo CLUB_NAME;?>
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




<!-- Login/Register Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog .modal-lg" role="document">
      <div class="modal-content">

        <?php
        include($base_dir.'pages/members/login-register.php');
        ?>

      </div>
    </div>
  </div>


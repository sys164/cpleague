<?php
 include('https://www.communitypartnershipleague.co.uk/pages/test-head.php');

$cpl->user_type = '';
?>

        <div class="modal-header">
          <h4 class="modal-title">Login or Register</h4>
          <button type="button" class="close" data-dismiss="modal" style="float: right;">&times;</button>
        </div>
        <div class="modal-body">

          <?php
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // collect value of input field
            $postcode = $_POST['postcode'];
            if (!empty($postcode)) {


              echo $postcode;
              $output = getDistance($postcode);
              echo $output;


            } else {

              echo "No postcode entered";

            }
          }
          ?>

              <form method="post" target="_blank">
                <label for="postcode">Postcode</label>
                <input type="text" name="postcode" value="">
                <input type="submit" value="Submit">
              </form>

<!---
<div class='circle-container'>

	<a href='#' class='deg0'><img src='http://imgsrc.hubblesite.org/hu/db/images/hs-1994-02-c-thumb.jpg'></a>
	<a href='#' class='deg45'><img src='https://www.communitypartnershipleague.co.uk/images/family1.gif'></a>

	<a href='#' class='deg45'><img src='http://imgsrc.hubblesite.org/hu/db/images/hs-2005-37-a-thumb.jpg'></a>
	<a href='#' class='deg315'><img src='http://imgsrc.hubblesite.org/hu/db/images/hs-2004-32-d-thumb.jpg'></a>
    <a href='#' class='deg30'><img src='http://imgsrc.hubblesite.org/hu/db/images/hs-2004-32-d-thumb.jpg'></a>
</div>
--->


<!---
          <p>
            <img id="example-element" class="transition-all" src="https://interactive-examples.mdn.mozilla.net/media/examples/round-balloon.png" style="shape-outside: circle(50% at center center);" width="150">
            <?php 
#          	include 'lipsum.php';
#          	echo $html;
          	?>
          </p>
--->

        </div>
        <div class="modal-footer">
          <p>This is currently being developed, and is not fully functional</p>

<!---
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
--->
        </div>

<?php
 include('https://www.communitypartnershipleague.co.uk/pages/test-foot.php');

?>

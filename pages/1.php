<?php
  $title = "Covid-19";
?>

<div>
  <h1 style="text-align: center;">Covid-19</h1>


  <p style="text-align: center;">
  I hope we find you, your family and club members safe and well.
  </p>

  <p style="text-align: center;">
  During this period of enforced isolation, I know that many local clubs are starting to look at their options for the coming 2020/21 season and we wanted to thank you on behalf of the Community Partnership League for considering our league.
  </p>

  <p style="text-align: center;">
  During these difficut times it can be difficult to keep our little players both occupied and excercised. Below are a number of short videos showing excercise routines that can all be performed in one room.
  </p>

  <p style="text-align: center;">
  Hopefully, they will help a little.
  </p>

  <p style="text-align: center;">
  <?php
    $video_dir = $base_dir.'videos/room/';
    $vids = scandir($video_dir);

    foreach ($vids as $vid) {
    	$name = explode(".", $vid)[0];
  	  $extension = explode(".", $vid)[1];
  	  if(strtoupper($extension) == 'MP4') {
#    	    echo '<a href="'.$video_dir.$vid.'">'.explode(".", $vid)[0].'</a>';
        ?>
  	    <button onclick='changeVideo("<?php echo $video_dir; ?>", "<?php echo $name; ?>", "<?php echo $extension; ?>")' type="button" class="btn btn-primary btn-txt" data-toggle="modal" data-target="#videoModal" data-url="<?php echo $video_dir.$vid; ?>"><?php echo $name; ?></button>
  	    <br><br>
  	    <?php
      }
    }
  ?>
  </p>
</div>
<!---
  <div class="float-right login-register" type="button" data-toggle="modal" data-target="#videoModal" video="">
  	<font>Login/Register</font>
  </div>
--->

  <!-- Video Modal -->
  <div class="modal fade" id="videoModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        	<h5 class="modal-title" id="videoModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" style="float: right;">&times;</button>
        </div>
        <div class="modal-body">

          <video id="video_ctrl" height="240px" width="426px" controls="controls">
          	<source id="mp4video" src="videos/room/10-Minute Yoga for Guys Who Aren’t Flexible.mp4" type="video/mp4">
          </video>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<script type="text/javascript">
function changeVideo(dir, name) {
  document.getElementById("videoModalLabel").innerHTML = name;

  var videocontainer = document.getElementById('video_ctrl');
  var videosource = document.getElementById('mp4video');
  var newmp4 = dir+name+".mp4";
  // var newposter = dir+name+".jpg";

  videocontainer.pause();
  videosource.setAttribute('src', newmp4);
  videocontainer.load();
  //videocontainer.setAttribute('poster', newposter); //Changes video poster image
  videocontainer.play();
}

</script>


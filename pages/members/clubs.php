
    <?php
    foreach ($clubs as $id => $club) {
      ?>
      <div id="club">
        <table border="0" style="border-collapse:collapse; padding: 0; margin: 0 auto;">
        <thead><tr>
          <th colspan="4" style="padding: 1vh 1vw; text-align: center; background-color: grey; color: white;"><strong>
          	<?php echo $club->club; ?>
          </strong></th>
      	  <th style="border-width: 0 0 0 1px;"></th>
        </tr></thead>

        <tbody>
        <?php
        foreach ($club as $position => $details) {
          if(($position != "club") && ($position != "club_id")) {
          	?>
          	<tr>
          	  <td align="center" style="padding: 1vh 1vw; border-style: dotted; border-width: 0 0 1px 0;"><?php echo ucwords($position); ?> </td>
          	  <td align="center" style="padding: 1vh 1vw; border-style: dotted; border-width: 0 0 1px 0;"><?php echo $details->name; ?> </td>
          	  <td align="center" style="padding: 1vh 1vw; border-style: dotted; border-width: 0 0 1px 0;"><a href="tel:<?php echo $details->mobile; ?>"><?php echo substr($details->mobile, 0, 5)." ".substr($details->mobile, 5); ?></a> </td>
          	  <td align="center" style="padding: 1vh 1vw; border-style: dotted; border-width: 0 0 1px 0;">
                  <a href="mailto:<?php echo $details->email; ?>">
                  	<?php if(!empty($details->email)) {?>email<?php } ?></a>
          	  </td>
          	  <td align="center" style="padding: 1vh 1vw;">
          	    <?php 
          	    if(!empty($details->email)) {
          	      ?><input type="button" class="update_club" data-page="update_club.php" data-id="<?php echo $club->club_id; ?>" data-club="<?php echo $club->club; ?>" data-position="<?php echo $position; ?>" data-position_id="<?php echo $details->id; ?>" data-usr="<?php echo $postdata->usrname; ?>" data-psw="<?php echo $postdata->psw; ?>" value="Update"></input><?php
          	    } else {
                  ?><input type="button" class="update_club" data-page="update_club.php" data-id="<?php echo $club->club_id; ?>" data-club="<?php echo $club->club; ?>" data-position="<?php echo $position; ?>" data-position_id="<?php echo $details->id; ?>" data-usr="<?php echo $postdata->usrname; ?>" data-psw="<?php echo $postdata->psw; ?>" value="Add"></input><?php
          	    } ?>
          	  </td>
          	</tr>
          	<?php
          }
        }
        ?>
        </tbody>
        </table>
      </div>
      <?php
    }
    ?>

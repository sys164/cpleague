
    <div id="team" style="clear: both; position:relative; margin: 0 auto;">
    <br><br>
    <table border="0" style="border-collapse:collapse; padding: 0; margin: 0 auto;">
      <thead>
      	<tr>
      	  <th colspan="2" style="padding: 1vh 1vw; text-align: center; background-color: grey; color: white;">Teams</th>
      	  <th colspan="3" style="padding: 1vh 1vw; text-align: center; background-color: grey; color: white;">Coach</th>
      	  <th style="border-width: 0 0 0 1px;"></th>
      	</tr>
      </thead>

      <tbody>
      <?php

      foreach ($teams as $id => $team) {

        $coach_name = str_replace(' ', '-', $team->coach);
        $coach_name = preg_replace('/[^A-Za-z0-9\-]/', '', $coach_name);

        $team_name = str_replace(' ', '-', $team->team);
        $team_name = preg_replace('/[^A-Za-z0-9\-]/', '', $team_name);

        $club_name = str_replace(' ', '-', $club->club);
        $club_name = preg_replace('/[^A-Za-z0-9\-]/', '', $club_name);

      	?>
      	<tr>
          <td align="center" style="padding: 1vh 1vw; border-style: dotted; border-width: 0 0 1px 0;"><?php echo ucwords(trim($team->club.' '.$team->team)); ?></td>
          <td align="center" style="padding: 1vh 1vw; border-style: dotted; border-width: 0 0 1px 0;"><?php echo $team->agegroup; ?></td>
          <td align="center" style="padding: 1vh 1vw; border-style: dotted; border-width: 0 0 1px 0;"><?php echo $team->coach; ?></td>
          <td align="center" style="padding: 1vh 1vw; border-style: dotted; border-width: 0 0 1px 0;"><a href="tel:<?php echo $team->mobile; ?>"><?php echo substr($team->mobile, 0, 5)." ".substr($team->mobile,5); ?></a></td>
          <td align="center" style="padding: 1vh 1vw; border-style: dotted; border-width: 0 0 1px 0;"><a href="mailto:<?php echo $team->email; ?>">email</a></td>
          <td align="center" style="padding: 1vh 1vw; border-width: 0 0 0 1px;">
            <input type="button" class="update_team"
             data-page="update_team.php"
             data-team_id="<?php echo $team->team_id; ?>" 
             data-team="<?php echo $team_name; ?>" 
             data-age="<?php echo $team->agegroup; ?>" 
             data-coach="<?php echo $coach_name; ?>" 
             data-coach_id="<?php echo $team->coach_id; ?>" 
             data-club_id="<?php echo $club->club_id; ?>" 
             data-club_name="<?php echo $club_name; ?>" 
             data-usr="<?php echo $postdata->usrname; ?>" 
             data-psw="<?php echo $postdata->psw; ?>" 
             value="Delete"></input>
          </td>
        </tr>
      	<?php
      }
      ?>
        <tr>
          <td colspan="5"></td>
          <td align="center" style="padding: 1vh 1vw; border-width: 0 0 0 1px;">
            <input type="button" class="update_team" 
              data-page="update_team.php" 
              data-team_id="" 
              data-team="" 
              data-age="<?php echo $team->agegroup; ?>" 
              data-coach="" 
              data-coach_id="" 
              data-club_id="<?php echo $club->club_id; ?>" 
              data-club_name="<?php echo $club_name; ?>" 
              data-usr="<?php echo $postdata->usrname; ?>" 
              data-psw="<?php echo $postdata->psw; ?>"
              value="Add"></input>
          </td>
        </tr>
      </tbody>
    </table>
    </div>

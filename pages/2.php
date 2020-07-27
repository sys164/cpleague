<?php
  $title = "About Us";
?>

<div>
  <h1 style="text-align: center;">About the League</h1>

  <p style="text-align: center;">
  Our league was formed in 2017 by a group of like-minded clubs from across the Bolton, Horwich, Westhoughton, Hindley and Atherton areas, who wanted to make junior football more fun, friendly and affordable.    
  </p>

  <p style="text-align: center;">
  Since launching, we have seen tremendous growth in participation across all of our age groups and we are now providing football for over 160 teams (over 1800 players), which makes us the quickest growing junior league in the area.
  </p>

  <p style="text-align: center;">
  We pride ourselves on being a friendly league that is 100% governed by member clubs for the benefit of member clubs.  Our focus is on developing football locally and so we operate a 8 mile catchment area (from Bolton town centre) for membership.  This means that teams don’t have long distances to travel to games, which saves time and unnecessary travel costs.
  </p>

  <p style="text-align: center;">
  <strong>
    We know that every penny counts in grassroots football and so we aim to make it as affordable as possible by keeping our league fees to an absolute minimum.  Membership for the coming season is just £10 for YOUR WHOLE CLUB plus £5 per team towards the cost of cup trophies/medals.   We believe this can make a significant saving for clubs, especially those entering teams across our Under 7 to Under 14 age groups. 
  </strong>
  </p>

  <p style="text-align: center;">
  As a community focused league our aim is to provide a friendly, fun and supportive environment for children to develop their soccer skills, social skills and hopefully make new friends.
  </p>

  <p style="text-align: center;">
  We hope this has given you an overview of the Community Partnership League and what we are doing in developing friendly, affordable junior football for like-minded local clubs.
  </p>

  <p style="text-align: center;">
  If you are interested in joining the Community Partnership League or you would like to discuss in more detail what we can offer, please feel free to cpntact one of the committee members listed below.  We are currently developing this site and wil shortly be launcing an online registration system for the upcoming season.
  </p>
</div>

<?php
$committee = new committee($base_dir);
$league_reps = new league_reps($base_dir);
?>

<div id="committee" style="display: block; margin: 0; padding: 0;">

  <div class="top_table" style="clear: both;">
    <?php
    foreach ($committee as $id => $member) { ?>
      <div class="card bg-light text-dark" style="width: 140px; margin: 3vh 1vw 3vh 1vw;">

        <?php 
        if(strlen($member->photo)>0) {
          ?>
          <img class="card-img-top" src=<?php echo '"'.$base_dir.'images/'.strtolower($member->photo).'" alt="Card image"'; ?>>
          <?php
        } else {
          ?>
          <img class="card-img-top" src="<?php echo $base_dir; ?>images/<?php echo strtolower($member->gender); ?>_avatar.png" alt="Card image">
          <?php
        }
        ?>
        <div class="card-body">
          <p class="card-title" style="text-align: center; font-size: 1em;">
            <strong><?php echo $member->firstname." ".$member->surname; ?></strong>
          </p>
          <p class="card-text" style="text-align: center; font-size: 1em;">
            <?php echo $member->position."<br>"; ?>
            <a href=<?php echo '"tel:'.$member->mobile.'"'; ?> > <?php echo substr($member->mobile, 0, 5).' '.substr($member->mobile, -6, 6); ?></a>
          </p>
        </div>
      </div>  
    <?php } ?>
  </div>

  <div class="league_reps" style="clear: both;">
    <?php
    foreach ($league_reps as $age => $league_rep) { ?>
      <div class="card bg-light text-dark" style="width: 145px; margin: 3vh 1vw 3vh 1vw;">

        <?php 
        if(strlen($league_rep->photo)>0) {
          ?>
          <img class="card-img-top" src=<?php echo '"'.$base_dir.'images/'.strtolower($league_rep->photo).'" alt="Card image"'; ?>>
          <?php
        } else {
          ?>
          <img class="card-img-top" src="<?php echo $base_dir; ?>images/<?php echo strtolower($league_rep->gender); ?>_avatar.png" alt="Card image">
          <?php
        }
        ?>
        <div class="card-body">
          <p class="card-title" style="text-align: center; font-size: 1em;">
            <strong><?php echo $league_rep->firstname." ".$league_rep->surname; ?></strong>
          </p>
          <p class="card-text" style="text-align: center; font-size: 1em;">
            <?php echo $league_rep->position."<br>"; ?>
            <a href=<?php echo '"tel:'.$league_rep->mobile.'"'; ?> > <?php echo substr($league_rep->mobile, 0, 5).' '.substr($league_rep->mobile, -6, 6); ?></a>
          </p>
        </div>
      </div>  
    <?php } ?>
  </div>

</div>



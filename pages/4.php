<?php
  $title = "Fixtures";
?>

<div>
  <h1 style="text-align: center;">Upcoming fixtures</h1>

  <p style="text-align: center;">
  We utilise the FA FullTime (FT) system for our fixtures, which means that we require each team (including the coaches) to be fully registered with their local Football Association using the Whole Game System (WGS).
  </p>

  <p style="text-align: center;">
  There are a number of ways to check fixtures.<br>
  <ul>
    <li>We provide a simple list of fixtures by divisions</li>
    <li>The <a href="https://fulltime.thefa.com/ff/LeagueDetails?leagueid=968490466" target="_Tab">FA FullTime website</a> provides fully searchable fixture lists</li>
    <li>The FA Matchday App runs on mobile devices, providing different acceess for coaches, parents and players - coaches can even record statistics like times of goals, numbers of assists etc<br><br>
    <div style='position: relative; padding: 0; margin: 0 auto;'>
      <a href="https://play.google.com/store/apps/details?id=com.thefa.matchdayapp&hl=en_GB" target="_Tab"><img src="../../images/playstore - black.gif" style="height: 4vh; margin: 0 1vw;"></a>
      <a href="https://apps.apple.com/gb/app/the-fa-matchday/id1401913451" target="_Tab"><img src="../../images/appstore - back.gif" style="height: 4vh; margin: 0 1vw;"></a>
    </div>
    </li>
  </ul>
  </p>
</div>

<hr>

<div id="div_select">

  <form id="select_div" action="./pages/fixtures/fixtures.php" method="post" target="cpl_fixtures">
    <input type="hidden" id="fixtures_object" name="fixtures_object" value='<?php echo json_encode($fixtures); ?>'>

    <select id="division" name="division" onchange="test(this)">
      <option value="0">Please select your division</option>
      <?php
      $i = 0;
      foreach ($fixtures as $division_code => $datetime) {
        $i++;
        $division_name = $divisions->$division_code->name;
        ?>
        <option value="<?php echo $division_code; ?>"><?php echo $division_name; ?></option>
        <?php
      }
      ?>
    </select>
  </form>
</div>

<hr>

<div id="fixtures">
  <iframe src="./pages/fixtures/nothing.php" name="cpl_fixtures"></iframe>
</div>

<script type="text/javascript">
  function test(a) {
    var x = (a.value || a.options[a.selectedIndex].value);  //crossbrowser solution =)
    a.form.submit();
  }
</script>

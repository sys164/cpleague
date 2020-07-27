<?php
function is_json($data = NULL) {
  if (!empty($data)) {
    @json_decode($data);
    return (json_last_error() === JSON_ERROR_NONE);
  }
  return false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <title><?php echo CLUB_NAME;?></title>
  <meta name="DC.title" content="<?php echo CLUB_NAME;?>">
  <meta http-equiv="last-modified" content="Thur, 26 Dec 2019 23:30:00 GMT" />

  <meta charset="utf-8">

  <?php include_once('../../favicon.php'); ?>
<!---  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link rel="stylesheet" href="../../css/fonts.css" type="text/css" charset="utf-8" />
  <link rel="stylesheet" href="../../css/fixtures.php" type="text/css" charset="utf-8" />

</head>

<body id="fixture_content">

<div id="fixtures">
  <?php 
  $division = $_POST['division'];
  $json = json_decode($_POST['fixtures_object']);
  $json = $json->$division;

  echo '<table>';
  foreach ($json as $datetime => $fixtures) {
    echo '<thead>';
    echo '<tr style="background-color: #006400; color: white; font-weight: bold;">';
    echo '<td colspan="4">'.date("D jS M Y", $datetime).'</td>';
    echo '</tr>';
    echo '</thead>';

    echo '<tbody>';
    foreach ($fixtures as $id => $fixture) {
      echo '<tr>';
      echo '<td>&nbsp;</td>';
      echo '<td style="font-weight: 550;">'.$fixture->home.'</td>';
      echo '<td>&nbsp; V &nbsp;</td>';
      echo '<td style="font-weight: 550;">'.$fixture->away.'</td>';
      echo '</tr>';
    }
    echo '<tr style="color: transparent; background-color: transparent;">';
    echo '<td colspan="4">&nbsp;.</td>';
    echo '</tr>';
    echo '</tbody>';
  }
  echo '</table>';
  ?>
</div>

</body>
</html>
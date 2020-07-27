<!DOCTYPE html>
<html lang="en">
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>KingFish Club Site Installation</title>
  <meta name="copyright" content="Copyright Wray Services">
  <meta name="description" content="This is the installation script for KingFish Club Template">

  <meta name="robots" content="index, follow">
  <meta name="author" content="Chris Wray">

<!-- Mobile specific meta goodness :) -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- Favicons -->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"> 
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">


  <link rel="apple-touch-icon" sizes="57x57" href="images/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="images/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="images/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="images/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="images/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="images/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="images/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="images/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="images/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="images/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
  <link rel="manifest" href="images/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="images/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">


<!-- Fonts -->
  <link rel="stylesheet" href="../css/fonts.css" type="text/css" charset="utf-8" />

<!-- Stylesheets -->
  <link rel="stylesheet" href="./css/layout.php" type="text/css" charset="utf-8" />

<!--- Javascript --->
  <script src="js/jscolor.js"></script>

</head>

<body>

<?php

  include('config/install.settings.php');


  if(file_exists('../config/config.club.php')) {
    include('../config/config.club.php');
  } else {
    include('config/default.club.php');
  }

  if(file_exists('../config/config.colour.php')) {
    include('../config/config.colour.php');
  } else {
    include('config/default.colour.php');
  }
?>

<div id="page">
  <div id="header">
    <?php include('header.php'); ?>
  </div>

  <div id="content">
    <form action='saving_config.php' method='POST' enctype='multipart/form-data'>

        <table>
          <tr>
            <th colspan="8">Installation</th>
          </tr>

          <tr>
            <td colspan="8"></td>
          </tr>
        </table>

      <fieldset>
        <table>
          <tr>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'><b><u>Club</u></b></td>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'></td>
          </tr>

          <tr>
            <td></td>
            <td>Name:</td>
            <td colspan="2"><input type='text' name='club_name' value='<?php echo CLUB_NAME; ?>' style='width: 100%;'></td>
            <td></td>
            <td colspan="2">Logo: <input type="file" name="fileToUpload" id="fileToUpload" style='width: 100%;' accept="image/gif, image/jpeg, image/png"></td>
            <td></td>
          </tr>

          <tr>
            <td></td>
            <td>Contact Name:</td>
            <td colspan="2"><input type='text' name='club_contact' value='<?php echo CLUB_CONTACT; ?>' style='width: 100%;'></td>
            <td></td>
            <td id='list' colspan="2" rowspan="8" style="background-color: white; border-style: solid; border-width: 2px; border-color: black;"></td>
            <td></td>
          </tr>

          <tr>
            <td></td>
            <td>Address:</td>
            <td colspan="2"><input type='text' name='club_address1' value='<?php echo CLUB_ADDRESS1; ?>' style='width: 100%;'></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
          </tr>

          <tr>
            <td colspan='2'></td>
            <td colspan="2"><input type='text' name='club_address2' value='<?php echo CLUB_ADDRESS2; ?>' style='width: 100%;'></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
          </tr>
        
          <tr>
            <td colspan='2'></td>
            <td colspan="2"><input type='text' name='club_region' value='<?php echo CLUB_REGION; ?>' style='width: 100%;'></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
          </tr>

          <tr>
            <td colspan='2'></td>
            <td colspan="2"><input type='text' name='club_town' value='<?php echo CLUB_TOWN; ?>' style='width: 100%;'></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
          </tr>

          <tr>
            <td></td>
            <td>Post Code:</td>
            <td colspan="2"><input type='text' name='club_postcode' value='<?php echo CLUB_POSTCODE; ?>' style='width: 100%;'></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
          </tr>

          <tr>
            <td></td>
            <td>Telephone:</td>
            <td colspan="2"><input type='text' name='club_telephone' value='<?php echo CLUB_TELEPHONE; ?>' style='width: 100%;'></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
          </tr>

          <tr>
            <td></td>
            <td>Email:</td>
            <td colspan="2"><input type='text' name='club_email' value='<?php echo CLUB_EMAIL; ?>' style='width: 100%;'></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
          </tr>
        </table>
      </fieldset>


<script>

  if (window.FileReader) {
    function handleFileSelect(evt) {
      var files = evt.target.files;
      var f = files[0];
      var reader = new FileReader();

      reader.onload = (function(theFile) {
        return function(e) {
          document.getElementById('list').innerHTML = ['<img src="', e.target.result,'" title="', theFile.name, '" style="display: block; height: auto; width: 100%;" />'].join('');
        };
      })(f);
    
      reader.readAsDataURL(f);
    }
  } else {
    alert('This browser does not support FileReader');
  }
    
  document.getElementById('fileToUpload').addEventListener('change', handleFileSelect, false);

</script>

      <fieldset>
        <table>
          <tr>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'><b><u>Page</u></b></td>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'></td>
          </tr>

          <tr>
            <td></td>
            <td>Background:</td>
            <td><input class='jscolor' name='page_bg_colour' value='<?php echo PAGE_BG_COLOUR; ?>' style='width: 100%;'> </td>
            <td></td>
            <td>Text:</td>
            <td><input class='jscolor' name='page_txt_colour' value='<?php echo PAGE_TXT_COLOUR; ?>' style='width: 100%;'> </td>
            <td colspan='2'></td>
          </tr>
        </table>
      </fieldset>

      <fieldset>
        <table>
          <tr>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'><b><u>Header</u></b></td>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'></td>
          </tr>

          <tr>
            <td></td>
            <td>Background:</td>
            <td><input class='jscolor' name='header_bg_colour' value='<?php echo HEADER_BG_COLOUR; ?>' style='width: 100%;'> </td>
            <td></td>
            <td>Text:</td>
            <td><input class='jscolor' name='header_txt_colour' value='<?php echo HEADER_TXT_COLOUR; ?>' style='width: 100%;'> </td>
            <td colspan='2'></td>
          </tr>

          <tr>
            <td colspan='4'></td>
            <td>Alt Logo Text:</td>
            <td><input class='jscolor' name='header_icon_colour' value='<?php echo HEADER_ICON_COLOUR; ?>' style='width: 100%;'> </td>
            <td colspan='2'></td>
          </tr>
        </table>
      </fieldset>


      <fieldset>
        <table>
          <tr>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'><b><u>Menu</u></b></td>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'></td>
          </tr>

          <tr>
            <td></td>
            <td>Background:</td>
            <td><input class='jscolor' name='tab_bg_colour' value='<?php echo TAB_BG_COLOUR; ?>' style='width: 100%;'> </td>
            <td></td>
            <td>Tab Text:</td>
            <td><input class='jscolor' name='tab_txt_colour' value='<?php echo TAB_TXT_COLOUR; ?>' style='width: 100%;'> </td>
            <td colspan='2'></td>
          </tr>

          <tr>
            <td></td>
            <td>Tab Selected:</td>
            <td><input class='jscolor' name='tab_selected_colour' value='<?php echo TAB_SELECTED_COLOUR; ?>' style='width: 100%;'> </td>
            <td></td>
            <td>Tab Hover:</td>
            <td><input class='jscolor' name='tab_hover_colour' value='<?php echo TAB_HOVER_COLOUR; ?>' style='width: 100%;'> </td>
            <td colspan='2'></td>
          </tr>
        </table>
      </fieldset>

      <fieldset>
        <table>
          <tr>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'><b><u>Contents</u></b></td>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'></td>
          </tr>

          <tr>
            <td></td>
            <td>Background:</td>
            <td><input class='jscolor' name='paper_bg_colour' value='<?php echo PAPER_BG_COLOUR; ?>' style='width: 100%;'> </td>
            <td></td>
            <td>Text:</td>
            <td><input class='jscolor' name='paper_txt_colour' value='<?php echo PAPER_TXT_COLOUR; ?>' style='width: 100%;'> </td>
            <td colspan='2'></td>
          </tr>
        </table>
      </fieldset>

      <fieldset>
        <table>
          <tr>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'><b><u>Footer</u></b></td>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'></td>
          </tr>

          <tr>
            <td></td>
            <td>Background:</td>
            <td><input class='jscolor' name='footer_bg_colour' value='<?php echo FOOTER_BG_COLOUR; ?>' style='width: 100%;'> </td>
            <td></td>
            <td>Text:</td>
            <td><input class='jscolor' name='footer_txt_colour' value='<?php echo FOOTER_TXT_COLOUR; ?>' style='width: 100%;'> </td>
            <td colspan='2'></td>
          </tr>
        </table>
      </fieldset>

      <fieldset>
        <table>
          <tr>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'></td>
            <td colspan='2'><input type="submit" value='Save Settings' style='text-align: center;'></td>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'></td>
            <td style='width: 12.5%;'></td>
          </tr>
        </table>
      </fieldset>

    </form>
  </div>
  <div id="footer">
    <?php include('footer.php'); ?>
  </div>
</div>

</body>
</html>

<?php
// Start the session
//  session_start();
  include('../config/install.settings.php');
  header("Content-type: text/css; charset: UTF-8");
#  $bg_colour = $settings->bg_colour;
?>

/* Global Styles */
*{
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

html {
  min-height: 100% !important;
  height: 100%;
  min-width: 100% !important;
  width: 100%;
}
 
body {
  position: absolue;
  left: 0;
  top: 0;
  width: 100vw;
  height:100%;
  background-color: <?php echo INSTALL_PAGE_BG_COLOUR; ?>;
  font: 14px "Lucida Grande";
}

p {
  padding: 0 1vw 0 1vw;
}

table {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  width: 100%;
}

th {
  padding-top: 1vh;
  padding-bottom: 1vh;
  padding-left: 1vw;
  padding-right: 1vw; 
  font-family: 'spaghetti_western'; 
  font-size: 40px;
  text-align: left;
  border-style: double none double none;
  border-width: 2vh, 0, 2vh, 0;
  border-color: <?php echo INSTALL_TABLE_BORDER; ?>;
  border-width: 1vh 0 1vh 0;
  background-color: <?php echo INSTALL_TABLE_HEAD_BG; ?>;
  color: <?php echo INSTALL_TABLE_HEAD_TXT; ?>;
}

td {
  border-style: solid;
  border-color: transparent;
  border-width: 2px;
  padding: 0;
}

fieldset {
  padding: 0 0 2px 0;
  border-color: transparent;
}

/* Page layout */
#page {
  background-color: <?php echo INSTALL_PAGE_BG_COLOUR ?>;
  height: 100%;
  position: relative;
  display: block;
  margin: auto;
  padding: auto;
}

#header {
  position: relative;
  display: block;
  width: 100%;
  min-height: 125px;
  height: auto;
  background-color: <?php echo INSTALL_HEADER_BG_COLOUR ?>;
  margin: 0 auto;
  padding: 0;
}

#logo {
  display: inline-block;
  float: left;
  height: 100px;
}

#name {
  position: relatve;
  display: inline-block;
  float: left;
/*  font-family: 'ar_darling'; */
  font-family: 'spaghetti_western'; 
  font-size: 60px;
  color: <?php echo INSTALL_HEADER_TXT_COLOUR ?>;
  padding: auto;
  margin: auto;
}

#menu {
/*  clear: both; */
  position: absolute;
  bottom: 0px;
  display: block;
  background-color: transparent;
  padding: auto;
  margin: auto;
}

#content {
  position: relative;
  top: 0px;
  float: left;
  width: 100%;
  background-color: <?php echo INSTALL_PAPER_BG_COLOUR ?>;
  color: black;
  min-height: 768px;
/*  border-radius: 0 10px 0 0; */
}

#footer {
  position: relative;
  float: left;
  width: 100%;
  padding: 1vh 0 1vh 0;
  background-color: <?php echo INSTALL_FOOTER_BG_COLOUR ?>;
  color: <?php echo INSTALL_FOOTER_TXT_COLOUR ?>;
  border-radius: 0 0 10px 10px;
  border-top: 2px solid <?php echo INSTALL_PAGE_BG_COLOUR ?>;
}

/* Menu Styles */
.tablink {
  position: relative;
  background-color: <?php echo INSTALL_TAB_BG_COLOUR ?>;
  border-radius: 10px 10px 0 0;
  display: block;
  float: left;
  color: #000000;
  border-bottom: 2px solid <?php echo INSTALL_TAB_BG_COLOUR ?>;
  outline: none;
  cursor: pointer;
  padding: 0vh 2vw;
  margin: 0 0 0px 0;
  font-size: 15px;
}

.tablink:hover {
  border-radius: 10px 10px 0 0;
  background-color: <?php echo INSTALL_TAB_HOVER_COLOUR ?>;
  border-bottom: 2px solid <?php echo INSTALL_HEADER_TXT_COLOUR ?>;
}

.tabcontent {
  color: <?php echo INSTALL_PAPER_TXT_COLOUR ?>;
  display: none;
  padding: 2vh 1vw;
  height: 100%;
  background-color: <?php echo INSTALL_PAPER_BG_COLOUR ?>;
  border-radius: 10px 10px 0 0;
  border-bottom: 2px solid <?php echo INSTALL_PAPER_BG_COLOUR ?>;
}

.tabfirst {
  background-color: <?php echo INSTALL_PAPER_BG_COLOUR ?>;
}

/* ##### Screen Resolution settings ##### */
/* High res desktops */
@media screen and (min-device-width: 1281px) {
/* Page layout */
  #page {
    width: 900px;
  }
}

/* Low res desktops and laptops */
@media screen and (min-device-width: 1025px) and (max-device-width: 1280px) {
/* Page layout */
  #page {
    width: 900px;
  }
}

/* Larger Tablets and ipads (portrait) */
@media screen and (min-device-width: 900px) and (max-device-width: 1024px) {
/* Page layout */
  #page {
    width: 900px;
  }
}

/* Smaller Tablets and ipads (portrait) */
@media screen and (min-device-width: 768px) and (max-device-width: 899px) {
/* Page layout */
  #page {
    width: 100vw;
  }
}

/* Larger Tablets and ipads (landscape) */
@media screen and (min-device-width: 900px) and (max-device-width: 1024px) and (orientation: landscape) {
/* Page layout */
  #page {
    width: 900px;
  }
}

/* Smaller Tablets and ipads (landscape) */
@media screen and (min-device-width: 768px) and (max-device-width: 899px) and (orientation: landscape) {
/* Page layout */
  #page {
    width: 100vw;
  }
}

/* Low resolution tablets and phones (landscape) */
@media screen and (min-device-width: 481px) and (max-device-width: 767px) {
/* Page layout */
  #page {
    width: 100vw;
  }
}

/* Most smart phones (portrait) */
@media screen and (min-device-width: 320px) and (max-device-width: 480px) {
/* Page layout */
  #page {
    width: 100vw;
  }
}

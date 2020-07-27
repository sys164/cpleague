<?php
// Start the session
//  session_start();
  include('../config/config.colour.php');
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
  background-color: <?php echo PAGE_BG_COLOUR; ?>;
  font: 14px "Lucida Grande";
}

p {
  padding: 0 1vw 0 1vw;
}

/* Page layout */
#page {
  background-color: <?php echo PAGE_BG_COLOUR ?>;
  height: 100%;
  position: relative;
  display: flex;
  flex-direction: column;
  align-content: flex-start;
  margin: auto;
  padding: auto;
}

.float-left {
  position: relative;
  display: block;
  float: left;
}

.float-right {
  position: relative;
  display: block;
  float: right;
}

#top-bar {
  display: flex;
  justify-content: flex-end;
  background-color: transparent;
  z-index: 1000;
}

.login-register {
  position: relative;
  background-color: <?php echo TAB_HOVER_COLOUR ?>;
  border-radius: 1vmax 1vmax 1vmax 1vmax;
  padding: 1vh 1vw 1vh 1vw;
  color: <?php echo TAB_TXT_COLOUR ?>;
  margin: 0.5vh 0 auto 0;
}

.login-register:hover {
  background-color: <?php echo TAB_BG_COLOUR ?>;
}

#header-bar {
  position: relative;
  display: flex;
  height: auto;
  justify-content: left;
  align-items: center;
/*  background-color: <?php echo HEADER_BG_COLOUR ?>;  */
  background-color: transparent;
  margin: -3vh 0 1vh 0;
}

.logo {
  position: relative;
  display: inline-block;
  height: 13vh;
}

.name {
  position: relatve;
  display: inline-block;
/*  font-family: 'ar_darling'; */
  font-family: 'spaghetti_western'; 
/*  font-size: 60px;  */
  font-size: 3.75vmax;  
  color: <?php echo HEADER_TXT_COLOUR ?>;
}

#menu-bar {
  display: flex;
  justify-content: flex-start;
  background-color: transparent;
/*  background-color: <?php echo PAPER_BG_COLOUR ?>;
  border-radius: 10px 10px 0 0; */
}

.menu {
  position: relative;
  left: 0;
  bottom: 0;
  background-color: transparent;
/*  padding: auto;
  margin: auto;  */
}

/* Menu Styles */
.tablink {
  position: relative;
  background-color: <?php echo TAB_BG_COLOUR ?>;
  border-radius: 10px 10px 0 0;
  display: block;
  float: left;
  color: #000000;
  border-bottom: 2px solid <?php echo TAB_BG_COLOUR ?>;
  outline: none;
  cursor: pointer;
  padding: 0vh 2vw;
  margin: 0 0 0px 0;
  font-size: 15px;
}

.tablink:hover {
  border-radius: 10px 10px 0 0;
  background-color: <?php echo TAB_HOVER_COLOUR ?>;
  border-bottom: 2px solid <?php echo HEADER_TXT_COLOUR ?>;
}

.tabcontent {
  color: <?php echo PAPER_TXT_COLOUR ?>;
  display: none;
  padding: 2vh 1vw;
  height: 100%;
  background-color: <?php echo PAPER_BG_COLOUR ?>;
  border-radius: 10px 10px 0 0;
  border-bottom: 2px solid <?php echo PAPER_BG_COLOUR ?>;
}

.tabfirst {
  background-color: <?php echo PAPER_BG_COLOUR ?>;
}

#content {
  position: relative;
  display: flex;
  flex-direction: column;
  flex-wrap: wrap;
  clear: both;
/*  float: left; */
  width: 100%;
  background-color: <?php echo PAPER_BG_COLOUR ?>;
  color: black;
/*  min-height: 768px; */
  border-radius: 0 10px 0 0;  
}

#footer {
  position: relative;
  float: left;
  width: 100%;
  padding: 1vh 0 1vh 0;
  background-color: <?php echo FOOTER_BG_COLOUR ?>;
  color: <?php echo FOOTER_TXT_COLOUR ?>;
  border-radius: 0 0 10px 10px;
  border-top: 2px solid <?php echo PAGE_BG_COLOUR ?>;
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

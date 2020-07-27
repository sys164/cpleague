<?php
  include('../config/config.colour.php');
  header("Content-type: text/css; charset: UTF-8");
?>

div {
  margin: 0;
  padding: 0;
}

hr {
  margin: 0;
  padding: 0;
}

.hide {
  display: none;
}

li {
  margin: 1vh 1vw 1vh 1vw;
}

.logreg {
  text-align: center;
  padding: 0;
  margin: auto;
  width: 100%;
  border-color: transparent;
}

.memButton {
  position: relative;
  display: block;
  float: left;
  background-color: #4CAF50; /* Green */
  border: none;
  border-radius: 4px;
  color: white;
  padding: 15px 32px;
  margin: auto;
  text-align: center;
  text-decoration: none;
  font-size: 16px;
}

.iframe-container {
  position: relative;
  overflow: hidden;
  width: 100%;
  height: 90vh;
//  padding-top: 56.25%; /* 16:9 Aspect Ratio (divide 9 by 16 = 0.5625) */
//  padding-top: 63vh;
}
 
.iframe-container iframe {
//  display: block; 
  position: relative;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  width: 100%;
  height: 100%;
  border-color: transparent;
  border-radius: 5px;
}

.modal-form {
  border-color: transparent;
  display: block;
  position: relative;
  padding: 0;
  margin: 0 auto;
  box-sizing: border-box;
}

.modal-form fieldset {
  border: 1px solid #ccc;
  border-radius: 4px;
  background-color: #f2f2f2;
}  

.modal-form input[type=text], input[type=email], input[type=tel], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

.modal-form label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

.modal-form input[type=submit], input[type=reset] {
  display: block;
  position: relative;
  background-color: #4CAF50;
  color: white;
  padding: 3vh 5vw;
  margin: 2vhx auto;
  border: none;
  border-radius: 4px;
  cursor: pointer;
//  float: left;
}

.modal-form input[type=submit]:hover, input[type=reset]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75 {
    width: 80%;
    margin: 0 auto;
  }

  .modal-form input[type=submit], .modal-form input[type=reset] {
    width: 60%;
    margin: 0 auto;
  }
}

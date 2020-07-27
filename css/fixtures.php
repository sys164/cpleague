<?php
  header("Content-type: text/css; charset: UTF-8");
?>

#fixture_content {
  display: block;
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height:100%;
  background-color: transparent;
  font: 14px "Lucida Grande";
  text-align: center;
}

#fixtures {
  position: relative;
  overflow: hidden;
  width: 100%;
  padding-bottom: 63vh;
/*  padding-top: 56.25%; */ /* 16:9 Aspect Ratio (divide 9 by 16 = 0.5625) */
/*  padding-top: 63vh; */
}
 
#fixtures iframe {
//  display: block; 
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  width: 100%;
  height: 100%;
  border-color: transparent;
  background-color: transparent;
  border-radius: 5px;
}

#fixtures p {
  color: black;
  text-align: center;
}

#fixtures table {
  display: inline-block;
  position: relative;
  padding: 0;
  margin: 0 auto;
}

#fixtures td{
  padding: 1vh 1vw;
}

#fixtures tr:nth-child(odd) {
  background-color: #f0ffff;
}

#fixtures tr:nth-child(even) {
  background-color: #90ee90;
}

#fixtures thead {
  background-color: #006400;
  color: white;
  font-weight: bold;
}

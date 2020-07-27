<?php

$sql_member_club = 'SELECT 
  `id`,
  `name`,
  `postcode1`,
  `postcode2`,
  `chairperson`,
  `secretary`,
  `treasurer`,
  `welfare`
FROM `clubs` WHERE ';

$sql_secretary = 'SELECT
  `id`,
  `firstname`,
  `surname`,
  `mobile`,
  `email`
FROM `secretary` WHERE ';

$sql_chairperson = 'SELECT
  `id`,
  `firstname`,
  `surname`,
  `mobile`,
  `email`
FROM `chairperson` WHERE ';

?>
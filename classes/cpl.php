<?php

  class cpl {
    // Properties
    public $ip_address;
    public $browser;

    // Methods
    function __construct() {

      $this->ip_address = $_SERVER['REMOTE_ADDR'];

      $browser =  $_SERVER['HTTP_USER_AGENT'];
      if(strpos($browser, 'MSIE') !== FALSE) {
        $this->browser = 'Internet explorer';
      } elseif(strpos($browser, 'Trident') !== FALSE) {
        //For Supporting IE 11
        $this->browser = 'Internet explorer';
      } elseif(strpos($browser, 'Firefox') !== FALSE) {
        $this->browser = 'Mozilla Firefox';
      } elseif(strpos($browser, 'Chrome') !== FALSE) {
        $this->browser = 'Google Chrome';
      } elseif(strpos($browser, 'Opera Mini') !== FALSE) {
        $this->browser = "Opera Mini";
      } elseif(strpos($browser, 'Opera') !== FALSE) {
        $this->browser = "Opera";
      } elseif(strpos($browser, 'Safari') !== FALSE) {
        $this->browser = "Safari";
      } else {
        $this->browser = 'Something else';
      }
    }
  }

  class user {
    function __construct($email = NULL, $password = NULL, $pwdcheck = NULL, $hash = NULL, $base_dir = NULL) {
      $reg_type = 0;
      $id_check = "";
      $db = db_connect($base_dir);

// Set the sql for first time login(find user)
      if (strlen($hash) > 1) {
        $sec_sql = sql_hash("secretary", $email, $hash);
        $chair_sql = sql_hash("chairperson", $email, $hash);
        $treasurer_sql = "";
        $welfare_sql = "";
      }

// Set the sql for updating password
      if ((strlen($hash) < 1) && ($password == $pwdcheck)) {
        $sec_sql = sql_update("secretary", $email, $password);
        $chair_sql = sql_update("chairperson", $email, $password);
        $treasurer_sql = sql_update("treasurer", $email, $password);
        $welfare_sql = sql_update("welfare", $email, $password);

/*
        $result = mysqli_query($db, $sec_sql);
        $result = mysqli_query($db, $chair_sql);
        $result = mysqli_query($db, $treasurer_sql);
        $result = mysqli_query($db, $welfare_sql);

        $sec_sql = sql_user("secretary", $email, $password);
        $chair_sql = sql_user("chairperson", $email, $password);
        $treasurer_sql = sql_user("treasurer", $email, $password);
        $welfare_sql = sql_user("welfare", $email, $password);
*/
      }

// Set the sql for finding user
      if ((strlen($hash) < 1) && ($password != $pwdcheck)) {
        $sec_sql = sql_user("secretary", $email, $password);
        $chair_sql = sql_user("chairperson", $email, $password);
        $treasurer_sql = sql_user("treasurer", $email, $password);
        $welfare_sql = sql_user("welfare", $email, $password);
      }

// Locate the Secretary details
      $tmp_sec = mysqli_query($db, $sec_sql);
      if(mysqli_num_rows($tmp_sec) > 0) {
        foreach ($tmp_sec as $z => $sec) {
          foreach ($sec as $key => $value) {
            $this->secretary->$key = $value;
          }
          $id_check = $id_check.trim($sec['club_id']);
        }
        $reg_type = $reg_type + 1;
      } else {
        $this->secretary->none = TRUE;
      }

// Locate the Chairperson details
      $tmp_chair = mysqli_query($db, $chair_sql);
      if(mysqli_num_rows($tmp_chair) > 0) {
        foreach ($tmp_chair as $z => $chair) {
          foreach ($chair as $key => $value) {
            $this->chairperson->$key = $value;
          }
          $id_check = $id_check.trim($chair['club_id']);
        }
        $reg_type = $reg_type + 2;
      } else {
        $this->chairperson->none = TRUE;
      }

// Locate the Treasurer details
      if (strlen($treasurer_sql) > 3) {
        $tmp_treasurer = mysqli_query($db, $treasurer_sql);
        if(mysqli_num_rows($tmp_treasurer) > 0) {
          foreach ($tmp_treasurer as $z => $treasurer) {
            foreach ($treasurer as $key => $value) {
              $this->treasurer->$key = $value;
            }
          $id_check = $id_check.trim($treasurer['club_id']);
          }
          $reg_type = $reg_type + 4;
        }
      }

// Locate the Welfare details
      if (strlen($welfare_sql) > 3) {
        $tmp_welfare = mysqli_query($db, $welfare_sql);
        if(mysqli_num_rows($tmp_welfare) > 0) {
          foreach ($tmp_welfare as $z => $welfare) {
            foreach ($welfare as $key => $value) {
              $this->welfare->$key = $value;
            }
          $id_check = $id_check.trim($welfare['club_id']);
          }
          $reg_type = $reg_type + 8;
        }
      }

      if(strlen($id_check) > 0) {
        $this->id_check = 1;
      } else {
        $this->id_check = 0;
      }

      $this->regtype = $reg_type;
    }
  }

  class committee {
    function __construct($base_dir) {

      include($base_dir.'config/config.database.php');

      $connect = new mysqli($host_name, $user_name, $password, $database);
      if ($connect -> connect_errno) {
        echo '<p>Failed to connect to MySQL: ' . $connect -> connect_error.'</p>';
      } else {
        $results = $connect -> query("SELECT * FROM `commmittee` WHERE `position` != 'Committee'");

        foreach ($results as $result) {
          $id = $result[id];
          $this->$id->firstname = $result[firstname];
          $this->$id->surname = $result[lastname];
          $this->$id->gender = $result[gender];
          $this->$id->mobile = $result[mobile];
          $this->$id->email = $result[email];
          $this->$id->position = $result[position];
          $this->$id->agegroup = $result[agegroup];
          $this->$id->photo = $result[photo];
        }
      }
    }
  }

  class league_reps {
    function __construct($base_dir) {

      include($base_dir.'config/config.database.php');

      $connect = new mysqli($host_name, $user_name, $password, $database);
      if ($connect -> connect_errno) {
        echo '<p>Failed to connect to MySQL: ' . $connect -> connect_error.'</p>';
      } else {
        $results = $connect -> query("SELECT * FROM `commmittee` WHERE `agegroup` IS NOT NULL");
        foreach ($results as $result) {
          $ages = explode(',', $result[agegroup]);
          foreach ($ages as $value) {
            $age = str_ireplace('U', '', $value);
            $reps[$age] = (array) $result;
          }
        }
      }

      for($age=5; $age<=25; $age++) {
        if(array_key_exists($age, $reps)) {
          $reps[$age]['surname'] = $reps[$age]['lastname'];
          unset($reps[$age]['lastname']);
          $reps[$age]['position'] = 'U'.$age.' League Rep';
          foreach ($reps[$age] as $key => $value) {
            $this->$age->$key = $value;
          }
        }
      }

    }
  }

/*
  class db_connect {
    function __construct($base_dir) {
      include($base_dir.'config/config.database.php');

      $connect = mysqli_connect($host_name, $user_name, $password, $database);
//      $connect = new mysqli($host_name, $user_name, $password, $database);

      if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
      }
      return $connect;

//      if ($connect -> connect_errno) {
//        echo '<p style="color: white;">'.$host_name.'</p>';
//        echo '<p style="color: white;">Failed to connect to MySQL: ' . $connect -> connect_error.'</p>';
//      } else {
//        return $connect;
//      }

    }
  }
*/

  class divisions {
    function __construct($base_dir) {

//      echo $base_dir."<br>";
      include($base_dir.'config/config.database.php');

      $connect = new mysqli($host_name, $user_name, $password, $database);
      if ($connect -> connect_errno) {
        echo '<p>Failed to connect to MySQL: ' . $connect -> connect_error.'</p>';
      } else {
        $sql = 'SELECT 
                  `league_id`,
                  CAST(REPLACE(`agegroup`, "U", "") AS UNSIGNED) AS `age`,
                  TRIM(CONCAT("Under ", REPLACE(`agegroup`, "U", ""), "\'s ", `division_suffix`)) AS `name`,
                  `season`, 
                  `season_id`, 
                  `division_code`, 
                  `division_id`, 
                  `division_season`
                FROM `divisions` 
                WHERE `Active` = "1" AND `agegroup` != "Open" AND `division_season` IS NOT NULL
                ORDER BY `age` ASC';

        $divisions = $connect -> query($sql);

        foreach ($divisions as $division) {
          $i = $division['division_code'];
          $this->$i->league_id = $division['league_id'];
          $this->$i->age = $division['age'];
          $this->$i->name = $division['name'];
          $this->$i->season = $division['season'];
          $this->$i->season_id = $division['season_id'];
          $this->$i->division_code = $division['division_code'];
          $this->$i->division_id = $division['division_id'];
          $this->$i->division_season = $division['division_season'];
        }

      }

    }
  }

  class fixtures {
    function __construct($DivisionSeason, $DivisionCode) {

      $dom = new DOMDocument();
      $dom->loadHTMLFile('https://fulltime-league.thefa.com/js/cs1.do?cs='.$DivisionSeason.'&random=0.5');
      $xpath = new DOMXPath($dom);
      $elements = $xpath->query('//tr');

      $today = date("D d M Y");
      $today_dt = strtotime($today);
      $fortnight_dt = strtotime($today . ' + 14 days');
      $fortnight = date("D d M Y", $fortnight_dt);

      $j=0;
      foreach ($elements as $element) {
        $tr = array_values(array_filter(preg_split("/[\t]/", $element->nodeValue)));

        if(strtoupper(trim(substr($tr['0'], 0, 4))) == "SAT") {
          $datetime = strtotime(trim(substr($tr['0'], 0, 16)));
        }

// Modify this line to limit the dates returned
        if(($datetime <= $today_dt) && ($datetime <= $fortnight_dt)) {
#          echo "<div><p>".$today."<br>".$fortnight."</p></div>";

          if(strtoupper(trim($tr['1'])) == 'V') {
            $j++;
            $this->$j->competition = $DivisionCode;
            $this->$j->datetime = $datetime;
            $this->$j->home = preg_replace('/\\\\\'/', '', $tr['0']);
            $this->$j->away = preg_replace('/\\\\\'/', '', $tr['2']);
            if(!empty($tr['3'])) {
              $this->$j->venue = $tr['3'];
            } else {
              $this->$j->venue = "";
            }
            $this->$j->type = "Friendly";
          }

          if(strtoupper(trim($tr['2'])) == 'V') {
            $j++;
            $this->$j->competition = $DivisionCode;
            $this->$j->datetime = $datetime;
            $this->$j->home = preg_replace('/\\\\\'/', '', $tr['1']);
            $this->$j->away = preg_replace('/\\\\\'/', '', $tr['3']);
            if(!empty($tr['4'])) {
              $this->$j->venue = $tr['4'];
            } else {
              $this->$j->venue = "";
            }
            if(strtoupper(substr(trim($tr['0']), 0, 1)) == "C") {
              $this->$j->type = "Cup";
            } else {
              $this->$j->type = "League";
            }
          }

        }
      }
    }
  }

  class clubs {
    function __construct($sec_club = NULL, $chair_club = NULL, $treasurer_club = NULL, $welfare_club = NULL, $base_dir = NULL) {
      $club_ids = array($sec_club, $chair_club, $treasurer_club, $welfare_club);
      $club_ids = array_values(array_filter(array_unique($club_ids)));

      $db = db_connect($base_dir);

      $clubs_sql = sql_clubs($club_ids);
      $clubs = mysqli_query($db, $clubs_sql);

      $i = 0;
      foreach ($clubs as $club) {
        $i = $i+1;

        $this->$i->club = $club['name'];
        $this->$i->club_id = $club['club_id'];
        $this->$i->secretary->id = $club['sec_id'];
        $this->$i->secretary->name = $club['sec_name'];
        $this->$i->secretary->mobile = $club['sec_mobile'];
        $this->$i->secretary->email = $club['sec_email'];
        $this->$i->chairperson->id = $club['chair_id'];
        $this->$i->chairperson->name = $club['chair_name'];
        $this->$i->chairperson->mobile = $club['chair_mobile'];
        $this->$i->chairperson->email = $club['chair_email'];
        $this->$i->treasurer->id = $club['treasurer_id'];
        $this->$i->treasurer->name = $club['treasurer_name'];
        $this->$i->treasurer->mobile = $club['treasurer_mobile'];
        $this->$i->treasurer->email = $club['treasurer_email'];
        $this->$i->welfare->id = $club['welfare_id'];
        $this->$i->welfare->name = $club['welfare_name'];
        $this->$i->welfare->mobile = $club['welfare_mobile'];
        $this->$i->welfare->email = $club['welfare_email'];
      }
    }
  }

  class teams {
    function __construct($sec_club = NULL, $chair_club = NULL, $treasurer_club = NULL, $welfare_club = NULL, $base_dir = NULL) {
      $club_ids = array($sec_club, $chair_club, $treasurer_club, $welfare_club);
      $club_ids = array_values(array_filter(array_unique($club_ids)));

      $db = db_connect($base_dir);

      $teams_sql = sql_teams($club_ids);
      $teams = mysqli_query($db, $teams_sql);

      $i = 0;
      foreach ($teams as $team) {
        $i = $i+1;
        $this->$i->club_id = $team['club_id'];
        $this->$i->club = $team['club_name'];
        $this->$i->team_id = $team['team_id'];
        $this->$i->team = $team['team_name'];
        $this->$i->agegroup = $team['age_group'];
        $this->$i->coach_id = $team['coach_id'];
        $this->$i->coach = $team['coach_name'];
        $this->$i->mobile = $team['coach_mobile'];
        $this->$i->email = $team['coach_email'];
      }
    }
  }

  function get_divisionseason($league_id, $season_id, $division_id) {

    $details = [];
    $details['divisionseason'] = 0;

//  Working url
    $doc_url = 'http://fulltime-league.thefa.com/ProcessPublicSelect.do?psSelectedSeason='.$season_id.'&psSelectedDivision='.$division_id.'&psSelectedLeague='.$league_id;

    $dom = new DOMDocument();
    $dom->loadHTMLFile($doc_url);
    $league_menu = $dom->getElementById("League_Menu");

    if(count($league_menu) > 0) {
      $menu_items = $league_menu->getElementsByTagName("li");
      foreach ($menu_items as $menu_item) {
        if(trim($menu_item->nodeValue) == "Fixtures") {
          $fixture_link = $menu_item->getElementsByTagName("a")['0']->attributes['0']->value;
        }
      }
      $tmp = explode('&', str_ireplace('/ListPublicFixture.do?', '', $fixture_link));
      foreach ($tmp as $tmp_value) {
        $str = explode('=', $tmp_value);
        $details[$str['0']] = $str['1'];
      }
    }

      return $details['divisionseason'];

  }

  class member_check {
    function __construct($base_dir, $email, $hash) {

      include($base_dir.'config/config.database.php');

      $connect = new mysqli($host_name, $user_name, $password, $database);
      if ($connect -> connect_errno) {
        echo '<p>Failed to connect to MySQL: ' . $connect -> connect_error.'</p>';
      } else {
        $sql_secretary = "SELECT * FROM `secretary` WHERE `email` = '".$email."' AND `hash` = '".md5($hash)."';";
        $tmp_sec = $connect -> query($sql_secretary);
        $sql_chairperson = "SELECT * FROM `chairperson` WHERE `email` = '".$email."' AND `hash` = '".md5($hash)."';";
        $tmp_chair = $connect -> query($sql_chairperson);

  //      if($tmp_sec->num_rows)



        $results = $connect -> query("SELECT * FROM `commmittee` WHERE `position` != 'Committee'");

        foreach ($results as $result) {
          $id = $result[id];
          $this->$id->firstname = $result[firstname];
          $this->$id->surname = $result[lastname];
          $this->$id->gender = $result[gender];
          $this->$id->mobile = $result[mobile];
          $this->$id->email = $result[email];
          $this->$id->position = $result[position];
          $this->$id->agegroup = $result[agegroup];
          $this->$id->photo = $result[photo];
        }
      }
    }
  }

  class postdata {
    function __construct($post) {
      if(isset($post) && !empty($post)) {
        foreach ($post as $key => $value) {
          $a = explode('_', $key);
          switch (count($a)) {
            case '2':
              $first = $a[0];
              $second = $a[1];
              $this->$first->$second = str_replace('-', ' ', $value);
              break;

            case '1':
              $first = $a[0];
              $this->$first = str_replace('-', ' ', $value);
              break;

            default:
              break;
          }
        }
      }

      if((stripos($_SERVER['HTTP_REFERER'], "s://www.communitypartnershipleague.co.uk/pages/members/first_login.php") > 0) && isset($this->pswConfirm) && !empty($this->pswConfirm)) {
        $this->firstTime = TRUE;
      } else {
        unset($this->pswConfirm);
      }
    }
  }

  function db_connect($base_dir) {
    include($base_dir.'config/config.database.php');

    $connect = mysqli_connect($host_name, $user_name, $password, $database);

    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }
    return $connect;
  }

  function sql_hash($table, $email, $hash) {
    $sql = "
      SELECT
        a.`id` AS `".$table."_id`,
        a.`firstname`,
        a.`surname`,
        b.`id` AS `club_id`,
        b.`name` AS `club_name`,
        a.`active`
      FROM `".$table."` AS a
      LEFT JOIN `clubs` AS b ON a.`id` = b.`".$table."`
      WHERE
        a.`email` = '".$email."' AND
        a.`hash` = '".MD5($hash)."' AND
        a.`password` IS NULL;
    ";
    return $sql;
  }

  function sql_update($table, $email, $password) {
    $sql = "
      UPDATE `".$table."` SET 
        `password`='".MD5($password)."',
        `modified`=NOW(),
        `active`='1' 
      WHERE 
        `email` = '".$email."';
    ";

/*
    $sql = $sql."
      SELECT
        a.`id` AS `".$table."_id`,
        a.`firstname`,
        a.`surname`,
        b.`id` AS `club_id`,
        b.`name` AS `club_name`,
        a.`active`
      FROM `".$table."` AS a
      LEFT JOIN `clubs` AS b ON a.`id` = b.`".$table."`
      WHERE
        a.`email` = '".$email."' AND
        a.`password` IS NOT NULL;
    ";
*/
    return $sql;
  }

  function sql_user($table, $email, $password) {
    $sql = "
      SELECT
        a.`id` AS `".$table."_id`,
        a.`firstname`,
        a.`surname`,
        b.`id` AS `club_id`,
        b.`name` AS `club_name`,
        a.`active`
      FROM `".$table."` AS a
      LEFT JOIN `clubs` AS b ON a.`id` = b.`".$table."`
      WHERE
        a.`email` = '".$email."' AND
        a.`password` = '".MD5($password)."';
    ";
    return $sql;
  }

  function sql_clubs($club_ids = NULL) {
    switch (count($club_ids)) {
      case 1:
        $sql_clubs = "a.`id` = '".$club_ids['0']."'";
        break;
      
      default:
        $sql_clubs = "(a.`id` = '".$club_ids['0']."'";
        $i = '';
        for($i=1; $i<=(count($club_ids)-1); $i++) {
          $sql_clubs .= " OR a.`id` = '".$club_ids[$i]."'";
        }
        $sql_clubs .= ")";
        break;
    }

    $sql = "
      SELECT
        a.`id` AS `club_id`,
        a.`name` AS `name`,
        b.`id` AS `sec_id`,
        CONCAT(b.`firstname`, ' ', b.`surname`) AS `sec_name`,
        b.`mobile` AS `sec_mobile`,
        b.`email` AS `sec_email`,
        c.`id` AS `chair_id`,
        CONCAT(c.`firstname`, ' ', c.`surname`) AS `chair_name`,
        c.`mobile` AS `chair_mobile`,
        c.`email` AS `chair_email`,
        d.`id` AS `treasurer_id`,
        CONCAT(d.`firstname`, ' ', d.`surname`) AS `treasurer_name`,
        d.`mobile` AS `treasurer_mobile`,
        d.`email` AS `treasurer_email`,
        e.`id` AS `welfare_id`,
        CONCAT(e.`firstname`, ' ', e.`surname`) AS `welfare_name`,
        e.`mobile` AS `welfare_mobile`,
        e.`email` AS `welfare_email`
      FROM `clubs` AS a
      LEFT JOIN `secretary` AS b ON b.`id` = a.`secretary`
      LEFT JOIN `chairperson` AS c ON c.`id` = a.`chairperson`
      LEFT JOIN `treasurer` AS d ON d.`id` = a.`treasurer`
      LEFT JOIN `welfare` AS e ON e.`id` = a.`welfare`
      WHERE
        ".$sql_clubs." AND 
        a.`active` = '1'
      ORDER BY `club_id` ASC;
    ";

    return $sql;
  }

  function sql_teams($club_ids = NULL) {
    switch (count($club_ids)) {
      case 1:
        $sql_clubs = "a.`club` = '".$club_ids['0']."'";
        break;
      
      default:
        $sql_clubs = "(a.`club` = '".$club_ids['0']."'";
        $i = '';
        for($i=1; $i<=(count($club_ids)-1); $i++) {
          $sql_clubs .= " OR a.`club` = '".$club_ids[$i]."'";
        }
        $sql_clubs .= ")";
        break;
    }

    $sql = "
      SELECT
        a.`id` AS `team_id`,
        b.`id` AS `club_id`,
        b.`name` AS `club_name`,
        a.`name` AS `team_name`,
        a.`age` AS `age_group`,
        REPLACE(a.`age`, 'U', '') AS `age`,
        a.`coach` AS `coach_id`,
        CONCAT(c.`firstname`, ' ', c.`surname`) AS `coach_name`,
        c.`mobile` AS `coach_mobile`,
        c.`email` AS `coach_email`
      FROM `teams` AS a
      LEFT JOIN `clubs` AS b ON a.`club` = b.`id`
      LEFT JOIN `coaches` AS c ON a.`coach` = c.`id`
      WHERE
        ".$sql_clubs." AND 
        a.`active` = '1'
      ORDER BY `club_id` ASC, `age` ASC, `team_name` ASC;
    ";
    return $sql;
  }

?>
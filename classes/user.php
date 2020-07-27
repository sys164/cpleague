<?php
  
  class user extends cpl {
    // Properties

    // Methods
    function user_details($firstname = NULL, $surname = NULL, $dob = NULL, $email = NULL) {
      $this->firstname = $firstname;
      $this->surname = $surname;
      $this->dob = $dob;
      $this->email = $email;
    }

    function user_type($parent = NULL, $coach = NULL, $official = NULL) {
      $this->coach = $coach;
      $this->parent = $parent;
      $this->player = $player;
      $this->official = $official;
    }

  }
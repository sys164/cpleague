<?php
class Videos extends CPL {
  // Properties
  public $path;
  public $name;
  public $shortname;

  // Methods 
  function __construct($path, $name, $shortname=NULL) {
    $this->path = $path;
    $this->name = $name;
    $this->shortname = $shortname;
  }

  // set details
  function set_video_name($name) {
  	$this->name = $name;
  }

  function set_video_path($path) {
  	$this->path = $path;
  }

  function set_video_shortname($shortname) {
  	$this->shortname = $shortname;
  }

  // get details
  function get_video_name() {
    return $this->name;
  }

  function get_video_path() {
    return $this->path;
  }

  function get_video_shortname() {
    return $this->shortname;
  }
}
?>

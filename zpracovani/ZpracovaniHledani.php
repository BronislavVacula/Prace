<?php
  class ZpracovaniHledani
  {
    public $ico = "";
    public $jmenofirmy = "";

    function __construct(){
      if(isset($_POST["ico"]))
        $this->ico = $_POST["ico"];
      elseif(isset($_GET["ico"]))
        $this->ico = $_GET["ico"];

      if(isset($_POST["jmenofirmy"]))
        $this->jmenofirmy = $_POST["jmenofirmy"];
    }

    function ICOValidni()
    {
      return is_numeric($this->ico) || $this->ico == "";
    }
  }

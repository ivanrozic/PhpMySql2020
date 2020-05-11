<?php

class Podaci extends mysqli{
private $my_host = "localhost";
private $my_user = "root";
private $my_pass = "";
private $my_db = "fakultet";
public $mysqli;

function __construct(){
   $mysqli= parent::__construct($this->my_host, $this->my_user, $this->my_pass, $this->my_db);
    //$this->mysqli = new mysqli($my_host, $my_user, $my_pass, $my_db);
   if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
}

//private $mysqli = new mysqli($my_host, $my_user, $my_pass, $my_db);



}
?>
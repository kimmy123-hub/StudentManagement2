<?php
 
 namespace Cualbar\StudentManagement2\Core;
 use mysqli;
  
 class Database{

    protected $conn;
    
    public function __construct(){

        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "oop2";

        $this->conn = new mysqli($host, $user, $pass, $db);
        if ($this->conn->connect_error){
            die('Connection to database failed :'.$this->conn->connect_error);
        } 
    }
 }

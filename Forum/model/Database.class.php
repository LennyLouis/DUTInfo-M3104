<?php

class Database {
    private $db_name;
    private $user;
    private $pass;

    // Constructor

    public function __construct() {
        $this->db_name = "info2_i205379_general";
        $this->user = "i205379";
        $this->pass = "Tmy353ff";
    }

    // Methods

    public function getBdd(){
        return new PDO("mysql:host=localhost;dbname=$this->db_name", $this->user, $this->pass);
    }



}
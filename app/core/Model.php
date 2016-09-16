<?php

class Model
{
    protected $db;

    public function __construct() {

        // you don't need to require Database.php i has been already required in init.php file
        $this->db = $db = Database::connect();
        $this->date = date('Y-m-d H:i:s');
        //var_dump('<br />in base model', $this->db);

    }


}
<?php

require_once "../config/config.php";

class company{


    public function show(){

        $result = new conn();
        $sql = 'SELECT *
        FROM company';
        $abc = $result->connection($sql);
        return $abc;
    }
}
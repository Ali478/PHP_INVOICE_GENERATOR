<?php

require_once "../config/config.php";


class login
{


    public function insert()
    {

        $result = new conn();
        $sql = "INSERT INTO registered_users (username, password)
            VALUES ('$_POST[email]', '$_POST[password]')";
        $abc = $result->connection($sql);
        return $abc;
    }

    public function redirect()
    {
        header("location: ../pages/dashboard.php");
    }

    public function redirect2()
    {
        header("location: ../index.php");
    }

    public function show($id)
    {
        $result = new conn();
        $sql = "SELECT * FROM registered_users Where id= '$id' ";
        $abc = $result->connection($sql);
        $result = $abc->fetch(PDO::FETCH_ASSOC);
        return $result;

    }
}

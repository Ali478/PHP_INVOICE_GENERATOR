<?php
class conn
{
    public function connection($some)
    {
        $servername = "localhost";
        $username = "root1";
        $password = "rootroot_1";
        $dbname = "Invoice_app";

        try {
            $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $result = $conn->query($some);
            return $result;
        } catch (PDOException $e) {
            die("Could not connect to the database $dbname :" . $e->getMessage());
        }
        $conn = null;
    }
}

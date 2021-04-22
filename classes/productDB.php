<?php

require_once "../config/config.php";


class Product
{
    
    public function showData()
    {
        

        
        
        $result = new conn();
        $sql = 'SELECT *
        FROM products
        ORDER BY id';
        $abc = $result->connection($sql);
        return $abc;
    }

    public function editmode($id)
    {
        
        
        $result = new conn();
        $sql = "SELECT *
        FROM products
        where id = $id";
        $abc = $result->connection($sql);
        return $abc;
    }

    public function redirect()
    {
        header("location: ../pages/showProducts.php");
    }

    public function insert()
    {
        
        $result = new conn();
        $sql = "INSERT INTO products (Pname, unitPrice, availableStock)
            VALUES ('$_POST[Pname]', '$_POST[unitPrice]', '$_POST[availableStock]')";
        $abc = $result->connection($sql);
        return $abc;
    }

    public function delete($id)
    {   
        $result = new conn();
        $sql = "DELETE FROM products WHERE id = '$id' ";
        $abc = $result->connection($sql);
        return $abc;
    }

    public function update($id)
    {
        $result = new conn();
        $sql = "UPDATE products
            SET Pname='$_POST[Pname]', unitPrice='$_POST[unitPrice]', availableStock='$_POST[availableStock]'
                WHERE id=$id ";
        $abc = $result->connection($sql);
        return $abc;
    }

    public function selecti(){
        

        $result = new conn();
        $sql = 'SELECT *
        FROM products
        ORDER BY id';
        $abc = $result->connection($sql);
        return $abc;
    }


    public function unit($str){
        $result = new conn();
        $sql = "SELECT *
        FROM products
        WHERE Pname=$str";
        $abc = $result->connection($sql);
        return $abc;
    }



}

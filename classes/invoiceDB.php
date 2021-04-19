<?php
require_once "../config/config.php";

class invoice
{



    public function insert()    
    {

        $result = new conn();
        $sql = "INSERT INTO invoices (Cname, shopName, address, phone, 
        productName, unitPrice, quantity, total)
            VALUES ('$_POST[Cname]', '$_POST[shopName]', '$_POST[adress]',
             '$_POST[phone]', '$_POST[product]', '$_POST[unitPrice]', '$_POST[quantity]', '$_POST[total]')";
        $abc = $result->connection($sql);
        return $abc;
    }

    public function showData()
    {




        $result = new conn();
        $sql = 'SELECT *
        FROM invoices
        ORDER BY invoiceID';
        $abc = $result->connection($sql);
        return $abc;
    }
    public function deletevoice($id)
    {

        $result = new conn();
        $sql = "DELETE FROM invoices WHERE invoiceID= $id ";
        $abc = $result->connection($sql);
        return $abc;
    }

    public function editmode($id)
    {



        $result = new conn();
        $sql = "SELECT *
        FROM invoices
        where invoiceID = $id";
        $abc = $result->connection($sql);
        return $abc;
    }

    public function updateinvoice($id)
    {



        $result = new conn();
        $sql = "UPDATE invoices
            SET Cname='$_POST[Cname]', shopName='$_POST[shopName]', 
            phone='$_POST[phone]', unitPrice='$_POST[unitPrice]', address='$_POST[address]', 
            quantity='$_POST[quantity]', total= '$_POST[total]'
                WHERE invoiceID=$id ";


        $abc = $result->connection($sql);
        return $abc;
    }

    public function redirect()
    {
        header("location: ../pages/showAllInvoices.php");
       
    }


    public function reciptData($id)
    {




        $result = new conn();
        $sql = "SELECT *
        FROM invoices
        WHERE invoiceID= $id
        ORDER BY invoiceID";
        $abc = $result->connection($sql);
        return $abc;
    }
}

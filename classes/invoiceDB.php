<?php
require_once "../config/config.php";

class invoice
{



    public function insert($val)
    {
        

        if (isset($_POST['submit'])) {

            $pro = array();
            for ($i = 1; $i <= $val; $i++) {

                $pro['product' . $i] =  $_POST['productName' . $i];
            }
            foreach ($pro as $x => $x_value) {

                $valu[] =  $x_value;
              
            }


            
            $unit = array();
            for ($i = 1; $i <= $val; $i++) {

                $unit['unitprice' . $i] =  $_POST['unitPrice' . $i];
            }
               
            foreach ($unit as $x => $x_value) {
                $uni[] =  $x_value;
            }

            
            $quantity = array();

            for ($i = 1; $i <= $val; $i++) {

                $quantity['quantity' . $i] =  $_POST['quantity' . $i];
            }  
            foreach ($quantity as $x => $x_value) {
                $quan[] =  $x_value;
            }


             $total = array();
            for ($i = 1; $i <= $val; $i++) {

                $total['total' . $i] =  ($_POST['quantity'.$i] * $_POST['unitPrice'.$i]);
            }

            foreach ($total as $x => $x_value) {
                $tot[] =  $x_value;
            }
        }

        $val = implode(",", $valu);
        $unit = implode(",", $uni);
        $quan = implode(",", $quan);
        $total = implode(",", $tot);

        

        $result = new conn();
        $sql = "INSERT INTO invoices (Cname, shopName, address, phone, 
        productName, unitPrice, quantity, total)
            VALUES ('$_POST[Cname]', '$_POST[shopName]', '$_POST[adress]',
             '$_POST[phone]', '$val' , '$unit' , '$quan', '$total')";
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
            phone='$_POST[phone]', unitPrice='$_POST[unitPrice]',  address='$_POST[address]', 
            productName='$_POST[productName]', quantity='$_POST[quantity]', total= '$_POST[total]',
            productName2='$_POST[productName2]', quantity2='$_POST[quantity2]', unitPrice2='$_POST[unitPrice2]', total2= '$_POST[total2]'

                WHERE invoiceID='$id' ";


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

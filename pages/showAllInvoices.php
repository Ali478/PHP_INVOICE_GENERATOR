<?php




include "./../include/header.php";
include "./../classes/productDB.php";
include "./../classes/invoiceDB.php";
include "../include/session.php";

?>

<!DOCTYPE html>
<html>

<body>
    <div id="container" >
        <h1 id="h1">INVOICES</h1>
        <br>
        <a href="insertInvoice.php" class="btn btn-dark btn-lg" id="butt">
            Insert New invoice</a>
        <table class="table table-striped table-dark">

            <thead>

                <tr>
                    <th>NAME</th>
                    <th>SHOP NAME</th>
                    <th>ADRESS</th>
                    <th>Phone </th>
                    <th>Product (unit-price) </th>
                    <th>QUANTITY </th>
                    <th>Total</th>
                    <th>Grand Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = new invoice();
                $q = $data->showData();
                foreach ($q->fetchAll() as $row) {
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['Cname']) ?></td>
                        <td><?php echo htmlspecialchars($row['shopName']); ?></td>
                        <td><?php echo htmlspecialchars($row['address']); ?></td>
                        <td><?php echo htmlspecialchars($row['phone']); ?></td>

                        <td><ol>  <?php
                                $pro = explode(",", $row['productName']);
                             
                                $unit = explode(",", $row['unitPrice']);
                                foreach ($pro as $key => $value) {

                                ?>

                                 
                                <li>
                                <?php echo $pro[$key]  ?> (Rs <?php echo $unit[$key] ?> )  <br>
                                </li>
                                  
                                <?php } ?> </ol></td>

                        <td><ol> 
                        <?php
                                $pro = explode(",", $row['productName']);
                                $quan = explode(",", $row['quantity']);

                                foreach ($pro as $key => $value) {

                                ?>

                                 
                                <li>
                               (<?php echo $quan[$key]  ?>) <br>
                                </li>
                              
                                <?php } ?>
                        
                                </ol>   </td>


                        <td>  <ol>
                        <?php
                                $total= explode(",", $row['total']);


                                foreach ($pro as $key => $value) {

                                ?>

                                
                                <li> 
                                (Rs:<?php echo $total[$key]  ?> )<br>
                                </li>
                                 
                                <?php } ?>
                        
                                </ol> </td>

                        <td id="val">Rs: <?php echo array_sum($total);  ?></td>


                        <td>

                            <a href="deleteInvoice.php?id=<?php echo htmlspecialchars($row['invoiceID']); ?>" class="btn btn-danger">Delete</a>
                            <!--       <a href="editInvoice.php?id=<?php #echo htmlspecialchars($row['invoiceID']); 
                                                                    ?>" class="btn btn-dark">Edit</a> -->
                            <a href="recipt.php?id=<?php echo htmlspecialchars($row['invoiceID']); ?>" class="btn btn-success">Print</a>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>

        <br>
        <a href="./dashboard.php" class="btn btn-primary btn-lg">Back to home page</a><br><br>
        <h1>logout <a href="/pages/logout.php" class="btn btn-warning btn-lg" id="invoice">logout</a></h1>


</body>
</div>

</html>

<?php

include  "./../include/footer.php";

<?php


require_once "../classes/invoiceDB.php";
require_once "../classes/company.php";

$q = $_REQUEST['id'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recipt</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>



  <table id="total" class="table table-bordered">
    <thead>

      <tr>
        <td></td>
        <td><img width="160px" src="../assets/images/logo.png" alt=""></td>
        <td colspan="3">
          <h1>INVOICE</h1>
        </td>

      </tr>

      <tr>
        <td></td>

        <?php
                $data = new invoice();
                $q = $data->reciptData($q);
                foreach ($q->fetchAll() as $row) {
                ?>


        <td>
          <h4><b>BILL DATE:</b></h2>
            <h4><?php echo date("l, d-m-yy"); ?></h4>
            <h4><b>INVOICE ID:</b></b></h2>
              <h4><?php echo htmlspecialchars($row['invoiceID']) ?></h4>
        </td>
        <td colspan="3">
          <h4><b>BILL TO:</b></h2>
          <h5><?php echo htmlspecialchars($row['shopName']) ?></h5>
          <h5><?php echo htmlspecialchars($row['Cname']) ?></h5>
          <h5><?php echo htmlspecialchars($row['phone']) ?></h5>
          <h5><?php echo htmlspecialchars($row['address']) ?></h5>
        </td>




                  
      </tr>
     

      <tr>
        <th scope="col">No.</th>
        <th scope="col">ITEM</th>
        <th scope="col">QTY</th>
        <th scope="col">Unit Price</th>
        <th scope="col">Amount Due</th>
      </tr>
    </thead>
    <tbody>

                  
      <tr>
      <?php
        $pro= explode("," , $row['productName']);
        $quan= explode(",", $row['quantity']);
        $unit= explode(",", $row['unitPrice']);
        $total= explode(",", $row['total']);
        
              foreach($pro as $key=>$value){ 
              
         ?>
        <th><?php echo $key+1 ?></th>
        <td><?php echo $pro[$key] ?></td>
        <td><?php echo $quan[$key] ?></td>
        <td><?php echo $unit[$key] ?></td>
        <td><?php echo $total[$key]?></td>
        

      </tr>
      <?php  } ?>

      <tr>
          <td>--></td>
          <td><b>Grand Total</b></td>
          <td></td>
          <td></td>
          <td id="val"><?php echo array_sum($total);  ?></td>
      </tr>
      
    </tbody>
    <?php } ?>
    
  </table>

<table class="table table-bordered">




<tbody>


<?php
                $data = new company();
                $q = $data->show();
                foreach ($q->fetchAll() as $row) {
                ?>
      <tr>
        <td><h4><b>SIGNATURE</b></h4></td>
        <td> <h4><b>CONTACT :</b></h4> 
          <?php echo htmlspecialchars($row['contactName1']) ?><br>
        <?php echo htmlspecialchars($row['phone1']) ?><br>
        <?php echo htmlspecialchars($row['contactName2']) ?><br>
        <?php echo htmlspecialchars($row['phone2']) ?>
      </td>
        <td>
          <h4><b>ADDRESS</b></h4>
          
        <?php echo htmlspecialchars($row['Address']) ?></td>
        <td> 
          <h4><b>Payment Method</b></h4>
          <ul>
            <li>CASH:________________</li>
            <li>Cheque:______________</li>
            <li>Transfer ID:____________</li>
          </ul>
        
        </td>
      </tr>

      <?php } ?>
    </tbody>
</table>


</body>

</html>
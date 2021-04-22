<?php
include "./../include/header.php";
include "./../classes/productDB.php";
include "./../classes/invoiceDB.php";



$q = $_REQUEST['id'];
$data1 = new invoice();
$aq = $data1->editmode($q);

?>
<html lang="en">

<head>
  <title>Update</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


  <script type="text/javascript">
    function sum() {
      var val1 = document.getElementById('unitPrice').value;
      var val2 = document.getElementById('quantity').value;
      var sum = Number(val1) * Number(val2);
      document.getElementById('total').value = sum;
    }

    function sum2() {
      var val1 = document.getElementById('unitPrice2').value;
      var val2 = document.getElementById('quantity2').value;
      var sum = Number(val1) * Number(val2);
      document.getElementById('total2').value = sum;
    }

    

  </script>
</head>

<body>
  <br><br>
  <form action="" method="post">
    <?php while ($row = $aq->fetch()) : ?>

      Name: <input type="text" name="Cname" id="" value="<?php echo htmlspecialchars($row['Cname']) ?>">
      <br></br>
      Shop Name: <input type="text" name="shopName" id="" value="<?php echo htmlspecialchars($row['shopName']) ?>">
      <br></br>
      Address: <input type="text" name="address" id="" value="<?php echo htmlspecialchars($row['address']) ?>">
      <br></br>
      phone : <input type="text" name="phone" id="" value="<?php echo htmlspecialchars($row['phone']) ?>">
      <br></br>


      Product Name: <input type="text" name="productName" id="" value="<?php echo htmlspecialchars($row['productName']) ?>">
      <br></br>

      Unit Price: <input type="text" name="unitPrice" id="unitPrice" onchange="sum()" value="<?php echo htmlspecialchars($row['unitPrice']) ?>">
      <br></br>
      Quantity: <input type="text" name="quantity" id="quantity" onchange="sum()" value="<?php echo htmlspecialchars($row['quantity']) ?>">
      <br></br>
      Total: <input type="text" name="total" id="total" value="<?php echo htmlspecialchars($row['total']) ?>">
      <br></br>
      Product Name 2: <input type="text" name="productName2" id="" value="<?php echo htmlspecialchars($row['productName2']) ?>">
      <br></br>

      Unit Price 2: <input type="text" name="unitPrice2" id="unitPrice2" onchange="sum2()" value="<?php echo htmlspecialchars($row['unitPrice2']) ?>">
      <br></br>
      Quantity 2: <input type="text" name="quantity2" id="quantity2" onchange="sum2()" value="<?php echo htmlspecialchars($row['quantity2']) ?>">
      <br></br>
      Total 2: <input type="text" name="total2" id="total2" value="<?php echo htmlspecialchars($row['total2']) ?>">
      <br></br>
      <input type="submit" name="submit" class="btn btn-success  btn-lg">
    <?php endwhile; ?>
    <a href="./showAllInvoices.php" class="btn btn-primary btn-lg">Back Invoices</a>

  </form>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
  $data1->updateinvoice($q);
  $data1->redirect();

  echo "done";
}
echo "<br><br><br><br><br><br>";
include  "./../include/footer.php";

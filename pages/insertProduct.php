<?php
include "../include/header.php";
include "../classes/productDB.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
  <br><br>
  <form action="" method="post">
    <input type="hidden" name="userid" id="id">
    Product Name: <input type="text" name="Pname" id="" placeholder="test_product">
    <br></br>
    Unit Price: <input type="text" name="unitPrice" id="" placeholder="RS-400">
    <br></br>
    Availabe stock: <input type="text" name="availableStock" id="" placeholder="50">
    <br></br>
    <input type="submit" name="submit" class="btn btn-dark btn-lg">
</body>
</html>

<?php
if (isset($_POST['submit'])) {
  $data = new product();
  
  $data->insert();
  $data->redirect();
}
include  "../include/footer.php";   

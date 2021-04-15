<?php
include "./../include/header.php";
include "./../classes/productDB.php";
include "./../classes/invoiceDB.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script>
    function run(str) {


      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("demo").innerHTML = this.responseText;
        }
      };
      xhttp.open("get", "../ajax/demo.php?q=" + str, true);
      xhttp.send();
    }
  </script>
  <script type="text/javascript">
    function sum() {
      var val1 = document.getElementById('unitPrice').value;
      var val2 = document.getElementById('quantity').value;
      var sum = Number(val1) * Number(val2);
      document.getElementById('total').value = sum;
    }

    function sle(str) {}
  </script>
</head>

<body>
  <br>
  <h1>INVOICE</h1>

  <br>
  <form action="" method="post">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputName">NAME :</label>
        <input type="text" class="form-control" name="Cname" placeholder="Client's Name">
      </div>
      <div class="form-group col-md-6">
        <label for="inputname">SHOP NAME :</label>
        <input type="text" class="form-control" name="shopName" placeholder="Client's Shop Name">
      </div>
    </div>


    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputName">PHONE# :</label>
        <input type="text" class="form-control" name="phone" placeholder="Client's Phone">
      </div>
      <div class="form-group col-md-6">
        <label for="inputname">ADRESS :</label>
        <input type="text" class="form-control" name="adress" placeholder="Client's Adress">
      </div>
    </div>

    <div class="form-col">
      <hr>
      <hr>
      <?php
      $drop = new product();
      $data = $drop->selecti();
      ?>
      Select the Product :
      <select name="product" onchange="run(this.value)">
        <option value="">Select the product</option>
        <?php foreach ($data->fetchAll() as $row) : ?>
          <option value="<?= $row["id"] ?>"><?= $row["Pname"] ?></option>
        <?php endforeach; ?>

      </select>






      <div class="form-row">

        <div class="form-group col-md-6" id="demo"></div>

        <div>
          <label for="inputname">QUANTITY :</label>
          <input type="number" class="form-control" name="quantity" onchange="sum()" id="quantity" placeholder="how much items of that product">
        </div>
      </div>
      <h4>Total:</h4>
      <input name="total" id="total" value="">


      <hr>
      <hr>
      <h4>Grand Total</h4>
      <input type="text">

    </div>
    <br><br><br>
    <button type="submit" name="submit" class="btn btn-success btn-lg">submit</button>
  </form>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
  $qw = new invoice();
  $qw->insert();
  $qw->redirect();
}
echo "<br><br><br><br><br><br>";
include  "./../include/footer.php";

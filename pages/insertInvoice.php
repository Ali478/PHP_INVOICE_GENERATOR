<?php
include "./../include/header.php";
include "./../classes/productDB.php";
include "./../classes/invoiceDB.php";
include "./../include/session.php";

if (isset($_POST['submit'])) {
  $q = new invoice();
  $q->insert();
  $q->redirect();
  echo "<h1>Inserted</h1>";
}
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

    function run2(str) {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("demo2").innerHTML = this.responseText;
        }
      };
      xhttp.open("get", "../ajax/add.php?q=" + str, true);
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

    function pro2() {
      var val1 = document.getElementById('unitPrice2').value;
      var val2 = document.getElementById('quantity2').value;
      var sum = Number(val1) * Number(val2);
      document.getElementById('totaly').value = sum;

    }
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
      <select name="" onchange="run(this.value)">
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


      <div class="form-col">
        <hr>
        <hr>
        <?php

        $data = $drop->selecti();
        ?>
        Select the Product :
        <select name="" onchange="run2(this.value)">
          <option value="">Select the product</option>
          <?php foreach ($data->fetchAll() as $row) : ?>
            <option value="<?= $row["id"] ?>"><?= $row["Pname"] ?></option>
          <?php endforeach; ?>

        </select>






        <div class="form-row">

          <div class="form-group col-md-6" id="demo2"></div>

          <div>
            <label for="inputname">QUANTITY :</label>
            <input type="number" class="form-control" name="quantity2" onchange="pro2()" id="quantity2" placeholder="how much items of that product">
          </div>
        </div>
        <h4>Total:</h4>
        <input name="totaly" id="totaly" onchange="gtotal()" value="">


        <hr>
        <hr>



      </div>
      <br><br>
      <button type="submit" name="submit" class="btn btn-success btn-lg">submit</button> <br> <br>
  </form>


  <a href="./showAllInvoices.php" class="btn btn-primary btn-lg">Back to home page</a><br><br>
</body>

</html>

<?php

echo "<br><br><br><br><br><br>";
include  "./../include/footer.php";

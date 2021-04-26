<?php
include "./../include/header.php";
include "./../classes/productDB.php";
include "./../classes/invoiceDB.php";
include "./../include/session.php";

if (isset($_POST['submit'])) {
  $val = $_POST['select'];
  $q = new invoice();
  $q->insert($val);
  $q->redirect();
  echo "<h1>Inserted</h1>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


  <script type="text/javascript">
    function sum() {
      var val1 = document.getElementById('unitPrice1').value;
      var val2 = document.getElementById('quantity1').value;
      var sum = Number(val1) * Number(val2);
      document.getElementById('total1').value = sum;
    }
  </script>

  <script>
    function clik(str) {


      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("data").innerHTML = this.responseText;
        }
      };
      xhttp.open("get", "../ajax/ajax.php?q=" + str, true);
      xhttp.send();

    };


    <?php
    for ($i = 1; $i <= 100; $i++) { ?>

      function produ<?php echo $i; ?>(str) {
        var nu = <?php echo $i; ?>;



        $.ajax({
          type: "GET",
          url: "../ajax/ajax2.php",
          data: {
            q: str,
            a: nu
          },
          success: function(data) {
            $("#product<?php echo $i; ?>").html(data) = this.responseText;
          }

        });


      }

    <?Php } ?>
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

      <h2>How Many products you want to add</h2>

      <input type="text" name="select" id="select" onchange="clik(this.value)">
      <!-- <select name="" id="select" onchange="clik(this.value)">
        <option value="">How Many products you want to add</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
      </select> -->
      <hr>
      <hr>





      <div class="form-row">

        <div class="form-group col-md-6" id="data"></div>


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

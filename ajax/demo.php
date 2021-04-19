<?php



$q = intval($_GET['q']);



$servername = "localhost";
$username = "root1";
$password = "rootroot_1";
$dbname = "Invoice_app";

try {
    $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql = "SELECT *
       FROM products
    WHERE id=$q";
       
    
    $result = $conn->query($sql);
    
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
$conn = null;

?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    
<?php foreach ($result->fetchAll() as $row) : ?>
    <div class="form-group col-md-6">
    <label for="inputName">Product Name :</label>
          <input type="text" class="form-control" name="product"  value="<?= $row['Pname'] ?>">
    <label for="inputName">UNIT PRICE :</label>
          <input type="number" class="form-control" name="unitPrice" value="<?= $row['unitPrice'] ?>" id="unitPrice">
        </div>


<?php endforeach ?>

</body>
</html>


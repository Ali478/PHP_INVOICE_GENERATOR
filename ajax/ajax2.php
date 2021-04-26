<?php



$q = intval($_GET['q']);


$i =intval($_GET['a']);

$servername = "localhost";
$username = "root1";
$password = "rootroot_1";
$dbname = "Invoice_app";

try {
    $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql = "SELECT *
       FROM products
    WHERE id='$q'";
       
    
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
    <label for="inputName">PRODUCT NAME :</label>
          <input type="text" class="form-control" name="productName<?php echo $i; ?>" value="<?= $row['Pname'] ?>" id="productName<?php echo $i; ?>">
    <label for="inputName">UNIT PRICE :</label>
          <input type="text" class="form-control" name="unitPrice<?php echo  $i; ?>" value="<?= $row['unitPrice'] ?>" id="unitPrice<?php echo  $i; ?>">
        </div>


<?php endforeach ?>

</body>
</html>


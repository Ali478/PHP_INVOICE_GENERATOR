<?php

$servername = "localhost";
$username = "root1";
$password = "rootroot_1";
$dbname = "Invoice_app";

try {
    $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT *
        FROM products
        ORDER BY id';
    $result = $conn->query($sql);
    $abc =$result->fetchAll() ;
    
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
$conn = null;






$q = intval($_GET['q']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script>
    
    </script>




    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head> 

<body>



    <?php for ($i = 1; $i <= $q; $i++) {   ?>
        <br><?php echo "<h2>Product Number:$i </h2>";  ?><br>
        
        Select the Product :
        <select name="" onchange="produ<?php echo $i ?>(this.value)">

            <option value="">Select the product</option>

            <?php foreach ($abc as $row) : ?>

            <option value="<?= $row["id"] ?>"><?= $row["Pname"] ?></option>
            
            <?php endforeach; ?>

        </select>

        <br><br>
        
        <div id="product<?php echo $i; ?>"></div>
        <br><br>
        quantity:
        <input type="text" name="quantity<?php echo $i; ?>" id="quantity<?php echo $i; ?>">
        <br><br>
        <br>
        <hr>
        <hr>



    <?php } ?>

</body>

</html>
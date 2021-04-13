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

            Unit Price: <input type="text" name="unitPrice" id="" value="<?php echo htmlspecialchars($row['unitPrice']) ?>">
            <br></br>
            Quantity: <input type="text" name="quantity" id="" value="<?php echo htmlspecialchars($row['quantity']) ?>">
            <br></br>
            Total: <input type="text" name="total" id="" value="<?php echo htmlspecialchars($row['total']) ?>">
            <br></br>
            <input type="submit" name="submit">
        <?php endwhile; ?>
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

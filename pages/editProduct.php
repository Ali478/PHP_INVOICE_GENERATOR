<?php
include "./../include/header.php";
include "./../classes/productDB.php";


$q = $_REQUEST['id'];
$data = new Product();
$aq = $data->editmode($q);
?>
<html lang="en">
<head>
    <title>Update</title>
</head>
<body>
    <br><br>
    <form action="" method="post">
        <?php while ($row = $aq->fetch()) : ?>
            Product Name: <input type="text" name="Pname" id="" value="<?php echo htmlspecialchars($row['Pname']) ?>">
            <br></br>
            Unit Price: <input type="text" name="unitPrice" id="" value="<?php echo htmlspecialchars($row['unitPrice']) ?>">
            <br></br>
            Available Stock: <input type="text" name="availableStock" id="" value="<?php echo htmlspecialchars($row['availableStock']) ?>">
            <br></br>
            <input type="submit" name="submit">
        <?php endwhile; ?>
    </form>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    $data->update($q);
    $data->redirect();
}
echo "<br><br><br><br><br><br>";
include  "./../include/footer.php";


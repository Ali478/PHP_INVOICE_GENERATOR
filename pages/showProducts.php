<?php

include "../include/header.php";
include "./../classes/productDB.php";
?>

<!DOCTYPE html>
<html>

<body>
    <div id="container">
        <h1 id="h1">PRODUCTS</h1>
        <a href="insertProduct.php" class="btn btn-dark btn-lg" id="butt">
            Insert New Product</a>
        <table class="table table-bordered table-condensed">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Unit Price</th>
                    <th>Stock Remaining</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = new product();
                $q = $data->showData();
                foreach ($q->fetchAll() as $row) {
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['Pname']) ?></td>
                        <td><?php echo htmlspecialchars($row['unitPrice']); ?></td>
                        <td><?php echo htmlspecialchars($row['availableStock']); ?></td>
                        <td>

                            <a href="showProducts.php?action=delete&id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-danger">Delete</a>
                            <a href="editProduct.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-dark">Edit</a>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>

        <br>
        <a href="./dashboard.php" class="btn btn-primary btn-lg">Back to home page</a><br><br>
  <h1 >logout  <a   href="/pages/logout.php" class="btn btn-warning btn-lg" id="invoice">logout</a></h1>


</body>
</div>
</html>

<?php
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = (int)$_GET['id'];
    if ($data->delete($id)) {
        $data->redirect();
    }
}
include  "./../include/footer.php"; 

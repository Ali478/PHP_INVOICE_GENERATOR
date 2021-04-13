<?php

include "./../include/header.php";
include "./../classes/productDB.php";
include "./../classes/invoiceDB.php";
?>

<!DOCTYPE html>
<html>

<body>
    <div id="container">
        <h1 id="h1">Invoices</h1>
        <a href="insertInvoice.php" class="btn btn-dark btn-lg" id="butt">
            Insert New invoice</a>
        <table class="table table-bordered table-condensed">
            <thead>
                <tr>
                    <th>NAME</th>
                    <th>SHOP NAME</th>
                    <th>ADRESS</th>
                    <th>Phone </th>
                    <th>Product </th>
                    <th>UNIT PRICE </th>
                    <th>QUANTITY </th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = new invoice();
                $q = $data->showData();
                foreach ($q->fetchAll() as $row) {
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['Cname']) ?></td>
                        <td><?php echo htmlspecialchars($row['shopName']); ?></td>
                        <td><?php echo htmlspecialchars($row['address']); ?></td>
                        <td><?php echo htmlspecialchars($row['phone']); ?></td>
                        <td><?php echo htmlspecialchars($row['productName']); ?></td>
                        <td><?php echo htmlspecialchars($row['unitPrice']); ?></td>
                        <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                        <td><?php echo htmlspecialchars($row['total']); ?></td>
                        <td>

                            <a href="deleteInvoice.php?id=<?php echo htmlspecialchars($row['invoiceID']); ?>" class="btn btn-danger">Delete</a>
                            <a href="editInvoice.php?id=<?php echo htmlspecialchars($row['invoiceID']); ?>" class="btn btn-dark">Edit</a>
                            <a href="recipt.php?id=<?php echo htmlspecialchars($row['invoiceID']); ?>" class="btn btn-success">Print</a>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>

        <br>
        <a href="./../index.php" class="btn btn-primary btn-lg">Back to home page</a>

</body>
</div>

</html>

<?php

include  "./../include/footer.php";

<?php
include "./../classes/invoiceDB.php";




$q = $_REQUEST['id'];
$data = new invoice();
$data->deletevoice($q);

$data->redirect();
echo "done";

<?php
include "./../classes/productDB.php";

$q = $_REQUEST['id'];
$data = new product();
$data->delete($q);
$data->redirect();


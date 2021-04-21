<?php

require_once "../classes/loginDB.php";
session_start();
$data = new login;
$row = $data->show(($_SESSION["user_login"]));
$displayName = ucwords($row["Name"]);

if (isset($_SESSION["user_login"])) {
    if (time() - $_SESSION["login_time_stamp"] > 600) {
        session_unset();
        session_destroy();
        header("Location:login.php");
    }
} else {
    $data->redirect2();
}


if (isset($_SESSION["user_login"])) {
    echo "<h3><i>welome $displayName</i></h3> ";
} else {
    echo "LOGIN AGAIN";

    $data->redirect2();
}

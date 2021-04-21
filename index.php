<?php
include "./include/header.php";


session_start();
if(!empty($_SESSION["user_login"])) {
    
    header("location: ./pages/dashboard.php");

} else {


    header("location: ./pages/loginForm.php");
    
}

?>




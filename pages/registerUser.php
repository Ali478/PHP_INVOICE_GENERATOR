<?php

include "../classes/productDB.php";
include "../classes/loginDB.php";
include "../include/session.php";


if (isset($_POST['submit'])) {
    $data = new login();
    $data->insert();
    $data->redirect();
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <title>New User</title>

<link rel="stylesheet" href="../assets/css/register.css">


<script>
$(document).ready(function(){

$('.input').focus(function(){
  $(this).parent().find(".label-txt").addClass('label-active');
});

$(".input").focusout(function(){
  if ($(this).val() == '') {
    $(this).parent().find(".label-txt").removeClass('label-active');
  };
});

});

</script>
</head>

<body>
<form action="" method="post">
  <label>
    <p class="label-txt">ENTER YOUR EMAIL</p>
    <input type="text" class="input" name="email">
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  <label>
    <p class="label-txt">ENTER YOUR NAME</p>
    <input type="text" class="input" name="email">
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  <label>
    <p class="label-txt">ENTER YOUR PASSWORD</p>
    <input type="text" class="input" name="password">
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  <button type="submit" name="submit">submit</button>
</form>


</body>

</html>
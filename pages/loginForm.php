<?php
require_once "../config/config.php";
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_REQUEST['login'])) {

        $email = ($_REQUEST['user_name']);
        $password = ($_REQUEST['password']);

        $conn = new conn();
        $sql = "SELECT * FROM registered_users where username = '$email' and password ='$password' ";

        $select_stmt = $conn->connection($sql);
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
        if ($select_stmt->rowCount() > 0) {

            if ($email == $row["username"]) {

                if (($password == $row["password"])) {

                    $_SESSION["user_login"] = $row["id"];
                    $_SESSION["login_time_stamp"] = time();
                    header("location: dashboard.php");
                } 
                else {

                    echo "wrong pass";
                    header("location: loginForm.php");
                }
            } 
            else {
                echo "wrong email";
                header("location: loginForm.php");
            }
        } 
        else {
            echo "no data";
            header("location: loginForm.php");
        }
    }
}

?>


<html>

<head>
    <title>User Login</title>
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div>
        <form action="" method="post" id="frmLogin" onSubmit="return validate();">
            <div class="demo-table">

                <div class="form-head">Login</div>
                <?php
                if (isset($_SESSION["errorMessage"])) {
                ?>
                    <div class="error-message"><?php echo $_SESSION["errorMessage"]; ?></div>
                <?php
                    unset($_SESSION["errorMessage"]);
                }
                ?>
                <div class="field-column">
                    <div>
                        <label for="username">Username</label><span id="user_info" class="error-info"></span>
                    </div>
                    <div>
                        <input name="user_name" id="user_name" type="name" class="demo-input-box">
                    </div>
                </div>
                <div class="field-column">
                    <div>
                        <label for="password">Password</label><span id="password_info" class="error-info"></span>
                    </div>
                    <div>
                        <input name="password" id="password" type="password" class="demo-input-box">
                    </div>
                    <input type="checkbox" onclick="myFunction()">Show Password

                </div>
                <div class=field-column>
                    <div>
                        <input type="submit" name="login" value="Login" class="btnLogin"></span>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }


        function validate() {
            var $valid = true;
            document.getElementById("user_info").innerHTML = "";
            document.getElementById("password_info").innerHTML = "";

            var userName = document.getElementById("user_name").value;
            var password = document.getElementById("password").value;
            if (userName == "") {
                document.getElementById("user_info").innerHTML = "required";
                $valid = false;
            }
            if (password == "") {
                document.getElementById("password_info").innerHTML = "required";
                $valid = false;
            }
            return $valid;
        }
    </script>












</body>

</html>
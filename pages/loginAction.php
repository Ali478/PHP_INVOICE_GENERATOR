<?php
require_once "../config/config.php";
require_once "../include/session.php";


  
if(isset($_REQUEST['login'])){
    $email =($_REQUEST['user_name']);
    $password =($_REQUEST['password']);
    
    

    $conn =new conn();
    $sql="SELECT * FROM registered_users where username = '$email' and password ='$password' "; 
    
    $select_stmt=$conn->connection($sql);
    
    $row=$select_stmt->fetch(PDO::FETCH_ASSOC);
    if($select_stmt->rowCount()>0)
            {  
                if($email == $row["username"])
                {         
                    if(($password == $row["password"]))
                    {
                        $_SESSION["user_login"]=$row["id"];
                        $loginMsg="successfully Login....";
                        header("location: dashboard.php");
                    }

                    else
                    {
                        echo "wrong pass";
                        header("location: loginForm.php");
                    }
                }

                else
                {
                    echo "wrong email";
                    header("location: loginForm.php");
                
                }
            }
        else
        {
            echo "no data";
            header("location: loginForm.php");

        }

}
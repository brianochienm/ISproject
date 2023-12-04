<?php
require_once "dbconnection.inc.php";

session_start();


if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];   

        $sql = "SELECT * FROM `tbl_users` WHERE `email`='$email'";

        $query = mysqli_query($conn,$sql);

        if(mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_assoc($query);

            $pass = $row['password'];
            $type = $row['role'];

if(md5($password) == $pass){

                if ($type == "Administrator") {
                $_SESSION['adminname'] = $row['user_id'];
                header("Location: index.php");
                }else if ($type == "Culinary Providers") {
                $_SESSION['culprname'] = $row['user_id']; 
                $_SESSION['culprname1'] = $row['fullname'];           
                header("Location: index1.php");
                }else if ($type == "User") {
                $_SESSION['username'] = $row['user_id']; 
                $_SESSION['username1'] = $row['fullname'];             
                header("Location: index2.php");
            }
            }else{
                echo "Incorrect Password.";
            }
        }else{
            echo "User Account not activated yet.";
        }
}
           
?>

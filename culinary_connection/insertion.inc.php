<?php 
 
require 'dbconnection.inc.php';

session_start();

//Register User
if (isset($_POST['regu'])) {
 $fname = $_POST['fname'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];
 $role = $_POST['role'];
 $country = $_POST['country'];
 $password = $_POST['password'];
 $passwordconfirm = $_POST['cpassword'];

 if ($password == $passwordconfirm) {
 if(isset($_SESSION['adminname'])){
    $sql = "INSERT INTO `tbl_users`(`fullname`, `phone_number`, `email`, `password`, `role`, `country`) VALUES ('$fname','$phone','$email',md5('$password'),'$role','$country')";
     mysqli_query($conn, $sql);
  header("Location: index.php?userregistration=success");
 }else{
    $sql = "INSERT INTO `tbl_users`(`fullname`, `phone_number`, `email`, `password`, `role`, `country`) VALUES ('$fname','$phone','$email',md5('$password'),'User','$country')";
     mysqli_query($conn, $sql);
  header("Location: index.html?userregistration=success");
  }
}else{
  echo "Passwords do not match.";
 }
}

//Update User
if (isset($_POST['upu'])) {
 $uid = $_POST['uid'];
 $fname = $_POST['fname'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $passwordconfirm = $_POST['cpassword'];
 $phone = $_POST['phone'];
 $mod = $_POST['mod'];

 if ($password == $passwordconfirm) {
  if ($mod == 1) {
  $sql = "UPDATE `tbl_users` SET `fullname`='$fname',`email`='$email',`phone_number`='$phone',`password`=md5('$password') WHERE `user_id`='$uid'";
     mysqli_query($conn, $sql);
  header("Location: index.php?updateadministrator=success");
  }else if ($mod == 2) {
  $sql = "UPDATE `tbl_users` SET `fullname`='$fname',`email`='$email',`phone_number`='$phone',`password`=md5('$password') WHERE `user_id`='$uid'";
     mysqli_query($conn, $sql);
  header("Location: index1.php?updateculinaryprovider=success");
  }else if ($mod == 3) {
  $sql = "UPDATE `tbl_users` SET `fullname`='$fname',`email`='$email',`phone_number`='$phone',`password`=md5('$password') WHERE `user_id`='$uid'";
     mysqli_query($conn, $sql);
  header("Location: index2.php?updateuser=success");
  }
 }else{
  echo "Passwords do not match.";
 }
}

//Delete A User
if($_REQUEST['action'] == 'deleteU' && !empty($_REQUEST['id'])){ 
$deleteItem = $_REQUEST['id'];
$sql = "DELETE FROM `tbl_users` WHERE `user_id` = '$deleteItem'";
mysqli_query($conn, $sql); 
header("Location: index.php?deleteuser=success");
}

//Add Market
if (isset($_POST['addM'])) {
 $pname = $_SESSION['culprname1'];
 $iname = $_POST['iname'];
 $itype = $_POST['itype'];
 $sprice = $_POST['sprice'];
 $exp = $_POST['exp'];  
 $quan = $_POST['quan'];

$imagefile = $_FILES['image']['name'];

$valid_extensions = array("jpg","jpeg","png");

$extension = pathinfo($imagefile, PATHINFO_EXTENSION);

if(in_array(strtolower($extension),$valid_extensions) ) {

if(move_uploaded_file($_FILES['image']['tmp_name'], "img/".$imagefile)){

  $sql = "INSERT INTO `market`(`Provider_Name`, `Item_Name`, `Item_Type`, `Image`, `Expire_At`, `Price`, `Quantity`) VALUES ('$pname','$iname','$itype','$imagefile','$exp','$sprice','$quan')";
     mysqli_query($conn, $sql);
  header("Location: index1.php?addmarketitem=success");
 }else{
  echo "There is an error with processing the image, directory not found.";
}
}else{
  echo "There is an error with processing image, kindly check the image format.";
}
}

//Update Market Quantity
if (isset($_POST['uppM'])) {
 $mid = $_POST['mid']; 
 $quan = $_POST['quan'];

  $sql = "UPDATE `market` SET `Quantity` = `Quantity` + '$quan' WHERE `Market_ID` = '$mid'";
     mysqli_query($conn, $sql);
  header("Location: index1.php?updatemarketitem=success");
 }

//Delete Market
if($_REQUEST['action'] == 'deleteM' && !empty($_REQUEST['id'])){ 
$deleteItem = $_REQUEST['id'];
$sql = "DELETE FROM `market` WHERE `Item_Name` = '$deleteItem'";
mysqli_query($conn, $sql); 
$sql1 = "DELETE FROM `orders` WHERE `Item_Name` = '$deleteItem'";
mysqli_query($conn, $sql1); 
header("Location: index1.php?deletemarketitem=success");
}

//Add an Order
if (isset($_POST['addorder'])) {
$usern = $_SESSION['username1'];
 $mid = explode(',', $_POST['mid']);
 $itemna = $mid[0];
 $itemty = $mid[1];
 $provider = trim($mid[2]);
 $price = $mid[3];
// $sql1 = "SELECT * FROM `tbl_users` WHERE `fullname` = '$usern'";
// $query1 = mysqli_query($conn,$sql1);
// $row1 = mysqli_fetch_assoc($query1);
// $usern1 = $_SESSION['username1'] . " reach out on " . $row1['email'] . " & " . $row1['phone_number']; 
// $sql2 = "SELECT * FROM `tbl_users` WHERE `fullname` = '$provider'";
// $query2 = mysqli_query($conn,$sql2);
// $row2 = mysqli_fetch_assoc($query2);
// $provider1 = $mid[2] . " reach out on " . $row2['email'] . " & " . $row2['phone_number'];
 $quan = $_POST['quan'];
 $means = $_POST['means'];

  $sql = "INSERT INTO `orders`(`Provider_Name`, `Item_Name`, `Item_Type`, `Buyer_Name`, `Price`, `Quantity`, `Payment_Means`) VALUES ('$provider','$itemna','$itemty','$usern','$price','$quan','$means')";
     mysqli_query($conn, $sql);
  header("Location: index2.php?addOrder=success");
 }

//Complete an Order
if($_REQUEST['action'] == 'completeO' && !empty($_REQUEST['id']) && !empty($_REQUEST['id1']) && !empty($_REQUEST['id2'])){ 
$updateItem = $_REQUEST['id'];
$iname = $_REQUEST['id1'];
$quan = $_REQUEST['id2'];
$sql = "UPDATE `orders` SET `Status` = 'Completed' WHERE `Order_ID` = '$updateItem'";
mysqli_query($conn, $sql); 
$sql1 = "UPDATE `market` SET `Quantity` = `Quantity` - '$quan' WHERE `Item_Name` = '$iname'";
mysqli_query($conn, $sql1); 
header("Location: index1.php?completeOrder=success");
}

//Cancel an Order
if($_REQUEST['action'] == 'cancelO' && !empty($_REQUEST['id'])){ 
$updateItem = $_REQUEST['id'];
$sql = "UPDATE `orders` SET `Status` = 'Cancelled' WHERE `Order_ID` = '$updateItem'";
mysqli_query($conn, $sql); 
header("Location: index2.php?cancelOrder=success");
}

 ?>
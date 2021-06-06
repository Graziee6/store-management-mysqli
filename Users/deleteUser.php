<?php
session_start();
if(!$_SESSION['userId']){
    header("Location:login.php");
 }
 elseif($_SESSION['roleName']!="Administrator"){
    header("Location:norights.php");
 }
  
$mysqli = new mysqli("localhost", "root", "Borntopraise@10", "stock");
$Id = $_GET["Id"];
$deleteUser = $mysqli->query("DELETE FROM stk_users WHERE userId='$Id'");
if(!$deleteUser){
    echo "Couldn't delete".$mysqli->error;
}
else{
    echo "User deleted successfully";
    require "./displayUser.php";
}
?>


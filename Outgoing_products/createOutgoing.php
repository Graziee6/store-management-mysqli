<?php
session_start();
if(!$_SESSION['userId']){
    header("Location:./../Users/login.php");
}
$userId=$_SESSION['userId'];
$mysqli = new mysqli("localhost", "root", "Borntopraise@10", "stock");
$product= $_POST["productName"];
$quantity = $_POST["quantity"];
$query = $mysqli->query("INSERT INTO stk_outgoing(productId,quantity,userId) VALUES('$product', '$quantity',' $userId')");
if(!$query){
    echo "Couldn't register the outgoing product".$mysqli->error;
}
else{
    echo "Outgoing registered successfully";
    require "./displayOutgoing.php";
}
?>
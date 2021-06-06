<?php
session_start();
$productName = $_POST['productName'];
$brand = $_POST['brand'];
$supplier = $_POST['supplier'];
$telephone = $_POST['telephone'];
$userId=$_SESSION['userId'];
$mysqli = new mysqli("localhost", "root", "Borntopraise@10", "stock");
if($mysqli->connect_error){
   echo 'Connection failed'.$mysqli->connect_error;
}
$query = "INSERT INTO stk_products(product_Name, brand, supplier_phone, supplier,userId) VALUES('$productName', '$brand', '$telephone', '$supplier','$userId');";
$exec = $mysqli->query($query);
if(!$exec){
    echo "Could not save the product".$mysqli->error;
}
else{
    require "./displayProduct.php";
}
?>
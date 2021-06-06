<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();
$userId=$_SESSION['userId'];
$mysqli = new mysqli("localhost", "root", "Borntopraise@10", "stock");
$qty=$_POST["quantity"];
$id=$_POST["productName"];
$query = $mysqli->query("INSERT INTO stk_inventory(quantity, productId,userId) VALUES('$qty', '$id','$userId')");

if(!$query){
    echo "Couldn't save inventory".$mysqli->error();
}
else{
    echo "Inventory successfully added";
}
?>
    <a href="displayInventory.php">See all inventories</a>
</body>
</html>

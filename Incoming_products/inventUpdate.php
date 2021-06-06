<?php
require "./../connection.php";
$Id = $_GET["Id"];
$qty = $_GET["qty"];
            $newName = $_POST['productName'];
                $newQuantity = $_POST['quantity'];
                $updateExec = mysqli_query($connection, "UPDATE stk_inventory SET product_Name='$newName', quantity='$newQuantity' WHERE productId='$Id'");
                if (!$updateExec) {
                    echo "Couldn't update product".mysqli_error();
                }
                else{
                    if($row['quantity']!=0){
                        mysqli_query($connection, "UPDATE stk_inventory SET quantity= '$qty+$newQuantity' WHERE productId='$Id'");
                    }
                    require "./displayInventory.php";
                }
                ?>
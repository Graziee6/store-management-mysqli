<?php
$mysqli = new mysqli("localhost", "root", "Borntopraise@10", "stock");
$Id = $_POST["Id"];
            $newName = $_POST['productName'];
                $newBrand = $_POST['brand'];
                $newSupplier = $_POST['supplier'];
                $newPhone = $_POST['telephone'];
                $updateExec = $mysqli->query("UPDATE stk_products SET product_Name='$newName', brand='$newBrand', supplier_phone='$newPhone', supplier='$newSupplier' WHERE productId='$Id'");
                if (!$updateExec) {
                    echo "Couldn't update product".$mysqli->error;
                }
                else{
                    require "./displayProduct.php";
                }
                ?>
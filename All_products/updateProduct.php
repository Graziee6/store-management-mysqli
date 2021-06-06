<?php
session_start();
if(!$_SESSION['userId']){
    header("Location:../Users/login.php");
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            background-color: rgb(0, 53, 83);
        }

        .main{
            background-color: #fff;
            border-radius: 10px;
            width: 40%;
            margin: 3em auto;
            font-family: sans-serif;
            font-size: 1.2em;
        }
        .main *{
            margin-bottom: 10px;
        }
        form{
            padding: 30px 50px;
        }
        form .labels, input{
            display: inline-block;
        }
        h2{
            text-align: center;
            padding-top:2em;
        }
        input:not(input[type="submit"]){
            padding: 10px;
            width: 50%;
        }
        input[type="submit"]{
            width: 10em;
            padding: 5px;
            background-color: rgb(0, 53, 83);
            font-weight: 500;
            color: #000;
            border-color: #000;
            font-size: medium;
        }
        /* input, label{
            display: block;
        } */
        .labels{
            width: 40%;
        }
        input[read-only]{
            margin-left: 7.5em;
        }
    </style>
</head>

<?php
$mysqli = new mysqli("localhost", "root", "Borntopraise@10", "stock");
$Id = $_GET["Id"];
$execUpdateQ = $mysqli->query("SELECT * FROM stk_products WHERE productId='$Id'");
$row = $execUpdateQ->fetch_assoc();
?>

<body>
    <div class="main">
        <h2>Update product</h2>
        <form action="./prodUpdate.php" method="POST">
            <input type="text" value="<?=$Id?>" name="Id" readonly><br>
            <label for="product" class="labels">Product</label>
            <input type="text" name="productName" class="inputs" id="product" placeholder="Enter product name" value="<?=$row['product_Name']?>">
            <label for="brand" class="labels">Product brand</label>
            <input type="text" name="brand" class="inputs" id="brand" placeholder="Enter the product's brand" value="<?=$row['brand']?>">
            <label for="supplier" class="labels">Supplier</label>   
            <input type="text" name="supplier" class="inputs" id="supplier" placeholder="Enter the supplier's name" value="<?=$row['supplier']?>">
            <label for="phone" class="labels">Telephone</label>
            <input type="number" name="telephone" class="inputs" id="phone" placeholder="Enter the suppliers' phone number" value="<?=$row['supplier_phone']?>">
            <input type="submit" value="Update product"> 
        </form>
    </div>
</body>  
</html>

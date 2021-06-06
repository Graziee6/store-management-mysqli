<?php
session_start();
if(!$_SESSION['userId']){
    header("Location:../Users/login.php");
 }
require "./../connection.php";
$Id = $_GET["Id"];
$product = mysqli_query($connection, "SELECT * FROM stk_products, stk_inventory WHERE productId='$Id'");
?>
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
        a{
            color: #000;
            padding: 24px;
            text-decoration: none;
        }
        a, input[value="Confirm quantity"]{
            display: inline;
        }
</style>
<body>
<div class="main">
<h2>Add product quantity</h2>
    <form action="./inventUpdate.php?qty=<?=$Id?>" method="POST">
    <label class="labels" for="name">Product name</label>
    <?php
    while($row= mysqli_fetch_assoc($product)){
        $qty = $row["quantity"];
    ?>
    <input type="text" name="productName" id="name" value="<?=$row['product_Name']?>">
    <?php }?>
<label for="qty" class="labels">Product quantity</label>
<input type="number" name="quantity" id="qty" value="<?=$row['quantity']?>">
<a href="./inventUpdate.php?qty=<?=$qty?>">Confirm quantity</a>
</form>
<a href="./../All_products/displayProduct.php">Choose the product</a>
</div>
</body>
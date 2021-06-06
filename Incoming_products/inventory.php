<?php
session_start();
if(!$_SESSION['userId']){
    header("Location:../Users/login.php");
 }
 $mysqli = new mysqli("localhost", "root", "Borntopraise@10", "stock");
// $Id = $_GET["Id"];
$product = $mysqli->query("SELECT * FROM stk_products");
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
            padding: 24px;
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
            padding: 10px;
            background-color: rgb(0, 53, 83);
            font-weight: 500;
            color:#fff;
            border: 2px solid #fff;
            border-radius: 5px;
            font-size: medium;
        }
        /* input, label{
            display: block;
        } */
        .labels{
            width: 40%;
        }
        
        select{
            padding: 10px;
        }
        .header{
           height: 5em;
           width: 100vw;
           background: #fff;
       }
       ul{
           display: flex;
           gap:1em;
           margin-left: 15em;
       }
       li{
           list-style-type: none;
           line-height: 5em;
       }

       ul li a{
        text-decoration: none;
        color: #rgb(0, 53, 83);
        width: 100%;
        font-weight: 500;
       }
        @media only screen and (min-width:360px) and (max-width:768px){
            .main{
            background-color: #fff;
            border-radius: 10px;
            width: 80%;
            margin: 3em auto;
            font-family: sans-serif;
            font-size: 1.2em;
            display: flex;
        }
        .main *{
            margin-bottom: 10px;
        }
        form{
            padding: 30px 50px;
        }
        form{
            display: flex;
        }
        }
</style>
<body>
<header>
        <nav class="header">
            <ul>
                <li><a href="./../Users/user.php">Add User</a></li>
                <li><a href="./../Users/displayUser.php">Display users</a></li>
                <li><a href="./../All_products/allProducts.php">Add product</a></li>
                <li><a href="./../All_products/displayProduct.php">Display products</a></li>
                <li><a href="./../Incoming_products/displayInventory.php">Display inventories</a></li>
                <li><a href="./../Outgoing_products/outgoingProd.php">Create outgoing</a></li>
                <li><a href="./../Outgoing_products/displayOutgoing.php">Display Outgoing</a></li>
            </ul>  
        </nav>
    </header>
<div class="main">
<h2>Add product quantity</h2>
    <form action="./createInvent.php" method="POST">
    <label class="labels" for="name">Product name</label>
    <select name="productName" id="name">
        <?php
        while($products=$product->fetch_assoc()){
            ?>
            <option value="<?=$products["productId"]?>"><?=$products["product_Name"]?></option>
        <?php }?>
    </select>
<label for="qty" class="labels">Product quantity</label>
<input type="number" name="quantity" id="qty" min="1">
<input type="submit" value="Confirm quantity">
</form>
</div>
</body>

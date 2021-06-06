<?php
session_start();
if(!$_SESSION['userId']){
    header("Location:../Users/login.php");
 }
 elseif ($_SESSION['roleName']!="Manager") {
    header("Location:./../Users/norights.php");
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
        a:not(ul li a){
            color: #fff;
            font-family: sans-serif;
            text-align: center;
            margin: 0 30em;
            text-decoration: none;
            margin-top: -4em;
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

       ul li  a{
        text-decoration: none;
        color: #rgb(0, 53, 83);
        width: 100%;
        font-weight: 500;
       }

        @media only screen (max-width:386px){
            *{
                width: 100%;
            }
            input, .labels{
                display:block;
            }
            input:not(input[type="submit"]){
            padding: 3px;
            width: 100%;
        }
        }
        @media only screen (min-width:768px){
            .main{
                width: 70%;
            }
        }
    </style>
</head>
<body>
<header>
        <nav class="header">
            <ul>
                <li><a href="./../home.php">Home</a></li>
                <li><a href="./../Users/user.php">Add User</a></li>
                <li><a href="./../Users/displayUser.php">Display users</a></li>
                <li><a href="./../All_products/displayProduct.php">Display products</a></li>
                <li><a href="./../Incoming_products/inventory.php">Register inventory</a></li>
                <li><a href="./../Incoming_products/displayInventory.php">Display inventories</a></li>
                <li><a href="./displayOutgoing.php">Display outgoing products</a></li>
                <li><a href="./../Outgoing_products/outgoingProd.php">Create outgoing</a></li>
            </ul>  
        </nav>
    </header>
    <div class="main">
        <h2>Register a product</h2>
        <form action="./prodCreate.php" method="POST">
            <label for="product" class="labels">Product</label>
            <input type="text" name="productName" class="inputs" id="product" placeholder="Enter product name">
            <label for="brand" class="labels">Product brand</label>
            <input type="text" name="brand" class="inputs" id="brand" placeholder="Enter the product's brand">
            <label for="supplier" class="labels">Supplier</label>
            <input type="text" name="supplier" class="inputs" id="supplier" placeholder="Enter the supplier's name">
            <label for="phone" class="labels">Telephone</label>
            <input type="number" name="telephone" class="inputs" id="phone" placeholder="Enter the suppliers' phone number">
            <input type="submit" value="Save product">
        </form>
    </div>
    <a href="./displayProduct.php">See products</a>
</body>
</html>
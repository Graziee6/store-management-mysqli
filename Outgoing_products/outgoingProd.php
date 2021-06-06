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
        input{
            width: 50%;
        }
        select{
            padding: 12px;
            width: 55%;
        }
        a{
            text-decoration: none;
            color: #rgb(0, 53, 83);
            width: 100%;
            font-weight: 500;
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
    </style>
</head>
<?php
$mysqli = new mysqli("localhost", "root", "Borntopraise@10", "stock");
// $Id = $_GET["Id"];
$query = $mysqli->query("SELECT * FROM stk_products");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Outgoing</title>
</head>
<body>
    <header>
        <nav class="header">
            <ul>
                <li><a href="./../home.php">Home</a></li>
                <li><a href="./../Users/user.php">Add User</a></li>
                <li><a href="./../Users/displayUser.php">Display users</a></li>
                <li><a href="./../All_products/prodCreate.php">Add product</a></li>
                <li><a href="./../All_products/displayProduct.php">Display products</a></li>
                <li><a href="./../Incoming_products/inventory.php">Register inventory</a></li>
                <li><a href="./../Incoming_products/displayInventory.php">Display inventories</a></li>
                <li><a href="./displayOutgoing.php">Display outgoing products</a></li>
            </ul>  
        </nav>
    </header>
    <div class="main">
<h2>Register Outgoing</h2>
<form action="./createOutgoing.php" method="POST">
    <label class="labels" for="name">Product name</label>
    <select name="productName" id="name">
    <?php
    while ($row = $query->fetch_assoc()){?>
    <option value="<?=$row['productId']?>" required><?=$row['product_Name']?></option>
    <?php }?>
    </select>
    <label for="qty" class="labels">Product quantity</label>
    <input type="number" name="quantity" id="qty" min="1" required>
    <input type="submit" value="Confirm quantity">
</form>
<!-- <a href="./../All_products/displayProduct.php">Choose a product</a> -->
</div>
</body>
</html>
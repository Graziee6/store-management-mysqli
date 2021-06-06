<?php
session_start();
if(!$_SESSION['userId']){
    header("Location:../Users/login.php");
 }
$mysqli = new mysqli("localhost", "root", "Borntopraise@10", "stock");
$selectInventory = "SELECT pr.productId, pr.product_Name, pr.brand, pr.supplier, pr.supplier_phone FROM stk_products pr";
$fetchInventory = $mysqli->query($selectInventory);?>
<head>
    <style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
        :root{
            --main-color:rgb(0, 53, 83);
        }
        body{
            background-color: #fff;
        }
        table{
        border-collapse: collapse;
        border: 1px solid rgb(0, 53, 83);
        margin: 0 auto;
        margin-top: 3em;
    }
    thead{
        background-color: rgb(0, 53, 83);
    }
    th{
        background-color: rgb(0, 53, 83);
        padding:20px;
        color: #fff;
    }
    tbody td{
        padding: 16px;
        border: 1px solid rgb(0, 53, 83);
        background-color: #abf1ff;
        color: #000;
    }
    td{
        padding:20px;
        color: #fff;
    }
    table td a{
        color: rgb(0, 53, 83);
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
    a{
     text-decoration: none;
     color: #rgb(0, 53, 83);
     width: 100%;
     font-weight: 500;
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
            <li><a href="./../All_products/allProducts.php">Add product</a></li>
            <li><a href="./../Incoming_products/inventory.php">Register inventory</a></li>
            <li><a href="./../Incoming_products/displayInventory.php">Display inventories</a></li>
            <li><a href="./../Outgoing_products/outgoingProd.php">Create outgoing</a></li>
            <li><a href="./../Outgoing_products/displayOutgoing.php">Display outgoing</a></li>
        </ul>  
    </nav>
</header>
<table border=1 cellspacing=0 cellpadding=20>
    <tr>
        <th>Product name</th>
        <th>Brand</th>
        <th>Supplier</th>
        <th>Telephone</th>
        <th>Update</th>
        <th>Delete</th>
        <th>Add quantity</th>
        <th>Outgoing</th>
    </tr>
    
    <?php
    while($rows = $fetchInventory->fetch_assoc()){
        $id = $rows["productId"];
        ?>
        <tr>
            <td><?=$rows['product_Name']?></td>
            <td><?=$rows['brand']?></td>
            <td><?=$rows['supplier']?></td>
            <td><?=$rows['supplier_phone']?></td>
            <td><a href="./updateProduct.php?Id=<?=$id?>">Edit</a></td>
            <td><a href="./deleteProduct.php?Id=<?=$id?>">Delete</a></td>
            <td><a href="./../Incoming_products/inventory.php?Id=<?=$id?>">Add quantity</a></td>
            <td><a href="./../Outgoing_products/outgoingProd.php?Id=<?=$id?>">Register outgoing</a></td>
        </tr>
    <?php }?>
</table>
</body>
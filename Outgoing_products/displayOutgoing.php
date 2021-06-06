<?php
$mysqli = new mysqli("localhost", "root", "Borntopraise@10", "stock");
// $Id = $_GET["Id"];
$displayOutgoing = $mysqli->query("SELECT pr.product_Name, ou.quantity, ou.added_date FROM stk_products pr, stk_outgoing ou WHERE pr.productId=ou.productId");
// $row = mysqli_fetch_assoc($displayOutgoing);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outgoing products table</title>
    <style>
        table{
            border-collapse: collapse;
            border: 1px solid rgb(0, 53, 83);
            margin: 0 auto;
            margin-top: 3em;
        }
        thead{
            background-color: rgb(0, 53, 83);
            color: #fff;
        }
        th{
            padding:20px;
        }
        tbody td{
            padding: 16px;
            border: 1px solid rgb(0, 53, 83);
            background-color: #abf1ff;
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
                <li><a href="./../All_products/displayProduct.php">Display products</a></li>
                <li><a href="./../Incoming_products/inventory.php">Register inventory</a></li>
                <li><a href="./../Incoming_products/displayInventory.php">Display inventories</a></li>
                <li><a href="./../Outgoing_products/outgoingProd.php">Create outgoing</a></li>
            </ul>  
        </nav>
    </header>
<table>
    <thead>
    <tr>
        <th>Outgoing prod</th>
        <th>Quantity</th>
        <th>Date</th>
    </tr>
    </thead>

    <tbody>
    <?php while($row=$displayOutgoing->fetch_assoc()){?>
        <tr>
            <td><?=$row["product_Name"]?></td>
            <td><?=$row["quantity"]?></td>
            <td><?=$row["added_date"]?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>    
</body>
</html>

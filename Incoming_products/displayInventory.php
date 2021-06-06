<?php
session_start();
if(!$_SESSION['userId']){
    header("Location:../Users/login.php");
 }
    $mysqli = new mysqli("localhost", "root", "Borntopraise@10", "stock");
    $selectProduct = "SELECT pr.productId, pr.product_Name, inv.quantity FROM stk_products pr, stk_inventory inv WHERE pr.productId=inv.productId";
    $fetchProduct = $mysqli->query($selectProduct);?>
    <head>
        <style>
             :root{
                --main-color:rgb(0, 53, 83);
            }
            body{
                background-color: #fff;
                overflow-x: hidden;
            }
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
            background-color: rgb(0, 53, 83);
            padding:20px;
            border: none;
            color: #fff;
        }
        tbody td{
            padding: 16px;
            border: 1px solid rgb(0, 53, 83);
            background-color: #abf1ff;
        }
            a{
                text-decoration: none;
                color: var(--main-color);
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
        </style>
    </head>
<body>

    <header>
        <nav class="header">
            <ul>
                <li><a href="./../Users/user.php">Add User</a></li>
                <li><a href="./../Users/displayUser.php">Display users</a></li>
                <li><a href="./../All_products/allProducts.php">Add product</a></li>
                <li><a href="./../All_products/displayProduct.php">Display products</a></li>
                <li><a href="./../Incoming_products/inventory.php">Register inventory</a></li>
                <li><a href="./../Outgoing_products/outgoingProd.php">Create outgoing</a></li>
                <li><a href="./../Outgoing_products/displayOutgoing.php">Display Outgoing</a></li>
            </ul>  
        </nav>
    </header>

    <table border=1 cellspacing=0 cellpadding=20>
        <tr>
            <th>Product name</th>
            <th>Quantity</th>
            <th>Update</th>
            <th>Delete</th>
            <th>Add quantity</th>
        </tr>
        
        <?php
        while($rows = $fetchProduct->fetch_assoc()){
            $id = $rows["productId"];
            ?>
            <tr>
                <td><?=$rows['product_Name']?></td>
                <td><?=$rows['quantity']?></td>
                <td><a href="./../All_products/updateProduct.php?Id=<?=$id?>">Edit</a></td>
                <td><a href="./deleteInventory.php?Id=<?=$id?>">Delete</a></td>
                <td><a href="./inventory.php?Id=<?=$id?>">Add quantity</a></td>
            </tr>
        <?php }?>
    </table>
    </body>
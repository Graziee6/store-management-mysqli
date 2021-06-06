<?php
session_start();
if(!$_SESSION['userId']){
    header("Location:../Users/login.php");
 }
$mysqli = new mysqli("localhost", "root", "Borntopraise@10", "stock");
$id=$_GET['Id'];
$deleteInventory = $mysqli->query("DELETE FROM stk_inventory WHERE productId='$id'");
if(!$deleteInventory){
    echo "Couldn't delete";
}
else{
    echo "Data successfully deleted";?>
    <style>
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
<?php }
?>
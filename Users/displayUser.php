<?php
session_start();
if(!$_SESSION['userId']){
    header("Location:login.php");
 }
 $mysqli = new mysqli("localhost", "root", "Borntopraise@10", "stock");
$displayUser = "SELECT u.userId, u.firstName, u.lastName, u.telephone, u.gender, u.username, u.email, ctr.countryName as nationality FROM stk_users u, countries ctr WHERE u.nationality = ctr.countryId";
$execute = $mysqli->query($displayUser);?>
<head>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        :root{
            --main-color: rgb(0, 53, 83);
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
        td{
           text-align:center;
           padding: 20px;
        }
        a{
            text-decoration: none;
            color: var(--main-color);
        }
        /* a[href="./user.php"]:not(ul li a[href="./user.php"]){
            padding: 5px;
            font-size: 1.2em;
            font-weight: 500;
            color: var(--main-color);
            border-color: #fff;
            border-radius: 5px;
        } */
    </style>
</head>
<body>
<header>
        <nav class="header">
            <ul>
                <li><a href="./../home.php">Home</a></li>
                <li><a href="./user.php">Add User</a></li>
                <li><a href="./../All_products/allProducts.php">Add product</a></li>
                <li><a href="./../All_products/displayProduct.php">Display products</a></li>
                <li><a href="./../Incoming_products/inventory.php">Register inventory</a></li>
                <li><a href="./../Incoming_products/displayInventory.php">Display inventories</a></li>
                <li><a href="./../Outgoing_products/outgoingProd.php">Create outgoing</a></li>
                <li><a href="./../Outgoing_products/displayOutgoing.php">Display outgoing products</a></li>
            </ul>  
        </nav>
    </header>
<div class="table">
        <table border=1 cellspacing=0 cellpadding=20>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Telephone</th>
                <th>Gender</th>
                <th>Nationality</th>
                <th>Username</th>
                <th>Email</th>
                <th>Update user</th>
                <th>Delete user</th>
            </tr> 
<?php 
  while ($rows = $execute->fetch_assoc()){
      $id = $rows["userId"];
      ?>
    <tr>
        <td><?=$rows['firstName']?></td>
        <td><?=$rows['lastName']?></td>
        <td><?=$rows['telephone']?></td>
        <td><?=$rows['gender']?></td>
        <td><?=$rows['nationality']?></td>
        <td><?=$rows['username']?></td>
        <td><?=$rows['email']?></td>
        <td><a href="./updateUser.php?Id=<?=$id?>">Edit</a></td>
        <td><a href="./deleteUser.php?Id=<?=$id?>">Delete</a></td>
    </tr>
<?php }?>
        </table>
</div>
</body>
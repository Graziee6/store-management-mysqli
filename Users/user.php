<?php
session_start();
if(!$_SESSION['userId']){
    header("Location:login.php");
 }
elseif ($_SESSION['roleName']!="Administrator") {
    header("Location:norights.php");
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
            overflow-x: hidden;
            /* overflow-y: hidden; */
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
        h2{
            text-align: center;
        }
        input:not(input[type="submit"], input[type="radio"]), select{
            padding: 10px;
            width: 25em;
        }
        input[type="submit"]{
            height: 2.5em;
            width: 10em;
            padding: 5px;
            background-color: rgb(0, 53, 83);
            font-weight: 500;
            color: #000;
            border-color: #fff;
            border-radius: 5px;
            font-size: medium;
            cursor: pointer;
        }
        /* input, label{
            display: block;
        } */
        .labels{
            width: 33.33%;
        }
        /* .fields{
            width: 60%;
        } */
      input[type="email"], input[name="gender"]{
          margin-left: 3em;
      }
      input[type="password"], input[name="telephone"]{
          margin-left: .4em;
      }
     select[id="role"]{
        margin-left: 3.5em;
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
       fieldset{
           margin-bottom: 10px;
           padding: 20px;
           border-radius:10px;
       }
       legend{
           font-weight: 500;
           font-family: 'Poppins';
           background-color: grey;
           color: white;
           padding: 5px 8px;
           border-radius: 5px;
           font-size: 1em;
       }
    </style>
</head>
<?php
$mysqli = new mysqli("localhost", "root", "Borntopraise@10", "stock");
$countries = "SELECT * FROM countries";
$execute = $mysqli->query($countries);
$roleExecute=$mysqli->query("SELECT * FROM roles");
?>
<body>
<header>
        <nav class="header">
            <ul>
                <li><a href="./../home.php">Home</a></li>
                <li><a href="./displayUser.php">Display users</a></li>
                <li><a href="./../All_products/allProducts.php">Add product</a></li>
                <li><a href="./../All_products/displayProduct.php">Display products</a></li>
                <li><a href="./../Incoming_products/inventory.php">Register inventory</a></li>
                <li><a href="./../Incoming_products/displayInventory.php">Display inventories</a></li>
                <li><a href="./displayOutgoing.php">Display outgoing products</a></li>
                <li><a href="./../Outgoing_products/outgoingProd.php">Create outgoing</a></li>
            </ul>  
        </nav>
    </header>
    <div class="main">
        <form action="userCreate.php" method="POST" enctype="multipart/form-data">
            <h2>Add User</h2>
            <fieldset> <legend>Personal Info</legend>
            <label for="fname" class="labels fname">First Name</label>
            <input type="text" name="firstName" class="fname fields" id="fname" placeholder="Enter your first name" min="2" max="100"><br>
            <label for="lname" class="labels lname">Last Name</label>
            <input type="text" name="lastName" class="lname fields" id="lname" placeholder="Enter your last name" min="2" max="100"><br>
            <label for="phone" class="labels phone">Telephone</label>
            <input type="number" name="telephone" class="phone fields" id="phone" placeholder="Enter your phone number"><br>
            <label for="gender" class="labels gender fields">Gender</label>
            <input type="radio" class="special gender fields"  value="male" name="gender" id="male" checked>
            <label for="male">Male</label>
            <input type="radio" class="special gender fields" value="female" name="gender" id="female">
            <label for="female">Female</label><br>
            <label for="role" class="roles">Role</label>
            <select name="role" id="role" class="fields">
            <option value="0">What's your role</option>
                <?php
                    while($row=mysqli_fetch_array($roleExecute)){?>
                        <option value="<?=$row['roleId']?>"><?=$row["role"]?></option>
                    <?php }
                    if(!$row){
                        echo mysqli_error();
                    }
                ?>
            </select>
            <label for="nation" class="labels">Nationality</label>
            <select name="nationality" id="nation" class="fields">
                <option value="0">Select your nationality</option>
            <?php
                while($rows = mysqli_fetch_array($execute)){?>
                <option value="<?=$rows['countryID']?>"><?=$rows['countryName']?></option>
                <?php } ?>
            </select><br>
            </fieldset>
            <fieldset><legend>Account Details</legend>
            <label for="username" class="labels">Username</label>
            <input type="text" name="username" class="fields" id="username" placeholder="Enter your username"><br>
            <label for="mail" class="labels">Email</label>
            <input type="email" name="email" class="fields" id="mail" placeholder="Enter a valid email"><br>
            <label for="passwd" class="labels">Password</label>
            <input type="password" name="password" class="fields" pattern=".{6,}" id="passwd" placeholder="Enter your password"><br>
            <label for="cpasswd" class="labels">Confirm Password</label>
            <input type="password" name="cpassword" class="fields" pattern=".{6,}" id="cpasswd" placeholder="Enter your password"><br>
            </fieldset>
            <input type="submit" value="Register">
            <input type="reset" value="Reset">
        </form>
    </div>
</body>
</html>
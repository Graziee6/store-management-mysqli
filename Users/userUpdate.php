<?php
$user_Id=$_POST['user_Id'];
$firstName=$_POST["fistName"];
$lastName=$_POST["lastName"];
$gender=$_POST["gender"];
$telephone=$_POST["phone"];
$nationality=$_POST["nationality"];
$email=$_POST["email"];
$upassword=$_POST["password"];
$cpassword=$_POST["passwordConfirm"];
$mysqli = new mysqli("localhost", "root", "Borntopraise@10", "stock");
if($mysqli->connect_error){
  echo "Error in connection".$mysqli->connect_error;
}
else if(!$mysqli->connect_error){
  if($upassword==$cpassword){
    $sql="UPDATE  stk_users SET firstName='$firstName',lastName= '$lastName',gender='$gender',nationality='$nationality',telephone='$telephone',email='$email' WHERE userId='$user_Id'";
    $execute = $mysqli->query("SELECT u.userId, u.firstName, u.lastName, u.telephone, u.gender, u.username, u.email, ctr.countryName as nationality FROM stk_users u, countries ctr WHERE u.nationality = ctr.countryId");
    $update= $mysqli->query($sql);
    if($update){
      echo "<h1> Data Updated successfully</h1>";
      ?>
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
    <?php }else{
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
  }
  else{
    echo "Passwords do not match. <a href=displayUser.php>Go back to users list</a>";
  }
}
?>
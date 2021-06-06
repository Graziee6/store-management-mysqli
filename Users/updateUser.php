<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update user</title>
</head>
<style>
        * {
            font-family: "poppins";
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        body {
            background-color: #36a0f5;
            width: 100%;
        }

        html,
        body {
            max-width: 100%;
            overflow-x: hidden;
        }

        h2 {
            text-align: center;
            color: #36a0f5;
        }

        label {
            color: gray;
            width: 20%;
            display: inline-block;
        }

        form {
            background-color: #ffffff;
            width: 45%;
            border-radius: 5px;
            margin: auto;
            padding: 20px 60px;
        }

        input[type=text],
        input[type=number],
        input[type="password"],
        select {
            width: 75%;
            height: 40px;
            border-radius: 4px;
            outline: none;
            padding-left: 10px;
            border: 0.5px solid grey;
            display: inline !important;
        }

        div {
            margin: 10px 0;
            vertical-align: middle;
        }

        .check {
            position: relative;
            left: 30%;
            top: -30px;
        }

        .check>label {
            color: gray;
            font-weight: 500;
        }

        input[type=submit] {
            margin-left: 40%;
            width: 20%;
            border-radius: 5px;
            border: none;
            background-color: #36a0f5;
            padding: 7px;
            color: white;
        }

        textarea#message {
            width: 70%;
        }

        @media only screen and (max-width:600px) {

            input[type=text],
            input[type=number],
            input[type="password"],
            select {
                display: block;
                width: 100%;
                height: 40px;
            }

            select>option {
                width: 40% !important;
            }

            #message {
                display: block;
                outline: none;
            }

            form {
                width: 99%;
                overflow-x: hidden !important;
                padding: 15px;
            }

            .label-class1 {
                display: none
            }

            #message {
                width: 100% !important;
            }

            #file {
                display: inline-block !important;
            }

            #language-label {
                width: 100%;
            }

            .checkbox-label {
                margin-left: 0px !important;
            }

            input [type="checkbox"] {
                display: block;
                margin-left: 0 !important;
            }

            .check {
                left: 0;
                top: 0px;
            }
        }

        @media only screen and (min-width:600px) and (max-width: 768px) {
            form {
                width: 80%;
                overflow-x: hidden !important;
            }
        }

        @media only screen and (min-width:769px) and (max-width: 1200px) {
            form {
                width: 45%;
                overflow-x: hidden !important;
                padding: 20px 60px;
            }

            input[type=text],
            input[type=number],
            input[type="password"],
            select {
                display: block;
                width: 100%;
                height: 40px;
            }
        }
    </style>
<body>
    <div class="container">
    <?php
    $mysqli = new mysqli("localhost", "root", "Borntopraise@10", "stock");
    $user_id=$_GET["Id"];
    $sql="select * from stk_users where userId=$user_id;";
    $query=$mysqli->query($sql);
    while($row = $query->fetch_assoc()){?>
    <form action="userUpdate.php" method="POST" class="form">
            <h2>Update account</h2>
            <div>
               <input type= "hidden" name= "user_Id" value ="<?php echo $row['userId']?>">
                <label class="label-class1" for="fname">First Name</label>
                <input type="text" name="fistName" id="fname" value= "<?php echo $row['firstName']?>" placeholder="Enter your first name" />
            </div>
            <div>
                <label class="label-class1" for="lname">Last Name</label>
                <input type="text" name="lastName" id="lname"  value= "<?php echo $row['lastName']?>" placeholder="Enter your Last name" />
            </div>
            <div class="form-check">
                <label for="gender">Gender</label>
                <?php if($row['gender']==="Male"){?>
                <input type="radio" class="form-check-input" name="gender" value="Male" id="male" checked>
                <label class="form-check-label">Male</label>
                <input type="radio" class="form-check-input" value="Female" name="gender" id="female">
                <label class="form-check-label"> Female</label>
                <?php } else{?>
                <input type="radio" class="form-check-input" name="gender" value="Male" id="male" checked>
                <label class="form-check-label">Male</label>
                <input type="radio" class="form-check-input" value="Female" name="gender" id="female" checked>
                <label class="form-check-label"> Female</label>
                <?php } ?>
            </div>
            <div>
                <label class="label-class1" for="email">Email</label>
                <input type="text" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  value= "<?php echo $row['email']?>" placeholder="Enter your email@gmail.com" readonly/>
            </div>
            <div>
                <label class="label-class1" for="phone">Telephone</label>
                <input type="number" name="phone" id="phone" pattern="^\d{10}$"  value= "<?php echo $row['telephone']?>" placeholder="Enter your phone number" />
            </div>
            <div>
                <label class="label-class1" for="nationality" id="nation">Nationality</label>
                <select name="nationality" id="nationality"  value="<?php echo $row['nationality']?>">
                    <option value="">Select Nationality...</option>
                  <?php
                  $countriesQuery=mysqli_query($connection,"select * from countries");
                  if($countriesQuery){
                    while ($row=mysqli_fetch_assoc($countriesQuery)) {?>
                       <option value="<?php echo $row["countryID"] ?>"><?=$row["countryName"]?></option>
                    <?php } }?>
                </select>
            </div>
            <!-- <div>
                <label class="label-class1" for="username">Username</label>
                <input type="text" name="username" id="username"  value="<?php echo $row['username']?>" placeholder="Enter username" readonly/>
            </div> -->
            <div>
                <label class="label-class1" for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter password" />
            </div>
            <div>
                <label class="label-class1" for="passwordConfirm">Confirm password</label>
                <input type="password" name="passwordConfirm" id="passwordConfirm" placeholder="Re-enter password" />
            </div>
            <input type="submit" value="update user">
    </div>
    </form>
    </div>
    <?php } ?>
</body>
</html>
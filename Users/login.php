<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            background-color: rgb(0, 53, 83);
        }
        form{
            width: 40%;
            border-radius: 5px;
            padding: 10px;
            background: #fff;
            margin:0 auto;
            margin-top: 10px;
        }
        h2{
            text-align: center;
            padding: 10px;
        }
        .labels{
            width: 40%;
            padding: 10px;
            margin: 10px;
        }
        .fields{
            width: 60%;
            padding: 10px;
            margin: 10px;
        }
        input[type="email"]{
            margin-left: 2.8em;
        }
        input[type="submit"]{
            height: 2.5em;
            width: 10em;
            margin: 10px;
            padding: 5px;
            background-color: rgb(0, 53, 83);
            font-weight: 500;
            color: #000;
            border-color: #fff;
            border-radius: 5px;
            font-size: medium;
            
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form action="authenticate.php" method="POST">
    <h2>Login</h2>
        <label for="username" class="labels">Username</label>
        <input type="text" name="username" class="fields" id="username" placeholder="Enter your username"><br>
        <label for="passwd" class="labels">Password</label>
        <input type="password" name="password" class="fields" id="passwd" placeholder="Enter your password"><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
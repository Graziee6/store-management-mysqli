<?php
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$telephone = $_POST["telephone"];
$gender = $_POST["gender"];
$role=$_POST["role"];
$nationality = $_POST["nationality"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$cpass=$_POST['cpassword'];

if($password!==$cpass){
    echo "Passwords do not match";
}
else{
    $hash = hash("SHA512", $cpass);
    $mysqli=new mysqli("localhost", "root", "Borntopraise@10", "stock");
    if($mysqli->connect_error){
      die("Connection failed". $mysqli->connect_error);
    }
      $sqlInsert = "INSERT INTO stk_users(firstName, lastName, telephone, gender, roleId, nationality, username, email, passwd) VALUES('$firstName','$lastName', '$telephone', '$gender', '$role', '$nationality', '$username', '$email', '$hash')" ;
      $insertion = $mysqli->query($sqlInsert);
      if($insertion==TRUE){
        echo "User registered successfully";
        include("./displayUser.php");
      }
      else{
        echo "Error".$sqlInsert. "<br>".$mysqli->error;
      }
}
?>
<?php 
session_start();
// if(!$_SESSION['userId']){
//     header("Location:login.php");
//  }
$mysqli=new mysqli("localhost", "root", "Borntopraise@10", "stock");
$username = trim($_POST['username']);
$user_password = trim($_POST['password']);
if( ($username =="") || ($user_password =="") ){
echo  "Username and Password are required";
}else{
$hash=hash("SHA512",$user_password);
$userId=$currentPassword=$roleName=$roleId="";
$query = $mysqli->query("SELECT * FROM stk_users where username='$username'");
while($row=$query -> fetch_assoc()){
    $currentPassword=$row["passwd"];
    $userId=$row["userId"];
    $roleId=$row["roleId"];   
}
$roleQuery=$mysqli->query("SELECT role FROM roles where roleId='$roleId'");
while($rolesResult=$roleQuery->fetch_assoc()){
    $roleName=$rolesResult["role"];
}
if($query->num_rows == 0){
    echo "</br>"."Invalid username or password";
}
if($hash!=$currentPassword){
   echo "</br>"."Invalid username or password";
}
else{
    $_SESSION['userId']=$userId;
    $_SESSION['roleName']=$roleName;
    $_SESSION["roleId"]=$roleId;
    header("Location:./../home.php");
}
}
?>
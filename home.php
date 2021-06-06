<?php
session_start();
if(!$_SESSION['userId']){
    header("Location:./Users/login.php");
 }
$ipAddr=$_SERVER['REMOTE_ADDR'];
$_SESSION['ipAddr']=$ipAddr;
$MAC = exec('getmac');
$MAC = strtok($MAC, ' ');
$_SESSION['MAC']=$MAC;
$browser = get_browser();
$user_agent = $_SERVER['HTTP_USER_AGENT'];
function getOS() { 
    global $user_agent;

    $os_platform  = "Unknown OS Platform";

    $os_array     = array(
                          '/windows nt 10/i'      =>  'Windows 10',
                          '/windows nt 6.3/i'     =>  'Windows 8.1',
                          '/windows nt 6.2/i'     =>  'Windows 8',
                          '/windows nt 6.1/i'     =>  'Windows 7',
                          '/windows nt 6.0/i'     =>  'Windows Vista',
                          '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                          '/windows nt 5.1/i'     =>  'Windows XP',
                          '/windows xp/i'         =>  'Windows XP',
                          '/windows nt 5.0/i'     =>  'Windows 2000',
                          '/windows me/i'         =>  'Windows ME',
                          '/win98/i'              =>  'Windows 98',
                          '/win95/i'              =>  'Windows 95',
                          '/win16/i'              =>  'Windows 3.11',
                          '/macintosh|mac os x/i' =>  'Mac OS X',
                          '/mac_powerpc/i'        =>  'Mac OS 9',
                          '/linux/i'              =>  'Linux',
                          '/ubuntu/i'             =>  'Ubuntu',
                          '/iphone/i'             =>  'iPhone',
                          '/ipod/i'               =>  'iPod',
                          '/ipad/i'               =>  'iPad',
                          '/android/i'            =>  'Android',
                          '/blackberry/i'         =>  'BlackBerry',
                          '/webos/i'              =>  'Mobile'
                    );

    foreach ($os_array as $regex => $value)
        if (preg_match($regex, $user_agent))
            $os_platform = $value;

    return $os_platform;
}

function getBrowser() {

    global $user_agent;

    $browser        = "Unknown Browser";

    $browser_array = array(
                            '/msie/i'      => 'Internet Explorer',
                            '/firefox/i'   => 'Firefox',
                            '/safari/i'    => 'Safari',
                            '/chrome/i'    => 'Chrome',
                            '/edge/i'      => 'Edge',
                            '/opera/i'     => 'Opera',
                            '/netscape/i'  => 'Netscape',
                            '/maxthon/i'   => 'Maxthon',
                            '/konqueror/i' => 'Konqueror',
                            '/mobile/i'    => 'Handheld Browser'
                     );

    foreach ($browser_array as $regex => $value)
        if (preg_match($regex, $user_agent))
            $browser = $value;

    return $browser;
}
$user_os        = getOS();
$user_browser   = getBrowser();
$mysqli = new mysqli("localhost", "root", "Borntopraise@10", "stock");
$userId=$_SESSION['userId'];
$sqlInsert = "INSERT INTO userdeviceinfo(userId, macAddress, ipAddress , os ,browser) VALUES('$userId','$MAC','$ipAddr','$user_os', '$user_browser')";
$execute = $mysqli->query($sqlInsert);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        :root{
            --main-color: rgb(0, 53, 83);
            --secondary-color: #000;
            --alternative: #fff;
        }
          
          *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            background-color: var(--main-color);
            font-family: sans-serif;
        }

        .main{
            background-color: #fff;
            border-radius: 10px;
            width: 100%;
            max-width: 40%;
            margin: 4.5em auto;
            font-family: sans-serif;
            font-size: 1.2em;
            height: 60vh;
            padding:auto;
        }
        .main *:not(h2){
            height: 40px;
            margin-bottom: 1em;
        }
        h2{
            /* text-align: center; */
            padding-top:1em;
            color: var(--secondary-color);
            padding-left: 24px;
        }
        p{
            line-height: 1.5em;
            padding-left: 24px;
        }
        .labels{
            width: 40%;
        }

        .users,.inventories,.products,.sales{
            display:block;
        }

        .new{
            width: 30%;
            float: left;
        }

        .view{
            width:30%;
            float:right;
            margin-right: 36px;
        }
        a{
            color: var(--alternative);
            width:3em;
            height:40px;
            background-color: var(--main-color);
            text-decoration: none;
            margin: 0 0 0 2em;
            border: 1px #ffffff;
            border-radius: 5px;
            padding:0 9px;
            line-height: 40px;
            text-align:center;

        }
        
    </style>
</head>
<body>
    <div class="main">
    <h2>Stock Management System</h2>
    <p>Manage a small stock with a smart app</p>
   <div class="users">
    <a href="./Users/user.php" class="new">Add new user</a>
    <a href="./Users/displayUser.php" class="view">See all users</a>
   </div>
   <div class="products">
        <a href="./All_products/allProducts.php" class="new">Add product</a>
        <a href="./All_products/displayProduct.php" class="view">See products</a>
   </div>
    <div class="inventories">
        <a href="./Incoming_products/inventory.php" class="new">Add inventory</a>
        <a href="./Incoming_products/displayInventory.php" class="view">See inventories</a>
    </div>
    <div class="sales">
        <a href="./Outgoing_products/outgoingProd.php" class="new">Add sale</a>
        <a href="./Outgoing_products/displayOutgoing.php" class="view">See sales</a>
    </div>
    <div class="new">
        <a href="./Users/logout.php">Log out</a>
    </div>
</div>
</body>
</html>
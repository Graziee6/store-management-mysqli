<?php
    session_start();//start session
    session_unset();//destroy session variables
    session_destroy();//destroy the session itself
    header('Location:login.php');//where to head to after logging out
?>
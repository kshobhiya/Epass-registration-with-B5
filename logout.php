<?php
    session_start();
    unset($_SESSION["sessionId"]);
    unset($_SESSION["sessionemail"]);
    header("Location: login.php");
?>
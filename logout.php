<?php
    session_start();
    unset($_SESSION["sessionId"]);
    header("Location: login.php");
?>
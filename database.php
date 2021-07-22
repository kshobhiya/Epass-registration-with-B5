<?php
    $db_hostname="localhost";
    $db_servername="root";
    $db_password="";
    $db_database="form epass";
    //connecting to database
    $conn = mysqli_connect($db_hostname,$db_servername,$db_password,$db_database);
    if(!$conn){
 		die("unable to connect");
    }
?>
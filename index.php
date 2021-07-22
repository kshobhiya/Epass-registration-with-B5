<!doctype html>
<html lang="en">
<head>
<title></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
</head>
<body>
<h2 class="text-center">EPASS REGISTRATION</h2>
<?php
    session_start();
    require_once 'database.php';
    if(isset($_SESSION["sessionId"])){
        echo "<h3>welcome</h3>".$_SESSION["sessionfirstname"]." ".$_SESSION["sessionlastname"];
        ?><br><br>
        <a href="epassregistration.php">Epass Form Registration</a><br><br>
        <a href="logout.php"><button type="submit" name="logout" value="logout">Logout</button></a><br><br>
        <?php
        if(isset($_GET["error"])){
            echo $_GET["error"];
        }
        ?>
        <table id="epassformindex">
        <thead>
        <tr>
            <th>Form id</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email id</th>
            <th>Phone number</th>
            <th>Reason</th>
            <th>From Place</th>
            <th>Destination place</th>
            <th>Date</th>
            <th>Vehicle number</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        </thead>
        </table>   
<?php 
    }else{
        echo "<h3>Home page</h3>";?>
        <nav>
        <ul>
            <li><a href="login.php">LOG IN</a></li>
            <li><a href="register.php">REGISTER</a></li>
        </ul>
        </nav>
<?php  
    } ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js" charset="utf8" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#epassformindex').dataTable({
        "serverside":true,
        "processing":true,
        "paging": true,
        "order":[],
        "ajax":{
             "url":"fetchdata.php",
             "type":"POST"
        }
    });
});
</script>
</body>
</html>
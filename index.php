<!doctype html>
<html lang="en">
<head>
<title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
</head>
<body>
    <script src="bootstrap-5.0.2-dist/js/bootstrap.js"></script>
<h3 class="text-center" style="color: blue;padding-top: 20px ">EPASS REGISTRATION</h3>
<?php
    session_start();
    require_once 'database.php';
    if(isset($_SESSION["sessionId"])){
        echo "<h3 class='fw-bolder'>welcome</h3>".$_SESSION["sessionfirstname"]." ".$_SESSION["sessionlastname"];
        ?><br><br>
        <a class="link-primary" href="epassregistration.php"><b>Epass Registration Form</b></a><br><br>
        <a href="logout.php"><button class="btn btn-danger" type="submit" name="logout" value="logout">Logout</button></a><br><br>
        <?php
        if(isset($_GET["error"])){
            echo $_GET["error"];
        }
        ?>
        <div class="table-responsive-lg">
            <table class="table table-striped" id="epassformindex">
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
        </div>   
<?php 
    }else{
        echo "<h4 class='fw-bolder' style='padding-left:50px'>Home page</h4>";?>
        <nav class="nav flex-column">
            <ul class="nav-item">
                <li class="nav-link"><a href="login.php">LOG IN</a></li>
                <li class="nav-link"><a href="register.php">REGISTER</a></li>
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


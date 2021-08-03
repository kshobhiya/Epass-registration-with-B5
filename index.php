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
        echo "<h3 class='fw-bolder'>welcome</h3>".$_SESSION["sessionFirstName"]." ".$_SESSION["sessionLastName"];
        ?><br><br>
        <a class="link-primary" href="epassregistration.php" style="padding-left: 10px"><b>Epass Registration Form</b></a><br><br>
        <a href="logout.php" style="padding-left: 10px"><button class="btn btn-danger" type="submit" name="logout" value="logout">Logout</button></a><br><br>
        <a class="link-primary" href="report.php" style="padding-left: 10px"><b>Report</b></a><br>
        <?php
        if(isset($_GET["error"])){
            echo $_GET["error"];
        }
        ?>
        <div class="table-responsive-lg"  style="padding-top: 30px">
            <table class="table table-striped" id="epassformindex">
                <thead>
                <tr>
                    <th>Id</th>
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
        echo "<h3 class='fw-bolder' style='padding-left:50px'>Home page</h3>";?>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="padding-left: 30px;padding-right:30px">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="image/roadtravel.jpg" class="d-block w-100" style="height: 450px" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="image/roadvechile.jpg" class="d-block w-100" style="height: 450px" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="image/bike.jpg" class="d-block w-100" style="height: 450px" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
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


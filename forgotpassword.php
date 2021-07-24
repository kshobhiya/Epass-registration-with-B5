<!DOCTYPE html>
<html>
<head>
<title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <style>
        .error{
            color: blue;
            font-style: italic;
        }
    </style>
</head>
<body>
    <script src="bootstrap-5.0.2-dist/js/bootstrap.js"></script>
<nav>
    <ul class="list-inline" style="float:right">
        <li class="list-inline-item"><a class="btn btn-link" href="index.php">HOME</a></li>
        <li class="list-inline-item"><a class="btn btn-link" href="login.php">LOG IN</a></li>
        <li class="list-inline-item"><a class="btn btn-link" href="register.php">REGISTER</a></li>
    </ul>
</nav>
<?php 
    session_start();
    require 'database.php';
    if (isset($_POST["submit"])) {
        $email = $_POST["email"];
        if (empty($_POST["email"])) {
            header("Location: forgotpassword.php?error=enter email id");
            exit();
        }
    	$sql =  "SELECT * FROM `customer` 
                 WHERE  `email`='$email'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            echo "customer exists";
            header("Location: recoverypassword.php");
        }else{
            echo "no user exits.Go to registration.";
        }
    }
?>
<div class="container" style="padding: 200px 20px 20px 200px;margin-right: 100px;margin-left: 280px">     
    <h4 style="color:blue;padding-bottom:20px">Forgot password</h4>
    <form id="forgotpassword" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="row">
            <label for="email" class="form-label col-sm-2">Email id:</label>
            <div class="col-sm-4">
                <input class="form-control" type="text" id="email" name="email">
                <?php if(isset($_GET["error"])){echo $_GET["error"];}?><br><br>
            </div>
        </div>
        <button class="btn btn-primary" type="submit" name="submit" value="submit">ENTER</button>
    </form>
</div>
</body>
<script type="text/javascript">
$(" #forgotpassword ").validate({
    rules: {
        email: {
            required: true
        }
    },
    messages: {
        email: {
            required: "enter email id"
        }
    }
});
</script>
</html>
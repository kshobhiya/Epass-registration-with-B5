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
        <ul class="list-inline" style="float: right">
            <li class="list-inline-item"><a class="btn btn-link" href="index.php">HOME</a></li>
            <li class="list-inline-item"><a class="btn btn-link" href="login.php">LOG IN</a></li>
            <li class="list-inline-item"><a class="btn btn-link" href="register.php">REGISTER</a></li>
        </ul>
    </nav>
<?php
    require "database.php";
    $email= $password = $confirm_password ="";
    if (isset($_POST["submit"])) { 
        $email = $_POST["email"];
        $password=$_POST["password"];
        $confirm_password=$_POST["confirm_password"];  
        if (empty($_POST["email"])) {
            $email_err="email id is required";
        }elseif(empty($_POST["password"])){
            $password_err="password is required";
        }elseif(strlen($password) < 10){
            $password_err="password should contain atleast '10 characters,in that 1 capital letter,1small letter,1number and 1 special character'";
        }elseif(!preg_match("/[A-Z]+/",$password)){
            $password_err="password should contain atleast '10 characters,in that 1 capital letter,1small letter,1number and 1 special character'";
        }elseif(!preg_match("/[a-z]+/",$password)){
            $password_err="password should contain atleast '10 characters,in that 1 capital letter,1small letter,1number and 1 special character'";
        }elseif(!preg_match("/[0-9]+/",$password)){
            $password_err="password should contain atleast '10 characters,in that 1 capital letter,1small letter,1number and 1 special character'";
        }elseif(!preg_match("/[\W]+/",$password)){
            $password_err="password should contain atleast '10 characters,in that 1 capital letter,1small letter,1number and 1 special character'";
        }elseif(empty($_POST["confirm_password"])){
            $confirm_password_err="confirm password is required";
        }elseif($password !== $confirm_password){
            echo "password should be same";
        }else{
            $sql = "UPDATE `customer` SET `password`='$password' WHERE `email`='$email'";
            $result = mysqli_query($conn,$sql);
            $sql =  "SELECT * FROM `customer`  WHERE  `email`='$email'";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    session_start();
                    $_SESSION["sessionId"] = $row["id"];
                    $_SESSION["sessionFirstName"] = $row["first_name"];
                    $_SESSION["sessionLastName"] = $row["last_name"];
                    header("Location: index.php?success=youloggedin");
                    exit();    
                }
            }else{
                echo "user does not exit.Go for registration.";
            }
        }
    }
?>
<h4 class="text-center" style="color: blue;padding: 150px 0px 20px 10px">Recovery Password</h4>
<div class="container" style="padding: 20px 20px 20px 200px;margin-right: 100px;margin-left: 280px">
    <form id="recovery" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"   method="POST">
        <div class="row mb-3">
            <label for="email" class="form-label col-sm-2">Email id:</label>
            <div class="col-sm-4">
                <input class="form-control" type="text" id="email" name="email" value="<?php echo $email;?>">
                <span class="error"><?php if(isset($email_err)) {echo $email_err;}?></span>
            </div>
        </div>
        <div class="row mb-3">
            <label for="password" class="form-label col-sm-2">Password:</label>
            <div class="col-sm-4">
                <input class="form-control" type="password" id="password" name="password" value="<?php echo $password;?>">  
                <span class="error"><?php if(isset($password_err)) {echo $password_err;}?></span>
            </div>
        </div>
        <div class="row mb-3">
            <label for="confirm_password" class="form-label col-sm-2">Confirm Password:</label>
            <div class="col-sm-4">
                <input class="form-control" type="password" id="confirm_password" name="confirm_password" value="<?php echo $confirm_password;?>"> 
                <span class="error"><?php if(isset($confirm_password_err)) {echo $confirm_password_err;}?></span>
            </div>
        </div>
        <button class="btn btn-primary" style="margin: 20px 0px 10px 120px" type="submit" name="submit">SUBMIT</button>
    </form>
</div>
</body>
<script type="text/javascript">
$(" #recovery ").validate({
    rules: {
        email: {
            required: true
        },
        password: {
            required: true,
            minlength: 10
        },
        confirm_password: {
            required: true,
            minlength: 10,
            equalTo: "#password"
        }
    },
    messages: {
        email: {
            required: "enter email id"
        },
        password: {
            required: "enter password",
            minlength: "password must have atleast 10 characters"
        },
        confirm_password: {
            required: "enter confirm password",
            minlength: "password must have atleast 10 characters",
            equalTo: "mismatch in the password"
        }
    }
});
</script>
</html>
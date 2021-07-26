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
        <li class="list-inline-item"><a class="btn btn-link" href="register.php">REGISTER</a></li>
    </ul>
</nav>
<?php 
    require 'database.php';
    $email=$password="";
    if (isset($_POST["submit"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        if(empty($_POST["email"])){
            $email_err="email is required";
        }elseif(empty($_POST["password"])){
            $password_err="password is required";
        }else{
            $sql =  "SELECT * FROM `customer` 
                    WHERE  `email`='$email'";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)) {
                    if($password === $row["password"]){
                        session_start();
                        $_SESSION["sessionId"] = $row["id"];
                        $_SESSION["sessionFirstName"] = $row["first_name"];
                        $_SESSION["sessionLastName"] = $row["last_name"];
                        header("Location: index.php?success=youloggedin");
                        exit();
                    }else{
                            echo "wrong password";
                    }
                }
            }else{
                echo "user doesnot exists...please register";
            }
        }
    }
?>
<h4 class="text-center" style="padding-top: 100px;color: blue">LOG IN</h4>
<p class="text-center" style="padding-top: 10px">No account?<a class="btn btn-link" href="register.php">REGISTER HERE!</a></p>
<div class="container" style="padding: 10px 20px 20px 220px; margin-right: 100px;margin-left: 280px">
    <form id="loginform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post">
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
        <button class="btn btn-primary" style="margin-bottom: 30px" type="submit" name="submit" value="submit">LOGIN</button>
        <p>forgot password?<a class="btn btn-link" href="forgotpassword.php">click here!</a></p>
    </form>
</div>
</body>
<script type="text/javascript">
$(" #loginform ").validate({
    rules: {
        email: {
            required: true
        },
        password: {
            required: true
        }
    },
    messages: {
        email: {
            required: "enter email id"
        },
        password: {
            required: "enter password"
        }
    }
});
</script>
</html>
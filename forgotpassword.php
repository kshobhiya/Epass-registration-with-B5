<!DOCTYPE html>
<html>
<head>
<title></title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
</head>
<body>
<nav>
    <ul>
        <li><a href="index.php">HOME</a></li>
        <li><a href="login.php">LOG IN</a></li>
        <li><a href="register.php">REGISTER</a></li>
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
<h1>Forgot password</h1>
<form id="forgotpassword" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<label for="email">Email id:</label>
<input type="text" id="email" name="email" placeholder="enter email id">
<?php if(isset($_GET["error"])){echo $_GET["error"];}?><br><br>
<button type="submit" name="submit" value="submit">ENTER</button>
</form>
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
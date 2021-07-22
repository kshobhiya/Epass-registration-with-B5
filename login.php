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
        <li><a href="register.php">REGISTER</a></li>
    </ul>
</nav>
<?php 
    require 'database.php';
    $email=$password="";
    if (isset($_POST["submit"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        if(empty($_POST["email"])){
            $emailErr="email is required";
        }elseif(empty($_POST["password"])){
            $passErr="password is required";
        }else{
            $sql =  "SELECT * FROM `customer` 
                    WHERE  `email`='$email'";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)) {
                    if($password === $row["password"]){
                        session_start();
                        $_SESSION["sessionId"] = $row["id"];
                        $_SESSION["sessionfirstname"] = $row["firstname"];
                        $_SESSION["sessionlastname"] = $row["lastname"];
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
<h1>LOG IN</h1>
<p>No account?<a href="register.php">REGISTER HERE!</a></p>
<form id="loginform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post">
<label for="email">Email id:</label>
<input type="text" id="email" name="email" placeholder="enter email id" value="<?php echo $email;?>">
<span class="error"><?php if(isset($emailErr)) {echo $emailErr;}?></span>
<br><br>
<label for="password">Password:</label>
<input type="password" id="password" name="password" placeholder="enter password" value="<?php echo $password;?>">
<span class="error"><?php if(isset($passErr)) {echo $passErr;}?></span>
<br><br>
<button type="submit" name="submit" value="submit">LOGIN</button>
<p>forgot password?<a href="forgotpassword.php">click here!</a></p>
</form>
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
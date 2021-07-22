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
    require "database.php";
    $email= $rpass = $crpass ="";
    if (isset($_POST["submit"])) { 
        $email = $_POST["email"];
        $rpass=$_POST["password"];
        $crpass=$_POST["cpassword"];  
        if (empty($_POST["email"])) {
            $emailErr="email id is required";
        }elseif(empty($_POST["password"])){
            $rpassErr="password is required";
        }elseif(strlen($rpass) < 10){
            $rpassErr="password should contain atleast '10 characters,in that 1 capital letter,1small letter,1number and 1 special character'";
        }elseif(!preg_match("/[A-Z]+/",$rpass)){
            $rpassErr="password should contain atleast '10 characters,in that 1 capital letter,1small letter,1number and 1 special character'";
        }elseif(!preg_match("/[a-z]+/",$rpass)){
            $rpassErr="password should contain atleast '10 characters,in that 1 capital letter,1small letter,1number and 1 special character'";
        }elseif(!preg_match("/[0-9]+/",$rpass)){
            $rpassErr="password should contain atleast '10 characters,in that 1 capital letter,1small letter,1number and 1 special character'";
        }elseif(!preg_match("/[\W]+/",$rpass)){
            $rpassErr="password should contain atleast '10 characters,in that 1 capital letter,1small letter,1number and 1 special character'";
        }elseif(empty($_POST["cpassword"])){
            $crpassErr="confirm password is required";
        }elseif($rpass !== $crpass){
            echo "password should be same";
        }else{
            $sql = "UPDATE `customer` SET `password`='$rpass' WHERE `email`='$email'";
            $result = mysqli_query($conn,$sql);
            $sql =  "SELECT * FROM `customer`  WHERE  `email`='$email'";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    session_start();
                    $_SESSION["sessionId"] = $row["id"];
                    $_SESSION["sessionfirstname"] = $row["firstname"];
                    $_SESSION["sessionlastname"] = $row["lastname"];
                    header("Location: index.php?success=youloggedin");
                    exit();    
                }
            }else{
                echo "user does not exit.Go for registration.";
            }
        }
    }
?>
<h3>RECOVERY PASSWORD</h3>
<form id="recovery" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"   method="POST"> 
<label for="email">Email id:</label>
<input type="text" id="email" name="email" value="<?php echo $email;?>">
<span class="error"><?php if(isset($emailErr)) {echo $emailErr;}?></span><br><br>
<label for="password">Password:</label>
<input type="password" id="password" name="password" value="<?php echo $rpass;?>">  
<span class="error"><?php if(isset($rpassErr)) {echo $rpassErr;}?></span><br><br>
<label for="cpassword">Confirm Password:</label>
<input type="password" id="cpassword" name="cpassword" value="<?php echo $crpass;?>"> 
<span class="error"><?php if(isset($crpassErr)) {echo $crpassErr;}?></span><br><br>
<button type="submit" name="submit">SUBMIT</button>
</form>
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
        cpassword: {
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
        cpassword: {
            required: "enter confirm password",
            minlength: "password must have atleast 10 characters",
            equalTo: "mismatch in the password"
        }
    }
});
</script>
</html>
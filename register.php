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
</head>
<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="bootstrap-5.0.2-dist/js/bootstrap.js"></script>
    <nav>
        <ul class="list-inline">
            <li class="list-inline-item"><a class="btn btn-link" href="index.php">HOME</a></li>
            <li class="list-inline-item"><a class="btn btn-link" href="login.php">LOG IN</a></li>
        </ul>
    </nav>
<h3>REGISTRATION</h3>
<div class="container">
<p>Already have account?<a class="btn btn-link" href="login.php">LOGIN HERE!</a></p>
<?php require "registervalidation.php";?>
<div class="form-group">
<form id="registerform"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="POST">
<label for="firstname">Firstname: </label> 
<input class="form-contol form-contol-sm" type="text" id="firstname" name="firstname" value="<?php echo $fname;?>"> 
<span class="error"><?php if(isset($fnameErr)) {echo $fnameErr;}?></span>
<br/><br/>
<label for="lastname">Lastname: </label> 
<input class="form-control form-contol-sm" type="text" id="lastname" name="lastname" value="<?php echo $lname;?>">
<span class="error"><?php if(isset($lnameErr)) {echo $lnameErr;}?></span>
<br/><br/>
<label for="email"> Email: </label> 
<input class="form-contol form-contol-sm" type="text" id="email" name="email" value="<?php echo $email;?>" >
<span class="error"><?php if(isset($emailErr)) {echo $emailErr;}?></span>
<br/><br/>
<label for="mobilenum">Phone number: </label> 
<input class="form-control form-control-sm" type="text" id="mobilenum" name="mobilenum" value="<?php echo $mobileNum;?>">
<span class="error"><?php if(isset($mobileNumErr)) {echo $mobileNumErr;}?></span>
<br/><br/>
<label for="password">Password: </label> 
<input class="form-control form-control-sm" type="password" id="password" name="password" value="<?php echo $pass;?>" >
<span class="error"><?php if(isset($passErr)) {echo $passErr;}?></span>
<br/><br/>
<label for="cpassword"> Confirm password: </label> 
<input class="form-control form-control-sm" type="password" id="cpassword" name="cpassword" value="<?php echo $cpass;?>">
<span class="error"><?php if(isset($cpassErr)) {echo $cpassErr;}?></span>
<br/><br/>
<button class="btn btn-primary" type="submit" name="submit" value="submit">REGISTER</button>
</form>
</div>
</div>
</body>
<script type="text/javascript">
$( "#registerform" ).validate({
    rules: {
        firstname: {
            required: true
        },
        lastname: {
            required: true
        },
        email: {
            required: true,
            email: true
        },
        mobilenum: {
            required: true,
            number: true,
            minlength: 10,
            maxlength: 10
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
        firstname: {
            required: "enter first name"
        },
        lastname: {
            required: "enter last name"
        },
        email: {
            required: "enter emial id",
            email: "enter valid email id"
        },
        mobilenum: {
            required: "enter phone number",
            number: "only numbers are allowed",
            minlength: "must contain only 10 characters",
            maxlength: "must contain only 10 characters"
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
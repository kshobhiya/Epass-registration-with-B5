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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="bootstrap-5.0.2-dist/js/bootstrap.js"></script>
<nav>
    <ul class="list-inline" style="float:right">
        <li class="list-inline-item"><a class="btn btn-link" href="index.php">HOME</a></li>
        <li class="list-inline-item"><a class="btn btn-link" href="login.php">LOG IN</a></li>
    </ul>
</nav>
<h4 class="text-center" style="color:blue;padding: 30px 0px 20px 70px">REGISTRATION</h4>
<p class="fw-normal" style="padding-left: 530px">Already have account?<a class="link-primary" href="login.php">LOGIN HERE!</a></p>
<?php require "registervalidation.php";?>
<div class="container" style="padding: 20px 20px 20px 200px;margin-right: 100px;margin-left: 280px">
    <form id="registerform"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="POST">
    <div class="row mb-3">
        <label for="firstname" class="form-label col-sm-2">Firstname:</label>
        <div class="col-sm-4">
            <input class="form-control" type="text" id="firstname" name="firstname" value="<?php echo $fname;?>"> 
            <span class="error"><?php if(isset($fnameErr)) {echo $fnameErr;}?></span>
        </div>
    </div>
    <div class="row mb-3">
        <label for="lastname" class="col-sm-2 form-label">Lastname:</label>
        <div class="col-sm-4">
            <input class="form-control" type="text" id="lastname" name="lastname" value="<?php echo $lname;?>">
            <span class="error"><?php if(isset($lnameErr)) {echo $lnameErr;}?></span>
        </div>
    </div>
        <div class="row mb-3">
            <label for="email" class="col-sm-2 form-label">Email:</label>
            <div class="col-sm-4">
                <input class="form-control" type="text" id="email" name="email" value="<?php echo $email;?>" >
                <span class="error"><?php if(isset($emailErr)) {echo $emailErr;}?></span>
            </div>
        </div>
        <div class="row mb-3">
            <label for="mobilenum" class="col-sm-2 form-label">Phone number: </label>
            <div class="col-sm-4"> 
                <input class="form-control" type="text" id="mobilenum" name="mobilenum" value="<?php echo $mobileNum;?>">
                <span class="error"><?php if(isset($mobileNumErr)) {echo $mobileNumErr;}?></span>
            </div>
        </div>
        <div class="row mb-3">
            <label for="password" class="col-sm-2 form-label">Password: </label>
            <div class="col-sm-4"> 
                <input class="form-control" type="password" id="password" name="password" value="<?php echo $pass;?>" >
                <span class="error"><?php if(isset($passErr)) {echo $passErr;}?></span>
            </div>
        </div>
        <div class="row mb-3">
            <label for="cpassword" class="col-sm-2 form-label"> Confirm password: </label>
            <div class="col-sm-4"> 
                <input class="form-control" type="password" id="cpassword" name="cpassword" value="<?php echo $cpass;?>">
                <span class="error"><?php if(isset($cpassErr)) {echo $cpassErr;}?></span>
            </div>
        </div>
        <button class="btn btn-primary" style="margin-left: 100px;margin-top: 20px" type="submit" name="submit" value="submit">REGISTER</button>
    </form>
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
            required: "Enter first name"
        },
        lastname: {
            required: "Enter last name"
        },
        email: {
            required: "Enter emaill id",
            email: "Enter valid email id"
        },
        mobilenum: {
            required: "Enter phone number",
            number: "only numbers are allowed",
            minlength: "must contain only 10 characters",
            maxlength: "must contain only 10 characters"
        },
        password: {
            required: "Enter password",
            minlength: "password must have atleast 10 characters"
        },
        cpassword: {
            required: "Enter confirm password",
            minlength: "password must have atleast 10 characters",
            equalTo: "mismatch in the password"
        }
    }
});
</script>
</html> 
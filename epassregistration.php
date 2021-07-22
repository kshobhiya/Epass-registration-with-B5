<!DOCTYPE html>
<html>
<head>
<title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
</head>
<body>
<h1>EPASS REGISTRATION FORM</h1>
<?php 
    include "epassregistrationvalidation.php";
?>
<form id="epassform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"    method="POST" enctype="multipart/form-data"> 
<label for="firstname">Firstname:</label> <input type="text" name="firstname" value="<?php echo $fname;?>">
<span class="error"><?php if(isset($fnameErr)) {echo $fnameErr;}?></span>
<br><br>
<label for="lastname">Lastname:</label> <input type="text" name="lastname" value="<?php echo $lname;?>">
<span class="error"><?php if(isset($lnameErr)) {echo $lnameErr;}?></span>
<br><br>
<label for="email">Email:</label> <input type="text" name="email" value="<?php echo $email;?>"> 
<span class="error"><?php if(isset($emailErr)) {echo $emailErr;}?></span>
<br><br>
<label for="mobilenum">MobileNumber:</label> <input type="text" name="mobilenum" value="<?php echo $mobilenum;?>">
<span class="error"><?php if(isset($mobilenumErr)) {echo $mobilenumErr;}?></span> 
<br><br>
<div id="reason">
<label for="reason">Select Reason:</label>
<input type="radio" name="reason" 
<?php if(isset($reason) && $reason=="marriage"){echo "checked";}?> value="marriage" required>Marriage
<input type="radio" name="reason"
<?php if(isset($reason) && $reason=="medical emergency"){echo "checked";}?> value="medical emergency" required>Medical Emergency
<span class="error"><?php if(isset($reasonErr)) {echo $reasonErr;}?></span>
</div><br>
<label><b>From place of travel:</b></label><br><br>
<label for="district">Select District:</label>
<select name="district" id="district" value="<?php echo $district;?>">
    <option value="0">--Select District--</option>
    <?php
        $conn = mysqli_connect("localhost","root","","form epass");
        $sql="SELECT * FROM `district`";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($result)){
            echo "<option value=".$row["District_id"].">".$row["District"]."</option>";
        }
    ?>

</select>
<span class="error"><?php if(isset($districtErr)){echo $districtErr;}?></span>
<label for="city">Select City:</label>
<select name="city" id="city" value="<?php echo $city;?>">
    <option value="0">--Select city--</option>
</select>
<span class="error"><?php if(isset($cityErr)){echo $cityErr;}?></span><br><br>
<label><b>Destination place:</b></label><br><br>
<label for="destinationdistrict">Select District:</label>
<select name="destinationdistrict" id="destinationdistrict" value="<?php echo $ddistrict; ?>">
    <option value="0">--Select District--</option>
    <?php
        $conn = mysqli_connect("localhost","root","","form epass");
        $sql="SELECT * FROM `district`";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($result)){
            echo "<option value=".$row["District_id"].">".$row["District"]."</option>";
        }
    ?>
</select>
<span class="error"><?php if(isset($ddistrictErr)){echo $ddistrictErr;}?></span>
<label for="destinationcity">Select City:</label>
<select name="destinationcity" id="destinationcity" value="<?php echo $dcity;?>">
    <option>--Select City--</option>
</select><br><br>
<span class="error"><?php if(isset($dcityErr)){echo $dcityErr;}?></span>
<label for="date">Date:</label>
<input type="text" id="date" name="date" placeholder="MM/DD/YYYY" value="<?php echo $date;?>"> 
<span class="error"><?php if(isset($dateErr)){echo $dateErr;}?></span>
<br><br>
<label for="vehicle">Vehicle number:</label> <input type="text" name="vehicle" value="<?php echo $vehicle;?>"> 
<span class="error"><?php if(isset($vehicleErr)) {echo $vehicleErr;}?></span>
<br><br>
<label for="file">Upload document:</label> <input type="file" name="file" value="<?php echo $destination;?>">
<span class="error"><?php if(isset($fileError)){echo $fileError;}?></span>
<span class="error"><?php if(isset($fileErr)){echo $fileErr;}?></span><br>
<p>For proof enter png file,size should not exceed 50kb</p><br>
<button type="submit" name="register">REGISTER</button>
<p>After registration you will receive mail for successfull registration</p><br>
<a href="index.php">HOME PAGE</a>
</form> 
</body>
<script type="text/javascript">
$("#epassform").validate({
    rules:{
        firstname:{
            required: true
        },
        lastname:{
            required: true
        },
        email:{
            required: true,
            email: true
        },
        mobilenum:{
            required: true,
            number: true,
            minlength: 10,
            maxlength: 10
        },
        reason:{
            required:true
        },
        district:{
            required:true
        },
        city:{
            required:true
        },
        destinationdistrict:{
            required:true
        },
        destinationcity:{
            required:true
        },
        date:{
            required: true
        },
        vehicle:{
            required: true
        },
        file:{
            required: true
        }
    },
    messages:{
        firstname:{
            required:"enter your first name"
        },
        lastname:{
            required:"enter your last name"
        },
        email:{
            required:"enter your email id",
            email:"enter valid email id"
        },
        mobilenum:{
            required:"enter your phonenumber",
            number: "only numbers are allowed",
            minlength: "must contain only 10 number",
            maxlength: "must contain only 10 characters"
        },
        reason:{
            required:"enter reason for travel"
        },
        district:{
            required:"this field is required"
        },
        city:{
            required:"this field is required"
        },
        destinationdistrict:{
            required:"this field is required"
        },
        destinationcity:{
            required:"this field is required"
        },
        date:{
            required:"date is required"
        },
        vehicle:{
            required:"vehicle number is required"
        },
        file:{
            required:"reasonable file for travel is required"
        }
    },
    errorPlacement: function(error,element){
        if(element.is(":radio")){
            error.appendTo(element.parents("#reason"));
        }else{
            error.insertAfter(element);
        }
    }
}); 
</script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
$( function() {
    $( "#date" ).datepicker({ minDate: 0, maxDate: "+6M" });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $("#district").change(function(){
        var district_id = $(this).val();
        var postid = "id="+district_id;
        $.ajax({
            method: "POST",
            url: "fromplace.php",
            data: postid,
            success: function(city){
                $("#city").html(city);
            }
        });
    });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $("#destinationdistrict").change(function(){
        var desdistrict_id = $(this).val();
        var despostid = "did="+ desdistrict_id;
        $.ajax({
            method: "POST",
            url: "destinationplace.php",
            data: despostid,
            success: function(destinationcity){
                $("#destinationcity").html(destinationcity);
            }
        });
    });        
});
</script>
</html>
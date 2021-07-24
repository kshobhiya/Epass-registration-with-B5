</!DOCTYPE html>
<html>
<head>
<title></title>
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
<h4 class="text-center" style="color: blue">Updating Epass Registratiom Form</h4>
<?php
    require_once "database.php";?>
<?php
function datevalidation($date) {
    $d1="01/01/2020";
    $d2="01/01/2023";
    if($date < $d2 && $date >= $d1){
        return $date;
    }else{
        echo "date is out of coverage";
    }
}
/*function uploadfile($filename){
    $file=$_FILES["file"];
    $filename=$_FILES["file"]["name"];
    $tmp_name=$_FILES["file"]["tmp_name"];
    $size=$_FILES["file"]["size"];
    $error=$_FILES["file"]["error"];
    $extension=explode('.',$filename);
    $fileextension=strtolower(end($extension));
    $isAllowed=array('jpeg','jpg','png','pdf');
    if(in_array($fileextension, $isAllowed)){
        if($error === 0){
            if($size < 50000){
                $update_filename="upload/".$filename;
                move_uploaded_file($tmp_name, $update_filename);
                header("Location: update.php?success");
                return $update_filename;
            }else{
                //header("Location:update.php?error=filesizeistoolarge!");
                //exit();
                die("Error:file size is too large!upload file less than 50kb");
            }
        }else{
            //header("Location:update.php?error=thereisaerrorinuploading");
            // exit();
            die("Error:there is a error in uploading");
        }
    }else{
        //header("Location: update.php?thistypeoffileisnotallowedtoupload");
        //exit();
        die("Error:this type of file is not allowed to upload");
    }
}*/
$fname = $lname = $email =$mobilenum ="";
$reason=$place=$dplace=$date=$vehicle="";
if(isset($_POST["update"])){
    $formid=$_POST["formid"];
    $fname=$_POST["firstname"];
    $lname=$_POST["lastname"];
    $email=$_POST["email"];
    $mobilenum=$_POST["mobilenum"];
    $reason=$_POST["reason"];
    $district=$_POST["district"];
    $city=$_POST["city"];
    $ddistrict=$_POST["destinationdistrict"];
    $dcity=$_POST["destinationcity"];
    $date=$_POST["date"];
    $vehicle=$_POST["vehicle"];
    $new_image=$_FILES["file"]["name"];
    $old_image=$_POST["file_old"];
    if(empty($_POST["firstname"])){
        $fnameErr="name is required";
    }elseif(!preg_match("/^[a-zA-Z\s]+$/",$fname)){
        $fnameErr="only letters are allowed";
    }elseif(empty($_POST["lastname"])){
        $lnameErr="name is required";
    }elseif(!preg_match("/^[a-zA-Z\s]+$/",$lname)){
        $lnameErr="only letters are allowed in lastname";
    }elseif(empty($_POST["email"])){
        $emailErr="email is required";
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $emailErr="invalid emailid";
    }elseif(empty($_POST["mobilenum"])){
        $mobileNumErr="mobile number is required";
    }elseif(!preg_match("/^[\d]+$/",$mobilenum)){
        $mobileNumErr="only numbers are allowed";
    }elseif(empty($_POST["district"])){
        $districtErr="district is required";  
    }elseif(empty($_POST["city"])){
        $cityErr="city is required"; 
    }elseif(empty($_POST["destinationdistrict"])){
        $ddistrictErr="destination district is required"; 
    }elseif(empty($_POST["destinationcity"])){
        $dcityErr="destination city is required"; 
    }elseif(empty($_POST["date"])){
        $dateErr="date is required";
    }elseif(empty($_POST["vehicle"])){
        $vehicleErr="vehicle number is required"; 
    }elseif(!preg_match("/^[a-zA-Z\d]*$/",$vehicle)){
        $vehicleErr="enter a valid vehicle number";
    }elseif($_FILES["file"]["name"] == ""){
        $updatedfile=$old_image;
        $sql="UPDATE `registration` SET `firstname`='$fname',`lastname`='$lname',`email`='$email',`phonenumber`='$mobilenum',`reason`='$reason',`from place`='$city',`destination place`='$dcity',`date`='$date',`vehicle number`='$vehicle' WHERE `form Id`='$formid'";
        $result=mysqli_query($conn,$sql); 
        if($result == TRUE){
            header("Location:index.php?success=data get edited successfully");
            exit();
        }
    }else{ 
        //$updatedfile=uploadfile($new_image);
        $file=$_FILES["file"];
        $filename=$_FILES["file"]["name"];
        $tmp_name=$_FILES["file"]["tmp_name"];
        $size=$_FILES["file"]["size"];
        $error=$_FILES["file"]["error"];
        $extension=explode('.',$filename);
        $fileextension=strtolower(end($extension));
        $isAllowed=array('jpeg','jpg','png','pdf');
        if(in_array($fileextension, $isAllowed)){
            if($error === 0){
                if($size < 50000){
                    unlink("upload/".$old_image);
                    $update_filename="upload/".$filename;
                    move_uploaded_file($tmp_name, $update_filename);
                    header("Location: update.php?success");
                    $updatedfile=$update_filename;
                    $sql="UPDATE `registration` SET `firstname`='$fname',`lastname`='$lname',`email`='$email',`phonenumber`='$mobilenum',`reason`='$reason',`from place`='$city',`destination place`='$dcity',`date`='$date',`vehicle number`='$vehicle',`file for reason`='$updatedfile' WHERE `form Id`='$formid'";
                    $result=mysqli_query($conn,$sql); 
                    if($result == TRUE){
                        header("Location:index.php?success=data and image get updated successfully");
                        exit();
                    }
                }else{
                    $fileErr="file size is too large!";
                }
            }else{
            $fileErr="there is an error in uploading file";
            }
        }else{
        $fileErr="this type of file is not allowed to upload";
        }
    }
}
if(isset($_GET["formid"])){
    $formid = $_GET["formid"];
    $sql= "SELECT * FROM `registration` WHERE  `form id`='$formid'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $formid=$row["form id"];
            $customerid=$row["customer id"];
            $fname=$row["firstname"];
            $lname=$row["lastname"];
            $email=$row["email"];
            $mobilenum=$row["phonenumber"];
            $reason=$row["reason"];
            $district=$row["district"];
            $city=$row["from place"];
            $ddistrict=$row["destination district"];
            $dcity=$row["destination place"];
            $date=$row["date"];
            $vehicle=$row["vehicle number"];
            $filename=$row["file for reason"];
        }
    }
}
?>
<div class="container" style="padding: 30px 0px 30px 0px">
    <form  id="updateform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"   method="POST" enctype="multipart/form-data">
    <div class="row mb-3"> 
        <label for="firstname" class="form-label col-sm-2"><b>Firstname:</b></label>
        <div class="col-sm-4">
            <input class="form-control" type="text" name="firstname" value="<?php echo $fname;?>">
            <span class="error"><?php if(isset($fnameErr)) {echo $fnameErr;}?></span>
        </div>
    </div>
    <input type="hidden" name="customerid" value="<?php echo $customerid;?>">
    <input type="hidden" name="formid" value="<?php echo $formid;?>">
    <div class="row mb-3">
        <label for="lastname" class="form-label col-sm-2"><b>Lastname:</b></label>
        <div class="col-sm-4">
            <input class="form-control" type="text" name="lastname" value="<?php echo $lname;?>">
            <span class="error"><?php if(isset($lnameErr)) {echo $lnameErr;}?></span>
        </div>
    </div>
    <div class="row mb-3">
        <label for="email" class="form-label col-sm-2"><b>Email:</b></label>
        <div class="col-sm-4">
            <input class="form-control" type="text" name="email" value="<?php echo $email;?>">
            <span class="error"><?php if(isset($emailErr)) {echo $emailErr;}?></span> 
        </div>
    </div>
    <div class="row mb-3">
        <label for="mobilenum" class="form-label col-sm-2"><b>MobileNumber:</b></label>
        <div class="col-sm-4"> 
            <input type="text" name="mobilenum" value="<?php echo $mobilenum;?>">
            <span class="error"><?php if(isset($mobilenumErr)) {echo $mobilenumErr;}?></span> 
        </div>
    </div>
    <div id="reason">
        <div class="row mb-3">
            <label for="reason" class="form-label col-sm-2"><b>Select Reason:</b></label>
            <div class="form-check form-check-inline col-sm-2">
                <input class="form-check-input" type="radio" name="reason" 
                <?php if($reason == "marriage"){echo "checked";} ?> value="marriage">Marriage
            </div>
            <div class="form-check form-check-inline col-sm-2">
                <input class="form-check-input" type="radio" name="reason"
                <?php if($reason == "medical emergency"){echo "checked";}?>  value="medical emergency">Medical Emergency
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <label><b>From place of travel:</b></label><br><br>
        <div class="col-md-2">
            <label for="district">Select District:</label>
            <select class="form-select form-select-sm" name="district" id="district" value="<?php echo $district;?>">
            <?php  
            $sql="SELECT * FROM `district`";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($result)){ ?>
                <option value=<?php echo $row["District_id"];?> <?php echo ($row["District_id"] == $district)?'selected' : '';?> > <?php echo $row["District"];?></option>; <?php   
            }    
            ?>
            </select>
            <span class="error"><?php if(isset($districtErr)){echo $districtErr;}?></span>
        </div>
        <div class="col-md-2">
            <label for="city">Select City:</label>
            <select class="form-select form-select-sm" name="city" id="city" value="<?php echo $city;?>">
            <?php 
            $sql="SELECT * FROM `cities` WHERE `District_id`='$district'";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($result)){ ?>
                <option value=<?php echo $row["city_id"];?> <?php echo ($row["city_id"] == $city)?'selected' : '';?> > <?php echo $row["cities"];?></option>; <?php 
            }  
            ?>
            </select>
            <span class="error"><?php if(isset($cityErr)){echo $cityErr;}?></span>
        </div>
    </div>
    <div class="row mb-3">
        <label><b>Destination place:</b></label><br><br>
        <div class="col-md-2">
            <label for="destinationdistrict">Select District:</label>
            <select class="form-select form-select-sm" name="destinationdistrict" id="destinationdistrict" value="<?php echo $ddistrict; ?>">
            <?php
            $sql="SELECT * FROM `district`";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($result)){ ?>
                <option value=<?php echo $row["District_id"];?> <?php echo ($row["District_id"] == $ddistrict)?'selected' : '';?> > <?php echo $row["District"];?></option>; <?php   
            }    
            ?>
            </select>
            <span class="error"><?php if(isset($ddistrictErr)){echo $ddistrictErr;}?></span>
        </div>
        <div class="col-md-2">
            <label for="destinationcity">Select City:</label>
            <select class="form-select form-select-sm" name="destinationcity" id="destinationcity" value="<?php echo $dcity;?>">
            <?php
            $sql="SELECT * FROM `cities`WHERE `District_id`='$ddistrict' ";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($result)){ ?>
                <option value=<?php echo $row["city_id"];?> <?php echo ($row["city_id"] == $dcity)?'selected' : '';?> > <?php echo $row["cities"];?></option>; <?php   
            }
            ?>
            </select>
            <span class="error"><?php if(isset($dcityErr)){echo $dcityErr;}?></span>
        </div>
    </div>
    <div class="row mb-3">
        <label for="date" class="form-label col-sm-2"><b>Date:</b></label>
        <div class="col-sm-4">
            <input class="form-control" type="text" id="date" name="date" placeholder="MM/DD/YYYY" value="<?php echo $date;?>">
            <span class="error"><?php if(isset($dateErr)){echo $dateErr;}?></span>
        </div>
    </div>
    <div class="row mb-3">
        <label for="vehicle" class="form-label col-sm-2"><b>Vehicle number:</b></label>
        <div class="col-sm-4"> 
            <input class="form-control" type="text" name="vehicle" value="<?php echo $vehicle;?>">
            <span class="error"><?php if(isset($vehicleErr)) {echo $vehicleErr;}?></span>
        </div>
    </div>
    <div class="row mb-3">
        <label for="formFile" class="form-label col-sm-2"><b>Upload document:</b></label>
        <div class="col-sm-4">
            <input class="form-control" type="file" name="file" id="formFile">
            <span class="error"><?php if(isset($fileErr)){echo $fileErr;}?></span>
        </div>
        <input class="col-sm-2" type="text"  name="file_old" value="<?php echo $filename;?>">
    </div>
    <button class="btn btn-primary" type="submit" name="update">UPDATE</button>
    </form>
    <a class="link-primary" href="index.php">RETURN</a>
</div>
</body>
<script type="text/javascript">
$("#updateform").validate({
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
            required: true
        },
        district:{
            required:true
        },
        city:{
            required: true
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
            required:"district is required"
        },
        city:{
            required:"city is required"
        },
        destinationdistrict:{
            required:"district is required"
        },
        destinationcity:{
            required:"city is required"
        },
        date:{
            required:"date is required"
        },
        vehicle:{
            required:"vehicle number is required"
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
<script>
$( function() {
    $( "#date" ).datepicker({ 
        minDate: 0, 
        maxDate: "+6M" 
    });
});
</script>
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
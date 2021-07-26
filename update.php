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
$first_name = $last_name = $email =$phone_number ="";
$reason=$from_district=$from_city=$to_district=$to_city=$date=$vehicle_number="";
if(isset($_POST["update"])){
    $id=$_POST["id"];
    $first_name=$_POST["first_name"];
    $last_name=$_POST["last_name"];
    $email=$_POST["email"];
    $phone_number=$_POST["phone_number"];
    $reason=$_POST["reason"];
    $from_district=$_POST["from_district"];
    $from_city=$_POST["from_city"];
    $to_district=$_POST["to_district"];
    $to_city=$_POST["to_city"];
    $date=$_POST["date"];
    $vehicle_number=$_POST["vehicle_number"];
    $new_image=$_FILES["file"]["name"];
    $old_image=$_POST["file_old"];
    if(empty($_POST["first_name"])){
        $first_name_err="name is required";
    }elseif(!preg_match("/^[a-zA-Z\s]+$/",$first_name)){
        $first_name_err="only letters are allowed";
    }elseif(empty($_POST["last_name"])){
        $last_name_err="name is required";
    }elseif(!preg_match("/^[a-zA-Z\s]+$/",$last_name)){
        $last_name_err="only letters are allowed in lastname";
    }elseif(empty($_POST["email"])){
        $email_err="email is required";
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $email_err="invalid emailid";
    }elseif(empty($_POST["phone_number"])){
        $phone_number_err="mobile number is required";
    }elseif(!preg_match("/^[\d]+$/",$phone_number)){
        $phone_number_err="only numbers are allowed";
    }elseif(empty($_POST["from_district"])){
        $from_district_err="district is required";  
    }elseif(empty($_POST["from_city"])){
        $from_city_err="city is required"; 
    }elseif(empty($_POST["to_district"])){
        $to_district_err="destination district is required"; 
    }elseif(empty($_POST["to_city"])){
        $to_city_err="destination city is required"; 
    }elseif(empty($_POST["date"])){
        $date_err="date is required";
    }elseif(empty($_POST["vehicle_number"])){
        $vehicle_err="vehicle number is required"; 
    }elseif(!preg_match("/^[a-zA-Z\d]*$/",$vehicle_number)){
        $vehicle_err="enter a valid vehicle number";
    }elseif($_FILES["file"]["name"] == ""){
        $updated_file=$old_image;
        $sql="UPDATE `registration` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email',`phone_number`='$phone_number',`reason`='$reason',`from_district_id`='$from_district',`from_city_id`='$from_city',`to_district_id`='$to_district',`to_city_id`='$to_city',`date`='$date',`vehicle_number`='$vehicle_number' WHERE `id`='$id'";
        $result=mysqli_query($conn,$sql); 
        if($result == TRUE){
            header("Location:index.php?success=data get edited successfully");
            exit();
        }
    }else{ 
        //$updatedfile=uploadfile($new_image);
        $file=$_FILES["file"];
        $file_name=$_FILES["file"]["name"];
        $tmp_name=$_FILES["file"]["tmp_name"];
        $size=$_FILES["file"]["size"];
        $error=$_FILES["file"]["error"];
        $extension=explode('.',$file_name);
        $file_extension=strtolower(end($extension));
        $is_allowed=array('jpeg','jpg','png','pdf');
        if(in_array($file_extension, $is_allowed)){
            if($error === 0){
                if($size < 50000){
                    unlink("upload/".$old_image);
                    $update_filename="upload/".$file_name;
                    move_uploaded_file($tmp_name, $update_filename);
                    header("Location: update.php?success");
                    $updated_file=$update_filename;
                    $sql="UPDATE `registration` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email',`phone_number`='$phone_number',`reason`='$reason',`from_district_id`='$from_district',`from_city_id`='$from_city',`to_district_id`='$to_district',`to_city_id`='$to_city',`date`='$date',`vehicle_number`='$vehicle_number',`reason_for_travel`='$updated_file' WHERE `id`='$id'";
                    $result=mysqli_query($conn,$sql); 
                    if($result == TRUE){
                        header("Location:index.php?success=data and image get updated successfully");
                        exit();
                    }
                }else{
                    $file_err="file size is too large!";
                }
            }else{
            $file_err="there is an error in uploading file";
            }
        }else{
        $file_err="this type of file is not allowed to upload";
        }
    }
}
if(isset($_GET["formid"])){
    $form_id = $_GET["formid"];
    $sql= "SELECT * FROM `registration` WHERE  `id`='$form_id'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $id=$row["id"];
            $customer_id=$row["customer_id"];
            $first_name=$row["first_name"];
            $last_name=$row["last_name"];
            $email=$row["email"];
            $phone_number=$row["phone_number"];
            $reason=$row["reason"];
            $from_district=$row["from_district_id"];
            $from_city=$row["from_city_id"];
            $to_district=$row["to_district_id"];
            $to_city=$row["to_city_id"];
            $date=$row["date"];
            $vehicle_number=$row["vehicle_number"];
            $file_name=$row["reason_for_travel"];
        }
    }
}
?>
<div class="container" style="padding: 30px 0px 30px 0px">
    <form  id="updateform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"   method="POST" enctype="multipart/form-data">
    <div class="row mb-3"> 
        <label for="first_name" class="form-label col-sm-2"><b>Firstname:</b></label>
        <div class="col-sm-4">
            <input class="form-control" type="text" name="first_name" value="<?php echo $first_name;?>">
            <span class="error"><?php if(isset($first_name_err)) {echo $first_name_err;}?></span>
        </div>
    </div>
    <input type="hidden" name="customer_id" value="<?php echo $customer_id;?>">
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <div class="row mb-3">
        <label for="last_name" class="form-label col-sm-2"><b>Lastname:</b></label>
        <div class="col-sm-4">
            <input class="form-control" type="text" name="last_name" value="<?php echo $last_name;?>">
            <span class="error"><?php if(isset($last_name_err)) {echo $last_name_err;}?></span>
        </div>
    </div>
    <div class="row mb-3">
        <label for="email" class="form-label col-sm-2"><b>Email:</b></label>
        <div class="col-sm-4">
            <input class="form-control" type="text" name="email" value="<?php echo $email;?>">
            <span class="error"><?php if(isset($email_err)) {echo $email_err;}?></span> 
        </div>
    </div>
    <div class="row mb-3">
        <label for="phone_number" class="form-label col-sm-2"><b>MobileNumber:</b></label>
        <div class="col-sm-4"> 
            <input type="text" name="phone_number" value="<?php echo $phone_number;?>">
            <span class="error"><?php if(isset($phone_number_err)) {echo $phone_number_err;}?></span> 
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
            <label for="from_district">Select District:</label>
            <select class="form-select form-select-sm" name="from_district" id="from_district" value="<?php echo $from_district;?>">
            <?php  
            $sql="SELECT * FROM `district`";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($result)){ ?>
                <option value=<?php echo $row["district_id"];?> <?php echo ($row["district_id"] == $from_district)?'selected' : '';?> > <?php echo $row["district"];?></option>; <?php   
            }    
            ?>
            </select>
            <span class="error"><?php if(isset($district_err)){echo $district_err;}?></span>
        </div>
        <div class="col-md-2">
            <label for="from_city">Select City:</label>
            <select class="form-select form-select-sm" name="from_city" id="from_city" value="<?php echo $from_city;?>">
            <?php 
            $sql="SELECT * FROM `cities` WHERE `district_id`='$from_district'";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($result)){ ?>
                <option value=<?php echo $row["city_id"];?> <?php echo ($row["city_id"] == $from_city)?'selected' : '';?> > <?php echo $row["cities"];?></option>; <?php 
            }  
            ?>
            </select>
            <span class="error"><?php if(isset($city_err)){echo $city_err;}?></span>
        </div>
    </div>
    <div class="row mb-3">
        <label><b>Destination place:</b></label><br><br>
        <div class="col-md-2">
            <label for="to_district">Select District:</label>
            <select class="form-select form-select-sm" name="to_district" id="to_district" value="<?php echo $to_district; ?>">
            <?php
            $sql="SELECT * FROM `district`";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($result)){ ?>
                <option value=<?php echo $row["district_id"];?> <?php echo ($row["district_id"] == $to_district)?'selected' : '';?> > <?php echo $row["district"];?></option>; <?php   
            }    
            ?>
            </select>
            <span class="error"><?php if(isset($to_district_err)){echo $to_district_err;}?></span>
        </div>
        <div class="col-md-2">
            <label for="to_city">Select City:</label>
            <select class="form-select form-select-sm" name="to_city" id="to_city" value="<?php echo $to_city;?>">
            <?php
            $sql="SELECT * FROM `cities` WHERE `district_id`='$to_district'";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($result)){ ?>
                <option value=<?php echo $row["city_id"];?> <?php echo ($row["city_id"] == $to_city)?'selected' : '';?> > <?php echo $row["cities"];?></option>; <?php   
            }
            ?>
            </select>
            <span class="error"><?php if(isset($to_city_err)){echo $to_city_err;}?></span>
        </div>
    </div>
    <div class="row mb-3">
        <label for="date" class="form-label col-sm-2"><b>Date:</b></label>
        <div class="col-sm-4">
            <input class="form-control" type="text" id="date" name="date" placeholder="MM/DD/YYYY" value="<?php echo $date;?>">
            <span class="error"><?php if(isset($date_err)){echo $date_err;}?></span>
        </div>
    </div>
    <div class="row mb-3">
        <label for="vehicle_number" class="form-label col-sm-2"><b>Vehicle number:</b></label>
        <div class="col-sm-4"> 
            <input class="form-control" type="text" name="vehicle_number" value="<?php echo $vehicle_number;?>">
            <span class="error"><?php if(isset($vehicle_err)) {echo $vehicle_err;}?></span>
        </div>
    </div>
    <div class="row mb-3">
        <label for="formFile" class="form-label col-sm-2"><b>Upload document:</b></label>
        <div class="col-sm-4">
            <input class="form-control" type="file" name="file" id="formFile">
            <span class="error"><?php if(isset($file_err)){echo $file_err;}?></span>
        </div>
        <input class="col-sm-2" type="text"  name="file_old" value="<?php echo $file_name;?>">
    </div>
    <button class="btn btn-primary" type="submit" name="update">UPDATE</button>
    </form>
    <a class="link-primary" href="index.php">RETURN</a>
</div>
</body>
<script type="text/javascript">
$("#updateform").validate({
    rules:{
        first_name:{
            required: true
        },
        last_name:{
            required: true
        },
        email:{
            required: true,
            email: true
        },
        phone_number:{
            required: true,
            number: true,
            minlength: 10,
            maxlength: 10
        },
        reason:{
            required: true
        },
        from_district:{
            required:true
        },
        from_city:{
            required: true
        },
        to_district:{
            required:true
        },
        to_city:{
            required:true
        },
        date:{
            required: true
        },
        vehicle_number:{
            required: true
        }
    },
    messages:{
        first_name:{
            required:"enter your first name"
        },
        last_name:{
            required:"enter your last name"
        },
        email:{
            required:"enter your email id",
            email:"enter valid email id"
        },
        phone_number:{
            required:"enter your phonenumber",
            number: "only numbers are allowed",
            minlength: "must contain only 10 number",
            maxlength: "must contain only 10 characters"
        },
        reason:{
            required:"enter reason for travel"
        },
        from_district:{
            required:"district is required"
        },
        from_city:{
            required:"city is required"
        },
        to_district:{
            required:"district is required"
        },
        to_city:{
            required:"city is required"
        },
        date:{
            required:"date is required"
        },
        vehicle_number:{
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
    $("#from_district").change(function(){
        var district_id = $(this).val();
        var postid = "id="+district_id;
        $.ajax({
            method: "POST",
            url: "fromplace.php",
            data: postid,
            success: function(city){
                $("#from_city").html(city);
            }
        });
    });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $("#to_district").change(function(){
        var des_district_id = $(this).val();
        var des_postid = "did="+ des_district_id;
        $.ajax({
            method: "POST",
            url: "destinationplace.php",
            data: des_postid,
            success: function(city){
                $("#to_city").html(city);
            }
        });
    });        
});
</script>
</html>
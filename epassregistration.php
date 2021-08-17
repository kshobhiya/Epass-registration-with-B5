<!DOCTYPE html>
<html>
<head>
<title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
<h4 class="text-center" style="color: blue">EPASS REGISTRATION FORM</h4>
<?php 
    require "epassregistrationvalidation.php";
?>
<div class="container" style="padding: 30px 0px 0px 0px">
    <form id="epass_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"    method="POST" enctype="multipart/form-data">
    <div class="row mb-3">
        <label for="first_name" class="col-sm-2 form-label"><b>Firstname:</b></label>
        <div class="col-sm-4">
            <input class="form-control" type="text" name="first_name" value="<?php echo $first_name;?>">
            <span class="error"><?php if(isset($first_name_err)) {echo $first_name_err;}?></span>
        </div>
    </div>
    <div class="row mb-3">
        <label for="last_name" class="col-sm-2 form-label"><b>Lastname:</b></label>
        <div class="col-sm-4">
            <input class="form-control" type="text" name="last_name" value="<?php echo $last_name;?>">
            <span class="error"><?php if(isset($last_name_err)) {echo $last_name_err;}?></span>
        </div>
    </div>
    <div class="row mb-3">
        <label for="email" class="col-sm-2 form-label"><b>Email:</b></label>
        <div class="col-sm-4">
            <input class="form-control" type="text" name="email" value="<?php echo $email;?>"> 
            <span class="error"><?php if(isset($emailErr)) {echo $emailErr;}?></span>
        </div>
    </div>
    <div class="row mb-3">
        <label for="phone_number" class="col-sm-2 form-label"><b>Phone Number:</b></label>
        <div class="col-sm-4">
            <input class="form-control" type="text" name="phone_number" value="<?php echo $phone_number;?>">
            <span class="error"><?php if(isset($phone_number_err)) {echo $phone_number_err;}?></span> 
        </div>
    </div>
    <div id="reason">
        <div class="row mb-3">
            <label for="reason" class="col-sm-2 form-label"><b>Select Reason:</b></label>
            <div class="form-check form-check-inline col-sm-2">
                <input class="form-check-input" type="radio" name="reason" 
                <?php if(isset($reason) && $reason=="marriage"){echo "checked";}?> value="marriage" required>Marriage
            </div>
            <div class="form-check form-check-inline col-sm-2">
                <input class="form-check-input" type="radio" name="reason"
                <?php if(isset($reason) && $reason=="medical emergency"){echo "checked";}?> value="medical emergency" required>Medical Emergency
                <span class="error"><?php if(isset($reason_err)) {echo $reason_err;}?></span>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <label class="form-label"><b>From place of travel:</b></label><br><br>
        <div class="col-md-2">
            <label for="from_district" class="form-label">Select District:</label>
            <select class="form-select form-select-sm" name="from_district" id="from_district" value="<?php echo $from_district;?>">
            <option value="">--Select District--</option>
            <?php
            $conn = mysqli_connect("localhost","root","","form epass");
            $sql="SELECT * FROM `district`";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($result)){
                echo "<option value=".$row["district_id"].">".$row["district"]."</option>";
            }
            ?>
            </select>
            <span class="error"><?php if(isset($from_district_err)){echo $from_district_err;}?></span>
        </div>
        <div class="col-md-2">
            <label for="from_city" class="form-label">Select City:</label>
            <select class="form-select form-select-sm" name="from_city" id="from_city" value="<?php echo $from_city;?>">
            <option value="">--Select city--</option>
            </select>
            <span class="error"><?php if(isset($from_city_err)){echo $from_city_err;}?></span>
        </div>
    </div>
    <div class="row mb-3">
        <label class="form-label"><b>Destination place:</b></label><br><br>
        <div class="col-md-2">
            <label for="to_district" class="form-label">Select District:</label>
            <select class="form-select form-select-sm" name="to_district" id="to_district" value="<?php echo $to_district; ?>">
            <option value="">--Select District--</option>
            <?php
            $conn = mysqli_connect("localhost","root","","form epass");
            $sql="SELECT * FROM `district`";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($result)){
                echo "<option value=".$row["district_id"].">".$row["district"]."</option>";
            }
            ?>
            </select>
            <span class="error"><?php if(isset($to_district_err)){echo $to_district_err;}?></span>
        </div>
        <div class="col-md-2">
            <label for="to_city" class="form-label">Select City:</label>
            <select class="form-select form-select-sm" name="to_city" id="to_city" value="<?php echo $to_city;?>">
            <option value="">--Select City--</option>
            </select>
            <span class="error"><?php if(isset($to_city_err)){echo $to_city_err;}?></span>
        </div>
    </div>
    <div class="row mb-3">
        <label for="date" class="col-sm-2 form-label"><b>Date:</b></label>
        <div class="col-sm-4"> 
            <input class="form-control" type="text" id="date" name="date" placeholder="MM/DD/YYYY" value="<?php echo $date;?>"> 
            <span class="error"><?php if(isset($date_err)){echo $date_err;}?></span>
        </div>
    </div>
    <div class="row mb-3">
        <label for="vehicle_number" class="col-sm-2 form-label"><b>Vehicle number:</b></label>
        <div class="col-sm-4">
            <input class="form-control" type="text" name="vehicle_number" value="<?php echo $vehicle_number;?>">
            <span class="error"><?php if(isset($vehicle_err)) {echo $vehicle_err;}?></span> 
        </div>
    </div>
    <div class="row mb-3">
        <label for="file" class="form-label col-sm-2"><b>Upload document:</b></label>
        <div class="col-sm-4">
            <input class="form-control" type="file"  name="files[]" id="formFile" multiple><br>
            <div class="progress">
                <div class="progress-bar"></div>
            </div><br>
            <div id="upload_status"></div>
            <input type="hidden" id="url" name="url">
        </div>
    </div>
    <p>For proof enter pdf file and the file size should not exceed 2mb</p>
    <button class="btn btn-primary mb-2" type="submit" name="register" value="register">REGISTER</button>
    <p>After registration you will receive mail for successfull registration</p>
    </form>
</div>
<a class="link-primary" href="index.php" style="padding-left: 20px">HOME PAGE</a>
<script type="text/javascript">
$("#epass_form").validate({
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
            required:true
        },
        from_district:{
            required:true
        },
        from_city:{
            required:true
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
        },
        file:{
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
            required:"from district is required"
        },
        from_city:{
            required:"from place is required"
        },
        to_district:{
            required:"destination district is required"
        },
        to_city:{
            required:"destination place is required"
        },
        date:{
            required:"date is required"
        },
        vehicle_number:{
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
    $( "#date" ).datepicker({ minDate: 0, maxDate: "+12M" });
});
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
        var desdistrict_id = $(this).val();
        var despostid = "did="+ desdistrict_id;
        $.ajax({
            method: "POST",
            url: "destinationplace.php",
            data: despostid,
            success: function(destinationcity){
                $("#to_city").html(destinationcity);
            }
        });
    });        
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $("#formFile").change(function(){
        var files=$("#formFile")[0].files;
        var form_data=new FormData();
        var filelength=this.files.length;
        var allowedTypes=['application/pdf', 'image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
        var error="";
        var i;
        for(i=0; i < filelength; i++){
            var file=this.files[i];
            var fileType=file.type;
            var filesize=file.size;
            if(!((fileType==allowedTypes[0]) || (fileType==allowedTypes[1])||(fileType==allowedTypes[2])||(fileType==allowedTypes[3])||(fileType==allowedTypes[4]))){
                alert("please select the valid file pdf/jpeg/png/jpg/gif");
                $("#formFile").val('');
                return false;
            }else if(filesize > 2000000){
                alert("please select the file size less than 2kb");
                $("#formFile").val('');
                return false;
            }
            if(error== ""){
                form_data.append("files[]",files[i]);
                $.ajax({
                    xhr:function(){
                        var xhr=new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress",function(evt){
                            if(evt.lengthComputable){
                                var percentComplete=((evt.loaded/evt.total)*100);
                                $(".progress-bar").width(percentComplete+'%');
                                $(".progress-bar").html(percentComplete+'%');
                            }
                        },false);
                        return xhr;
                    },
                    type:"POST",
                    url:"upload.php",
                    data:form_data,
                    contentType:false,
                    cache:false,
                    processData:false,
                    beforeSend:function(){
                        $(".progress-bar").width('0%');
                        $("#upload_status").html("<P>File uploading</p>");
                    },
                    error:function(){
                        $("#upload_status").html("<p>File upload failure,please try again</p>");    
                    },
                    success:function(data){
                        $("#upload_status").html("<p>File uploaded successfully</p>");
                        document.getElementById("url").value=data;
                    }
                });
            }
        }
    });
});
</script>
</body>
</html>
<?php
require "database.php";
session_start();
$fname = $lname = $email =$mobilenum ="";
$id=$_SESSION["sessionId"];
$sql= "SELECT * FROM `customer` WHERE  `id`='$id'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $fname=$row["firstname"];
        $lname=$row["lastname"];
        $email=$row["email"];
        $mobilenum=$row["phonenumber"];
    }
}
$reason=$place=$dplace=$date=$vehicle="";
function datevalidation($date){
    $d1="06/01/2020";
    $d2="01/01/2023";
    if($date < $d2 && $date > $d1){
        return $date;
    }else{
        echo "invalid date";
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
                $destination="upload/".$filename;
                move_uploaded_file($tmp_name, $destination);
                return $destination;
            }else{
                header("Location:epassregistration.php?error=file size is too large!");
                exit();
                //die("Error:Sorry your file size is too large!file should not exceed 50kb");
            }
        }else{
            header("Location:epassregistration.php?error=there is a error in uploading");
            exit();
            //die("Error:Sorry there is an error in uploading");
        } 
    }else{
        header("Location:epassregistration.php?error=this type of file is not allowed to upload");
        exit();
        //die("Error:Sorry,this type of file is not allowed to upload.Enter png file");
    }
}*/
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST["register"])){
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
        $filename=$_FILES["file"]["name"];
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
            $mobilenumErr="mobile number is required";
        }elseif(!preg_match("/^[\d]+$/",$mobilenum)){
            $mobilenumErr="only numbers are allowed";
        }elseif(empty($_POST["reason"])){
            $reasonErr="reason is required";
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
        }elseif(empty($_FILES["file"]["name"])){
            $fileError="reasonable file for epass should be upload";
        }else{
            if(isset($_FILES["file"]["name"])){
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
                            $filedestination="upload/".$filename;
                            move_uploaded_file($tmp_name, $filedestination);
                            $destination=$filedestination;
                            $sql="INSERT INTO `registration`(`customer id`,`firstname`, `lastname`, `email`, `phonenumber`, `reason`,`district`,`from place`,`destination district`,`destination place`, `date`, `vehicle number`, `file for reason`) VALUES ('$id','$fname','$lname','$email','$mobilenum','$reason','$district','$city','$ddistrict','$dcity','$date','$vehicle','$destination')";
                            $result=mysqli_query($conn,$sql); 
                            if($result == TRUE){
                                $last_id=mysqli_insert_id($conn);
                                header("Location:mail.php?formid=".$last_id);
                            }else{
                                echo "sql error";
                            }
                        }else{
                            $fileErr="file size is too large!";
                        }
                    }else{
                        $fileErr="there is an error in uploading a file";
                    } 
                }else{
                   $fileErr="this type of file is not allowed to upload";
                }
                
            }
        }           
    }
}
?>
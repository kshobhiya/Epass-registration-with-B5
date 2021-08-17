<?php
require "database.php";
session_start();
$first_name = $last_name = $email =$phone_number ="";
$id=$_SESSION["sessionId"];
$sql= "SELECT * FROM `customer` WHERE  `id`='$id'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $first_name=$row["first_name"];
        $last_name=$row["last_name"];
        $email=$row["email"];
        $phone_number=$row["phone_number"];
    }
}
$reason=$from_district=$from_city=$to_district=$to_city=$date=$vehicle_number="";
function datevalidation($date){
    $d1="06/01/2020";
    $d2="01/01/2023";
    if($date < $d2 && $date > $d1){
        return $date;
    }else{
        echo "invalid date";
    }
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST["register"])){
        $first_name=$_POST["first_name"];
        $last_name=$_POST["last_name"];
        $email=$_POST["email"];
        $phone_=$_POST["phone_number"];
        $reason=$_POST["reason"];
        $from_district=$_POST["from_district"];
        $from_city=$_POST["from_city"];
        $to_district=$_POST["to_district"];
        $to_city=$_POST["to_city"];
        $date=$_POST["date"];
        $vehicle_number=$_POST["vehicle_number"];
        $file_name=$_POST["url"];
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
            $email_err="invalid email id";
        }elseif(empty($_POST["phone_number"])){
            $phone_number_err="mobile number is required";
        }elseif(!preg_match("/^[\d]+$/",$phone_number)){
            $phone_number_err="only numbers are allowed";
        }elseif(empty($_POST["reason"])){
            $reason_err="reason is required";
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
        }else{
            $sql="INSERT INTO `registration`(`customer_id`,`first_name`, `last_name`, `email`, `phone_number`, `reason`,`from_district_id`,`from_city_id`,`to_district_id`,`to_city_id`, `date`, `vehicle_number`, `reason_for_travel`) VALUES ('$id','$first_name','$last_name','$email','$phone_number','$reason','$from_district','$from_city','$to_district','$to_city','$date','$vehicle_number','$file_name')";
                            $result=mysqli_query($conn,$sql); 
                            if($result == TRUE){
                                $last_id=mysqli_insert_id($conn);
                                header("Location:mail.php?formid=".$last_id);
                            }else{
                                echo "sql error";
                            }
    
        }           
    }
}
?>
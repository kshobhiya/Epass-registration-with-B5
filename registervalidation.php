<?php
require "database.php"; 
$fname=$lname=$email=$mobileNum=$pass=$cpass="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST["submit"])){
        $fname =$_POST["firstname"];
        $lname=$_POST["lastname"];
        $email =$_POST["email"];
        $mobileNum=$_POST["mobilenum"];
        $pass=$_POST["password"];
        $cpass=$_POST["password"];
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
        }elseif(!preg_match("/^[\d]+$/",$mobileNum)){
            $mobileNumErr="only numbers are allowed";
        }elseif(empty($_POST["password"])){
            $passErr="password is required";
        }elseif(strlen($pass) < 10){
            $passErr="password should contain atleast '10 characters,in that 1 capital letter,1small letter,1number and 1 special character'";
        }elseif(!preg_match("/[A-Z]+/",$pass)){
            $passErr="password should contain atleast '10 characters,in that 1 capital letter,1small letter,1number and 1 special character'";
        }elseif(!preg_match("/[a-z]+/",$pass)){
            $passErr="password should contain atleast '10 characters,in that 1 capital letter,1small letter,1number and 1 special character'";
        }elseif(!preg_match("/[0-9]+/",$pass)){
            $passErr="password should contain atleast '10 characters,in that 1 capital letter,1small letter,1number and 1 special character'";
        }elseif(!preg_match("/[\W]+/",$pass)){
            $passErr="password should contain atleast '10 characters,in that 1 capital letter,1small letter,1number and 1 special character'";
        }elseif(empty($_POST["cpassword"])){
            $cpassErr="confirm password is required";
        }elseif($pass != $cpass){
            echo "password should be same";
        }else{
            $sql ="SELECT * FROM `user` WHERE  `email`='$email'";
            $result =mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0){
                echo "user already exists";
            }else{
                $sql = "INSERT INTO `customer`(`firstname`, `lastname`, `email`, `phonenumber`, `password`) 
                        VALUES ('$fname','$lname','$email','$mobileNum','$pass')";
                $result=mysqli_query($conn,$sql);    
                if($result == TRUE){
                    header("Location: login.php");
                }else{
                    echo "error:".$sql;
                }
            }
        }
    }
}
?>
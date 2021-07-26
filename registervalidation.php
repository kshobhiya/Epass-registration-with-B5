<?php
require "database.php"; 
$first_name=$last_name=$email=$phone_number=$password=$confirm_password="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST["submit"])){
        $first_name =$_POST["first_name"];
        $last_name=$_POST["last_name"];
        $email =$_POST["email"];
        $phone_number=$_POST["phone_number"];
        $password=$_POST["password"];
        $confirm_password=$_POST["confirm_password"];
        if(empty($_POST["first_name"])){
            $first_name_err="name is required";
        }elseif(!preg_match("/^[a-zA-Z\s]+$/",$first_name)){
            $first_name_err="only letters are allowed";
        }elseif(empty($_POST["last_name"])){
            $last_name_err="name is required";
        }elseif(!preg_match("/^[a-zA-Z\s]+$/",$last_name)){
            $last_name_err="only letters are allowed";
        }elseif(empty($_POST["email"])){
            $email_err="email is required";
        }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $email_err="invalid emailid";
        }elseif(empty($_POST["phone_number"])){
            $phone_number_err="mobile number is required";
        }elseif(!preg_match("/^[\d]+$/",$phone_number)){
            $phone_number_err="only numbers are allowed";
        }elseif(empty($_POST["password"])){
            $password_err="password is required";
        }elseif(strlen($password) < 10){
            $password_err="password should contain atleast '10 characters,in that 1 capital letter,1small letter,1number and 1 special character be must'";
        }elseif(!preg_match("/[A-Z]+/",$password)){
            $password_err="password should contain atleast '10 characters,in that 1 capital letter,1small letter,1number and 1 special character be must'";
        }elseif(!preg_match("/[a-z]+/",$password)){
            $password_err="password should contain atleast '10 characters,in that 1 capital letter,1small letter,1number and 1 special character be must'";
        }elseif(!preg_match("/[0-9]+/",$password)){
            $password_err="password should contain atleast '10 characters,in that 1 capital letter,1small letter,1number and 1 special character be must'";
        }elseif(!preg_match("/[\W]+/",$password)){
            $password_err="password should contain atleast '10 characters,in that 1 capital letter,1small letter,1number and 1 special character be must'";
        }elseif(empty($_POST["confirm_password"])){
            $confirm_password_err="confirm password is required";
        }elseif($password != $confirm_password){
            echo "password should be same";
        }else{
            $sql ="SELECT * FROM `customer` WHERE  `email`='$email'";
            $result =mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0){
                echo "user already exists";
            }else{
                $sql = "INSERT INTO `customer`(`first_name`, `last_name`, `email`, `phone_number`, `password`) 
                        VALUES ('$first_name','$last_name','$email','$phone_number','$password')";
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
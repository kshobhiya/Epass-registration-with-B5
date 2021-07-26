<?php
    require "database.php";
    if(isset($_GET["formid"])){
   	    $id = $_GET["formid"];
   	    $sql="DELETE FROM `registration` WHERE `id`= '$id'";
        $result=mysqli_query($conn,$sql);
        if($result === true){
            header("Location:index.php?success=record deleted");
        }else{
            echo "sql error";
        }
    }
?>
<?php
    $conn = mysqli_connect("localhost","root","","form epass");
    if($_POST["did"]){
        $id=$_POST["did"];
        if($id == 0){
 		       echo "<option>--Select City--</option>";
        }else{
            $sql="SELECT * FROM `cities` WHERE `District_id`='$id'";
            $result=mysqli_query($conn,$sql); ?>
            <option>--Select City--</option>
            <?php
            while($row=mysqli_fetch_array($result)){
                echo "<option value=".$row["city_id"].">".$row["cities"]."</option>";
            }
        }
    }
?>
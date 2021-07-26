<?php
    $conn = mysqli_connect("localhost","root","","form epass");
    if($_POST["id"]){
        $id=$_POST["id"];
        if($id == 0){
            echo "<option value=''>--Select City--</option>";
        }else{
            $sql="SELECT * FROM `cities` WHERE `district_id`='$id'";
            $result=mysqli_query($conn,$sql); ?>
            <option value="">--Select City--</option>
            <?php
            while($row=mysqli_fetch_array($result)){
                echo "<option value=".$row["city_id"].">".$row["cities"]."</option>";
            }
        }
    }
?>
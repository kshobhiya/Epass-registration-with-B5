<?php 
session_start();
require "database.php";
if(isset($_SESSION["sessionId"])){
    $id=$_SESSION["sessionId"];
    $sql="SELECT registration.id, registration.first_name, registration.last_name, registration.email, registration.phone_number, registration.reason, registration.date, registration.vehicle_number, registration.reason_for_travel, district.district as from_district, cities.cities as from_city, des_district.district as to_district, des_cities.cities as to_city
        FROM `registration`
        JOIN `district` ON registration.from_district_id = district.district_id
        JOIN `cities` ON registration.from_city_id = cities.city_id
        JOIN `district` as des_district ON registration.to_district_id = des_district.district_id
        JOIN `cities` as des_cities ON registration.to_city_id = des_cities.city_id
        WHERE `customer_id`='$id'";
    $result=mysqli_query($conn,$sql);
    $recordsTotal=mysqli_num_rows($result);
    if(isset($_POST["search"]["value"])){
        $search_value=$_POST["search"]["value"];
        $sql .= "AND (first_name LIKE '% ".$search_value."%'";
        $sql .= "OR last_name LIKE '% ".$search_value."%'";
        $sql .= "OR email LIKE '% ".$search_value."%'";
        $sql .= "OR phone_number LIKE'% ".$search_value."%'";
        $sql .= "OR reason LIKE'% ".$search_value."%'";
        $sql .= "OR from_city LIKE'% ".$search_value."%'";
        $sql .= "OR to_city LIKE'% ".$search_value."%'";
        $sql .= "OR date LIKE '% ".$search_value."%'";
        $sql .= "OR vechicle_number LIKE'% ".$search_value."%')";
    }
    if(isset($_POST["order"])){
        $column=$_POST["order"][0]["column"];
        $order=$_POST["order"][0][dir];
        $sql .= "ORDER BY ".$column." ".$order;
    }else{
        $sql .= "ORDER BY `id` ASC";
    }
    if(isset($_POST["start"])){
        if($_POST["start"] && $_POST["length"] != -1){
            $sql .= "LIMIT(".$_POST["start"]. " , ".$_POST["length"].")";
        }
    }
    $data=array();
    $result=mysqli_query($conn,$sql);
    $recordsFiltered=mysqli_num_rows($result);
    while($row=mysqli_fetch_assoc($result)){
        $edit ="<button class='btn btn-success'> <a class='link-dark' href='update.php?formid=".$row["id"]."'> EDIT </a> </button><br>";
        $delete ="<button class='btn btn-danger'> <a class='link-dark' href='delete.php?formid=".$row["id"]."'> DELETE </a> </button><br>";
        //$delete="<button class="btn btn-danger" type='button' id='delete'>DELETE</button>";
        $subarray=array();
        $subarray[]=$row["id"]; 
        $subarray[]=$row["first_name"];
        $subarray[]=$row["last_name"];
        $subarray[]=$row["email"];
        $subarray[]=$row["phone_number"];
        $subarray[]=$row["reason"];
        $subarray[]=$row["from_city"];
        $subarray[]=$row["to_city"];
        $subarray[]=$row["date"];
        $subarray[]=$row["vehicle_number"];
        $subarray[]=$row["reason_for_travel"];
        $subarray[]=$edit."<br>".$delete;
        $data[]=$subarray;
    }
    $output=array(
        //"draw" => intval($draw),
        "recordTotal" => intval($recordsTotal),
        "recordFiltered" => intval($recordsFiltered),
        "data" => $data,
    );   
    echo json_encode($output);
}
?> 
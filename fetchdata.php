<?php 
session_start();
require "database.php";
if(isset($_SESSION["sessionId"])){
    $id=$_SESSION["sessionId"];
    $sql="SELECT * FROM `Registration` WHERE `customer id`='$id'";
    $result=mysqli_query($conn,$sql);
    $recordsTotal=mysqli_num_rows($result);
    if(isset($_POST["search"]["value"])){
        $search_value=$_POST["search"]["value"];
        $sql .= "AND (firstname LIKE '% ".$search_value."%'";
        $sql .= "OR lastname LIKE '% ".$search_value."%'";
        $sql .= "OR email LIKE '% ".$search_value."%'";
        $sql .= "OR phonenumber LIKE'% ".$search_value."%'";
        $sql .= "OR reason LIKE'% ".$search_value."%'";
        $sql .= "OR from place LIKE'% ".$search_value."%'";
        $sql .= "OR destination place LIKE'% ".$search_value."%'";
        $sql .= "OR date LIKE '% ".$search_value."%'";
        $sql .= "OR vechicle number LIKE'% ".$search_value."%')";
    }
    if(isset($_POST["order"])){
        $column=$_POST["order"][0]["column"];
        $order=$_POST["order"][0][dir];
        $sql .= "ORDER BY ".$column." ".$order;
    }else{
        $sql .= "ORDER BY `form id` ASC";
    }
    /*if($_POST["length"] != -1){
    $sql .= "LIMIT".$_POST["start"]. " , ".$_POST["length"]. "  ";
    }*/
    $data=array();
    $result=mysqli_query($conn,$sql);
    $recordsFiltered=mysqli_num_rows($result);
    while($row=mysqli_fetch_assoc($result)){
        $fromplace=$row["from place"];
        $destinationplace=$row["destination place"];
        $sqlquery1="SELECT `cities` FROM `cities` WHERE `city_id`=$fromplace";
        $result1=mysqli_query($conn,$sqlquery1);
        while($row1=mysqli_fetch_array($result1)){ 
            $startarea=$row1["cities"];
        }
        $sqlquery2="SELECT `cities` FROM `cities` WHERE `city_id`=$destinationplace";
        $result2=mysqli_query($conn,$sqlquery2);
        while($row2=mysqli_fetch_array($result2)){ 
            $destinationarea=$row2["cities"];
        }
        $edit ="<button> <a href='update.php?formid=".$row["form id"]."'> EDIT </a> </button><br>";
        $delete ="<button> <a href='delete.php?formid=".$row["form id"]."'> DELETE </a> </button><br>";
        //$delete="<button type='button' id='delete'>DELETE</button>";
        $subarray=array();
        $subarray[]=$row["form id"]; 
        $subarray[]=$row["firstname"];
        $subarray[]=$row["lastname"];
        $subarray[]=$row["email"];
        $subarray[]=$row["phonenumber"];
        $subarray[]=$row["reason"];
        $subarray[]=$startarea;
        $subarray[]=$destinationarea;
        $subarray[]=$row["date"];
        $subarray[]=$row["vehicle number"];
        $subarray[]=$row["file for reason"];
        $subarray[]=$edit."<br>".$delete;
        $data[]=$subarray;
    } 
    $output=array(
        //"draw" => intval($_POST["draw"]),
        "recordTotal" => intval($recordsTotal),
        "recordFiltered" => intval($recordsFiltered),
        "data" => $data,
    );   
    echo json_encode($output);
}
?> 
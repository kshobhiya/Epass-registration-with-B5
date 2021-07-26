<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require "vendor/autoload.php";
    require "database.php";
    if(isset($_GET["formid"])){
        $form_id=$_GET["formid"];
        $sql= "SELECT registration.id, registration.first_name, registration.last_name, registration.email, registration.phone_number, registration.reason, registration.date, registration.vehicle_number, registration.reason_for_travel, district.district as from_district, cities.cities as from_city, des_district.district as to_district, des_cities.cities as to_city
            FROM `registration`
            JOIN `district` ON registration.from_district_id = district.district_id
            JOIN `cities` ON registration.from_city_id = cities.city_id
            JOIN `district` as des_district ON registration.to_district_id = des_district.district_id
            JOIN `cities` as des_cities ON registration.to_city_id = des_cities.city_id
            WHERE `id`='$form_id'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            while($row=mysqli_fetch_assoc($result)){
                $first_name=$row["first_name"];
                $last_name=$row["last_name"];
                $email=$row["email"];
                $phone_number=$row["phone_number"];
                $reason=$row["reason"];
                $from_city=$row["from_city"];
                $to_city=$row["to_city"];
                $date=$row["date"];
                $vehicle_number=$row["vehicle_number"];
            }
        }
    }
    $mail = new PHPMailer(true);
    try{
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host="smtp.gmail.com";
        $mail->SMTPAuth="true";
        $mail->SMTPSecure="tls";
        $mail->Port="587";
        $mail->Username="programmingcontrol02@gmail.com";
        $mail->Password="programming02";
        $mail->isHTML(true);
        $mail->Subject="Epass Registration Confirmation";
        $mail->setFrom("programmingcontrol02@gmail.com");
        $mail->Body=" Epass has been registered successfully<br>
                    <b>Name:</b>$first_name $last_name<br>
                    <b>Phone number:</b>$phone_number<br>
                    <b>Date:</b>$date<br>
                    <b>Reason for travel:</b>$reason<br>
                    <b>From place:</b>$from_city<br>
                    <b>Destination place:</b>$to_city<br>
                    <b>vechile number:</b>$vehicle_number<br>
                    Epass has been valid for 5days from the date of travel registered.";
        $mail->addAddress($email);
        $mail->Send();
        header("Location:index.php?success=mail sent successfully");
    }catch (Exception $e){
        header("Location:index.php?error=failure in sending mail");
    }
?>
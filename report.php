<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.css">
</head>
<body>
	<script src="bootstrap-5.0.2-dist/js/bootstrap.js"></script>
	<?php require "database.php";?>
	<h3 class="text-center" style="color: blue;padding-top: 20px;padding-right:60px">REPORT</h3>
	<a  class="link-primary" style="padding-left: 20px" href="index.php"><b>HOME PAGE</b></a>
	<div class="container" style="padding:40px 0px 10px 10px">
		<form id="report" action="report.php" method="POST">
		<div class="row mb-3">
			<label for="start_date" class="form-label col-sm-1"><b>StartDate</b></label>
			<div class="col-sm-3">
				<input class="form-control" style="border: 1px solid black"  id="start_date" type="text" name="start_date" placeholder="mm/dd/yy" value="<?php if(isset($_POST["start_date"])){echo $_POST["start_date"];}?>">
			</div>
			<label for="end_date" class="col-sm-1"><b>End Date</b></label>
			<div class="col-sm-3">
			<input class="form-control" style="border: 1px solid black" id="end_date" type="text" name="end_date" placeholder="mm/dd/yy" value="<?php if(isset($_POST["end_date"])){echo $_POST["end_date"];}?>">
			</div>
		</div>
		<div class="row mt-3 mb-3">
			<button class="btn btn-primary col-sm-1" name="submit" value="submit">SUBMIT</button>
		</div>
		</form>
	</div>
	<table class="table table-striped" id="report_table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Email id</th>
				<th>Date</th>
				<th>From place</th>
				<th>To place</th>
			</tr>
		</thead>
	<?php 
		if(isset($_POST["submit"]) && !empty($_POST["start_date"]) && !empty($_POST["end_date"])){
			$start_date=$_POST["start_date"];
			$end_date=$_POST["end_date"];
			$sql="SELECT registration.first_name,registration.email, registration.date,cities.cities as from_city,	des_cities.cities as to_city 
				FROM `registration` 
				JOIN `cities` ON registration.from_city_id = cities.city_id 
				JOIN `cities` as des_cities ON registration.to_city_id = des_cities.city_id
				WHERE date BETWEEN '$start_date' AND '$end_date'
				ORDER BY date DESC";
			$result=mysqli_query($conn,$sql);
			$total_records=mysqli_num_rows($result);
			?>
			<div class="card" style="width: 10rem;margin-left: 100px; margin-bottom: 40px;border:1px solid black">
				<div class="card-body"><?php
					echo "<div id='count'>COUNT: <b>".$total_records."</b></div>";
			?>
			    </div>
			</div>
			<?php
			while($row=mysqli_fetch_assoc($result)){
				echo "<tr>";
				echo "<td>".$row["first_name"]."</td>";
				echo "<td>".$row["email"]."</td>";
				echo "<td>".$row["date"]."</td>";
				echo "<td>".$row["from_city"]."</td>";
				echo "<td>".$row["to_city"]."</td>";
				echo "</tr>";
			}
			
		}else{
			$sql="SELECT registration.first_name,registration.email, registration.date,cities.cities as from_city,des_cities.cities as to_city ,date_format(date, '%m%d%y')
				FROM `registration` 
				JOIN `cities` ON registration.from_city_id = cities.city_id 
				JOIN `cities` as des_cities ON registration.to_city_id = des_cities.city_id 
				WHERE date < CURRENT_DATE - INTERVAL 30 day
				ORDER BY date DESC";
			$result=mysqli_query($conn,$sql);
			$total_records=mysqli_num_rows($result);
			?>
			<div class="card" style="width: 10rem;margin-left: 110px; margin-bottom: 40px;border:1px solid black">
				<div class="card-body"><?php
					echo "<div id='count'>COUNT: <b>".$total_records."</b></div>";
			?>
			    </div>
			</div>
			<?php
			while($row=mysqli_fetch_assoc($result)){
				echo "<tr>";
				echo "<td>".$row["first_name"]."</td>";
				echo "<td>".$row["email"]."</td>";
				echo "<td>".$row["date"]."</td>";
				echo "<td>".$row["from_city"]."</td>";
				echo "<td>".$row["to_city"]."</td>";
				echo "</tr>";
			}
		}
	?>
	</table>
</body>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
	$( function(){
		$( "#start_date" ).datepicker({ minDate: "-12M", maxDate: "+12M" });
  	});
</script>
<script type="text/javascript">
	$( function(){
		$( "#end_date" ).datepicker({ minDate: "-12M", maxDate: "+12M" });
  	});
</script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#report_table').DataTable({
    	"serverside":true,
        "processing":true,
        "paging": true,
        "searching":true,
        "order":[],
        "columns":[
        	{data:"Name"},
        	{data:"Email id"},
        	{data:"Date"},
        	{data:"From place"},
        	{data:"To place"}
        ],
        "dom":'Bfrtip',
       	"buttons":[
        	'pdf',
        	'excel'
        ]
    });
});
</script>
</html>
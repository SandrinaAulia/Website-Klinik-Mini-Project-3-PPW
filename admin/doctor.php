<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Total Doctors</title>
</head>
<body>

	<?php
	include("../include/header.php");
	include("../include/connection.php");
	?>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left: -30px;">
					<?php
					include("sidenav.php");
					?>
				</div>
				<div class="col-md-10">
					<h5 class="text-center mt-4 my-4">Total Dokter</h5>
					<?php
						$query = "SELECT * FROM doctors WHERE status='Approved' ORDER BY data_reg ASC";
						$res = mysqli_query($connect,$query);
						$output = "";

$output .="

	<table class='table table-bordered'>
		<tr>
			<th>ID</th>
			<th>Nama Depan</th>
			<th>Nama Belakang</th>
			<th>Username</th>
			<th>Jenis Kelamin</th>
			<th>No Telp</th>
			<th>Gaji</th>
			<th>Tanggal Register</th>
			<th>Action</th>
		</tr>
";


if(mysqli_num_rows($res) < 1){
	$output .= "
		<tr>
			<td colspan='10' class='text-center'>No job Request Yet.</td>
		</tr>
	";
}

while ($row = mysqli_fetch_array($res)) {
	
	$output .="

		<tr>
			<td>".$row['id']."</td>
			<td>".$row['firstname']."</td>
			<td>".$row['surname']."</td>
			<td>".$row['username']."</td>
			<td>".$row['gender']."</td>
			<td>".$row['phone']."</td>
			<td>".$row['salary']."</td>
			<td>".$row['data_reg']."</td>	
			<td>
			<a href='edit.php?id=".$row['id']."'>
				<button class='btn btn-info'>Edit</button>
			</a>
			</td>
	";
}

$output .="
	
	</tr>
	</table>

";

echo $output;
					?>
				</div>
			</div>
		</div>
	</div>


	<footer class="bg-blue text-center">
  	<!-- Copyright -->
  	<div class="text-center p-3 bg-info">
  	  <a class="text-white" href="index.php">  Copyright 2024 - All Right Reserved © Radiant Health Clinic </a>
 	 </div>
  	<!-- Copyright -->
	</footer>

	
</body>
</html>
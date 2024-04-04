


<!DOCTYPE html>
<html>
<head>
	<title> Klinik </title>
</head>
<body style="background-image: url(img/hosp.bg.jpg); background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">

	<?php
	include("include/header.php");
	?>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-4 my-5">
				<div class="card">
					<img src="img/pasien.png" class="card-img-top" alt="Patient Image" style= "height : 50vh">
					<div class="card-body">
						<h6 class="card-title text-center">Register Pasien</h6>
						<a href="account.php" class="btn btn-primary d-block mx-auto">Create Account</a>
					</div>
				</div>
			</div>
			<div class="col-md-4 my-5">
				<div class="card">
					<img src="img/apply.jpg" class="card-img-top" alt="Apply Image" style = "width : 50vh;">
					<div class="card-body">
						<h6 class="card-title text-center">Apply Job Dokter</h6>
						<a href="apply.php" class="btn btn-primary d-block mx-auto">Apply Now</a>
					</div>
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
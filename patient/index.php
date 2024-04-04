<?php 
session_start();
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Dashboard Pasien</title>
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
 					<h5 class="my-3">Dashboard Pasien</h5>

 					<div class="col-md-12">
 						<div class="row">
 								<div class="col-md-4 bg-info" style="height: 150px;">
 									<div class="col-md-12">
 										<div class="row">
 											<div class="col-md-8">
 												<h5 class="text-white my-4">Profil saya</h5>
 											</div>
 											<div class="col-md-4">
 												<a href="profile.php">
 													<i class="fa fa-user-circle fa-3x my-4" style="color: white;"></i>
 												</a>
 											</div>
 										</div>
 									</div>
 								</div>
 								<div class="col-md-4 bg-warning mx-1" style="height: 150px;">
 									<div class="col-md-12">
 										<div class="row">
 											<div class="col-md-8">
 												<h5 class="text-white my-4">Atur Jadwal Temu</h5>
 											</div>
 											<div class="col-md-4">
 												<a href="appointment.php">
 													<i class="fa fa-calendar fa-3x my-4" style="color: white;"></i>
 												</a>
 											</div>
 										</div>
 									</div>
 								</div>
 								<div class="col-md-3 bg-success" style="height: 150px;">
 									<div class="col-md-12">
 										<div class="row">
 											<div class="col-md-8">
 												<h5 class="text-white my-4">Invoice Saya</h5>
 											</div>
 											<div class="col-md-4">
 												<a href="invoice.php">
 													<i class="fas fa-file-invoice-dollar fa-3x my-4" style="color: white;"></i>
 												</a>
 											</div>
 										</div>
 									</div>
 								</div>
 						</div>
 					</div>


 					<?php 

 						if (isset($_POST['send'])) {
 							$title = $_POST['title'];
 							$message = $_POST['message'];

 							if (empty($title)) {
 								
 							}else if(empty($message)){

 							}else {
 								$user = $_SESSION['patient'];
 								$query = "INSERT INTO report(title,message,username,date_send) VALUES('$title','$message','$user',NOW())";

 								$res = mysqli_query($connect,$query);

 								if($res){

 									echo "<script>alert('You have sent your report')</script>";
 								}
 							}

 						}

 					 ?>

 					<div class="col-md-12">
 						<div class="row">
 							<div class="col-md-11 jumbotron bg-info my-2 mx-1">
 								<h5 class="text-center mt-1">Laporan Pengaduan</h5>
 								<form method="post">
 									<label>Judul</label>
 									<input type="text" name="title" autocomplete="off" class="form-control" placeholder="Tuliskan judul anda disini">
 									<label>Pesan</label>
 									<input type="text" name="message" autocomplete="off" class="form-control" placeholder="Ketikkan pesan">
 									<input type="submit" name="send" value="Send Report" class="btn btn-success  d-block mx-auto mt-4">
 								</form>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>




</body>
</html>
<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Doctor</title>
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
				<h5 class="text-center mt-4 my-4">Edit Dokter</h5>
				<?php
					if (isset($_GET['id'])) {
						$id = $_GET['id'];

						$query = "SELECT * FROM doctors WHERE id='$id'";
						$res = mysqli_query($connect,$query);

						$row = mysqli_fetch_array($res);
					}
				?>
				<div class="row">
				<div class="col-md-8">
    <h5 class="text-center my-3">Detail Dokter</h5>
    <table class="table">
        <tbody>
            <tr>
                <td>ID</td>
                <td><?php echo $row['id']; ?></td>
            </tr>
            <tr>
                <td>Nama Depan</td>
                <td><?php echo $row['firstname']; ?></td>
            </tr>
            <tr>
                <td>Nama Belakang</td>
                <td><?php echo $row['surname']; ?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><?php echo $row['username']; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $row['email']; ?></td>
            </tr>
            <tr>
                <td>No Telp</td>
                <td><?php echo $row['phone']; ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td><?php echo $row['gender']; ?></td>
            </tr>
            <tr>
                <td>Tanggal Register</td>
                <td><?php echo $row['data_reg']; ?></td>
            </tr>
            <tr>
                <td>Gaji</td>
                <td><?php echo $row['salary']; ?> Rupiah</td>
            </tr>
        </tbody>
    </table>
</div>
					<div class="col-md-4">
						<h5 class="text-center mb-4">Update Salary</h5>
						<?php
						if(isset($_POST['update']))
						{
							$salary = $_POST['salary'];

							$q = "UPDATE doctors SET salary='$salary' WHERE id='$id'";

							mysqli_query($connect,$q);
						}


						?>
						<form method="post">
							<label> Enter Doctors Salary</label>
							<input type="number" name="salary" class="form-control" autocomplete="off" placeholder="Enter Doctors Salary" value="<?php echo $row['salary']?>">
							<input type="submit" name="update" class="btn btn-info my-3" value="Update Salary">
						</form>
					</div>
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
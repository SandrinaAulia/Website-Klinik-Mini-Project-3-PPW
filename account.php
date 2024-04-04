<?php
include("include/connection.php");

if (isset($_POST['create'])) {
	
	$fname = $_POST['fname'];
	$sname = $_POST['sname'];
	$uname = $_POST['uname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$gender = $_POST['gender'];
	$pass = $_POST['pass'];
	$con_pass = $_POST['con_pass'];

	$errors = array();

	if (empty($fname)) {
		$errors['fname'] = "Enter Firstname";
	} elseif (empty($sname)) {
		$errors['sname'] = "Enter Surname";
	} elseif (empty($uname)) {
		$errors['uname'] = "Enter Username";
	} elseif (empty($email)) {
		$errors['email'] = "Enter Email";
	} elseif (empty($phone)) {
		$errors['phone'] = "Enter Phone";
	} elseif (empty($gender)) {
		$errors['gender'] = "Select Gender";
	} elseif (empty($pass)) {
		$errors['pass'] = "Enter Password";
	} elseif ($con_pass != $pass) {
		$errors['con_pass'] = "Both Passwords do not match";
	}

	if (empty($errors)) {
		// Sanitize input to prevent SQL injection
		$fname = mysqli_real_escape_string($connect, $fname);
		$sname = mysqli_real_escape_string($connect, $sname);
		$uname = mysqli_real_escape_string($connect, $uname);
		$email = mysqli_real_escape_string($connect, $email);
		$phone = mysqli_real_escape_string($connect, $phone);
		$gender = mysqli_real_escape_string($connect, $gender);
		$pass = mysqli_real_escape_string($connect, $pass);

		$query = "INSERT INTO patient (firstname, surname, username, email, gender, phone, password, date_reg, profile) 
					VALUES ('$fname', '$sname', '$uname', '$email', '$gender', '$phone', '$pass', NOW(), 'patient.jpg')"; 

		$res = mysqli_query($connect, $query);

		if ($res) {
			header("Location: patientlogin.php");
			exit; // Ensure no further execution after redirect
		} else {
			echo "<script>alert('Failed.')</script>";
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Create Account</title>
</head>
<body style="background-image: url(img/background.jpg);background-size:cover;background-repeat: no-repeat;">


	<?php
	include("include/header.php");
	?>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 my-2 jumbotron">
					<h5 class="text-center text-info my-2">Create Account</h5>
					<form method="post">
						<div class="form-group">
							<label>Nama Depan</label>
							<input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Masukkan nama depan anda">
						</div>
						<div class="form-group">
							<label>Nama Belakang</label>
							<input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Masukkan nama belakang anda">
						</div>
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Masukkan username anda">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="text" name="email" class="form-control" autocomplete="off" placeholder="Masukkan email anda">
						</div>
						<div class="form-group">
							<label>No Telp</label>
							<input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Masukkan no telp anda">
						</div>
						<div class="form-group">
							<label>Gender</label>
							<select name="gender" class="form-control">
								<option value="">Select Gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Masukkan password">
						</div>
						<div class="form-group">
							<label>Confirm Password</label>
							<input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Konfirmasi password">
						</div>
						<input type="submit" name="create" value="Create Account" class="btn btn-success">
						<p>I already have an account. <a href="patientlogin.php">Login</a></p>
					</form>
				</div>
				<div class="col-md-3">
					
				</div>
			</div>
		</div>
	</div>


</body>
</html>
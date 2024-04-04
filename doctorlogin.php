<?php
session_start();
	include("include/connection.php");

	if(isset($_POST['login']))
	{
		$uname = $_POST['uname'];
		$password = $_POST['pass'];
	
		$error = array();

		$q = "SELECT * FROM doctors WHERE username='$uname' AND password='$password'";
		$qq = mysqli_query($connect,$q);

		$row = mysqli_fetch_array($qq);


		if(empty($uname))
		{
			$error['login']="Enter Username";
		}else if(empty($password)){
			$error['login'] = "Enter Password";
		}else if ($row['status'] == "Pending"){
			$error['login'] = "Please wait for admin to confirm";
		}else if ($row['status'] == "Rejected"){
			$error['login'] = "Try again later";
		}	

		if(count($error)==0){

			$query = "SELECT * FROM doctors WHERE username='$uname' AND password='$password'";
			$res = mysqli_query($connect,$query);

			if(mysqli_num_rows($res))
			{
				echo "<script> alert('Done')</script>";
				$_SESSION['doctor'] = $uname;
				header("Location:doctor/index.php");
			}else{
				echo "<script> alert('Failed.')</script>";
			}
		}
	}

if (isset($error['login']))
{
	$l = $error['login'];

	$show = "<h5 class='text-center alert alert-danger'>$l</h5>";
}else{
	$show = "";
}



?>



<!DOCTYPE html>
<html>
<head>
	<title> Halaman Login Dokter </title>
</head>
<body style="background-image: url(img/bg1.jpg); background-size: cover; background-repeat: no-repeat;">

	<?php
	include("include/header.php");
	?>

	<div class="container-fluid">
		<div class="row justify-content-center align-items-center">
			<div class="col-md-3 my-5 pb-3" style="background: white;">
				<img src="img/doctor.png" class="col-md-12">
				<h5 class="text-center my-3"> Login Dokter </h5>
				<form method="post">
					<p class="text-danger text-center"><?php if ($_SERVER['REQUEST_METHOD'] === 'POST'){echo $error['login'] ;}?></p>
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
					</div>
					<p>I dont have an account <a href="apply.php">Apply Now!</a></p>

					<input type="submit" name="login" class="btn btn-primary mt-2 d-block mx-auto" value="Login">
				</form>
			</div>
		</div>
	</div>


</body>
</html>
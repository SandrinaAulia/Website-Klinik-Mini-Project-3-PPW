<?php
session_start();
include("include/connection.php");

if(isset($_POST['login'])){

	$uname = $_POST['uname'];
	$pass = $_POST['pass'];


	if(empty($uname)){
		echo "<script>alert('Enter Username')</script>";
	}else if (empty($pass)){
		echo "<script>alert('Enter Password')</script>";
	}else {
		$query = "SELECT * FROM patient WHERE username='$uname' AND password='$pass'";
		$res = mysqli_query($connect,$query);

		if(mysqli_num_rows($res)==1){
			header("Location: patient/index.php");

			$_SESSION['patient'] = $uname;
		}else{
			echo "<script>alert('Invalid Account')</script>";
		}
	}


}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login Pasien</title>
</head>
<body style="background-image: url(img/bg1.jpg);background-size:cover;background-repeat: no-repeat;">


	<?php
	include("include/header.php");
	?>

<div class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-3 my-5 pb-3" style="background: white;">
            <img src="img/loginpatient.png" class="col-md-12">
            <h5 class="text-center my-3">Login Pasien</h5>
            <form method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                </div>
                <p>I don't have an account. <a href="account.php">Create Account</a></p>
                <input type="submit" name="login" class="btn btn-success d-block mx-auto" value="Login">
            </form>
        </div>
    </div>
</div>



</body>
</html>
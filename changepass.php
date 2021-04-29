<!DOCTYPE html>

<?php
include("php/connect.php");
session_start();
if(isset($_POST['login']))
{

	$currpass = mysqli_real_escape_string($db,$_POST['currpassword']);
	$newpass = mysqli_real_escape_string($db,$_POST['newpassword']);
	$newpass1 = mysqli_real_escape_string($db,$_POST['password2']);
	if($newpass != $newpass1){
		echo "<script>alert('password not matched!!')</script>";
	}
	else
	{
		
		//echo "\n".$pass; 
		$userid = $_SESSION["userid"];
		
		$sql = "select `Password` from `user_master` WHERE `User_ID`='$userid'";                     	
		$result1 = mysqli_query($db,$sql); 
		if (!$result1)
		{
			echo("ERRROIR++++>>" . mysqli_error($db));
		}           
		$row = mysqli_fetch_array($result1);		
		if($row['Password'] == $currpass)
		{
			$passupdate = "UPDATE `user_master` SET `Password`='$newpass' WHERE `User_ID` = '$userid'";
			$result2 = mysqli_query($db,$passupdate); 

		}
		
		 header('location:dashboard.html');
		
	}
}
?>


<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="changepass.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<title></title>
</head>
<body>
	<div id="a">
		<h1 id="h1_id">Change Password</h1>
		
		<!--<button type="button" class="btn btn-primary" id="loginbtn1" onclick="abcd()">Submit</button>-->
	</div>

	<div id="b">
		<img src="img/cpbg1.png" id="img1">
	</div>
		

<div id="c">
		<!--<div id="flip_card">-->
			<div class="card" style="width:400px;" id="d">
				<div class="card-body">
					<h4 class="card-title" id="e">Change Password</h4>
					<p class="card-text"><b>It's a good Idea to use a strong password that you don't use elsewhere.</b></p>
					<form action="" method = "post">
						<!--<div class="form-group">
							<label for="email">Email address:</label>
							<input type="email" class="form-control" id="email" name="email">
						</div>-->
						<div class="form-group">
							<label for="pwd"><b>Current Password:</b></label>
							<input type="password" class="form-control" id="pwd" name="currpassword">
						</div>

						<div class="form-group">
							<label for="pwd1"><b>New Password:</b></label>
							<input type="password" class="form-control" id="pwd1" name="newpassword">
						</div>

						<div class="form-group">
							<label for="pwd2"><b>Confirm New Password:</b></label>
							<input type="password" class="form-control" id="pwd2" name="password2">
						</div>

						<input type="submit" class="btn btn-primary" name="login" value="Submit" id="loginbtn1">
						<!--<p class="card-text" id="e">OR</p>				  
						<button type="button" class="btn btn-primary" id="signupbtn" onclick="abcd()">Save Changes</button>
						<p class="card-text" id="f">Forgot password?</p>-->
					</form>
				</div>	
			</div>
</div>


</body>
</html>


<!-- $sql = "select `Password` from user_master WHERE User_ID=2"; -->
<!-- $sql = "UPDATE `user_master` SET `Password`=\"text\" WHERE User_ID = 2"; -->
	<!DOCTYPE html>

	<?php
	include("php/connect.php");
	session_start();
	if(isset($_POST['signup']))
	{
		$lname = $_POST['lname'];
		$fname = $_POST['finame'];
		$email = $_POST['email']; 
		$pass = $_POST['password'];                        
		$sql = "Insert INTO `user_master` (`First_Name`,`Last_Name`,`Email_ID`,`Password`,`Isactive`) values ('$fname','$lname','$email','$pass','1') ";
		$update = mysqli_query($db,$sql);
		if (!$update)
		{
			echo("ERRROIR++++>>" . mysqli_error($db));
		}

		header('location:login.php');

	}


	if(isset($_POST['login']))
	{

		$email = mysqli_real_escape_string($db,$_POST['email']);
		$pass = mysqli_real_escape_string($db,$_POST['password']);
		echo $email;
		echo "\n".$pass;                      	
		$result1 = mysqli_query($db,"CALL login ('$email','$pass')"); 
		if (!$result1)
		{
			echo("ERRROIR++++>>" . mysqli_error($db));
		}         

		$row = mysqli_fetch_array($result1);
		// echo $row['userid'];
		
		if($row['userid'] == -1)
		{
			header('location:login.php');
		}
		else
		{
			echo "*********".$row['userid'];
			$_SESSION["userid"] = $row['userid'];
			echo "----".$row['webid'];

			if($row['webid'] == 0)
			{
				header('location:ct.php');
			}	
			else
			{
				$_SESSION['sitepathname'] = $row['sitepath']."\\"."index.html";
				 header('location:dashboard.php');
			}
		}
	}
	?>



	<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/login.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<title></title>
		<script>
			function abcd()
			{
				var element = document.getElementById("flip_card")
				element.style.transform = "rotateY(180deg)";
				// element.classList.toggle("flip");
			}

			function abcd1()
			{
				var element = document.getElementById("flip_card")
				element.style.transform = "rotateY(-360deg)";
				// element.classList.toggle("flip");
			}
		</script>
	</head>
	<body>
		<div id="a">
			<h1>Welcome to Web Easy</h1>
		</div>

		<div id="b">
			<img src="img/background.png" id="img1">

		</div>

		<div id="c">
			<div id="flip_card">
				<div class="card" style="width:300px;" id="d">
					<div class="card-body">
						<h4 class="card-title" id="e">Log In</h4>
						<p class="card-text"><b>This is a secure system & you'll need to provide your Log In details to access this system. </b></p>
						<form action="" method = "post">
							<div class="form-group">
								<label for="email">Email address:</label>
								<input type="email" class="form-control" id="email" name="email">
							</div>
							<div class="form-group">
								<label for="pwd">Password:</label>
								<input type="password" class="form-control" id="pwd" name="password">
							</div>

							<input type="submit" class="btn btn-primary" name="login" value="login" id="loginbtn1">
							<p class="card-text" id="e">OR</p>					  
							<button type="button" class="btn btn-primary" id="signupbtn" onclick="abcd()">Sign Up</button>
							<p class="card-text" id="f">Forgot password?</p>
						</form>
					</div>
				</div>

				<div class="card" style="width:300px;" id="g">
					<div class="card-body">
						<h4 class="card-title" id="e">Sign Up</h4>
						<p class="card-text"><b>This is a secure system & you'll need to provide your Sign Up details to access this system.</b></p>
						<form action="" method="POST">

							<div class="form-group">
								<label for="fn">First Name:</label>
								<input type="fn" class="form-control" id="fn" name="finame">
							</div>

							<div class="form-group">
								<label for="ln">Last Name:</label>
								<input type="ln" class="form-control" id="ln" name="lname">
							</div>
 
							<div class="form-group">
								<label for="email">Email address:</label>
								<input type="email" class="form-control" id="email" name="email">
							</div>

							<div class="form-group">
								<label for="pwd">Password:</label>
								<input type="password" class="form-control" id="pwd" name="password">
							</div> 


							<input type="submit" class="btn btn-primary" name="signup" value="signup" id="loginbtn1">
							<p class="card-text" id="e">OR</p>
							<button type="button" class="btn btn-primary" id="signupbtn1" onclick="abcd1()">Log In</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>

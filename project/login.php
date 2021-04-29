<!DOCTYPE html>
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
					<form action="/action_page.php">
					  <div class="form-group">
						<label for="email">Email address:</label>
						<input type="email" class="form-control" id="email">
					  </div>
					  <div class="form-group">
						<label for="pwd">Password:</label>
						<input type="password" class="form-control" id="pwd">
					  </div>
					  
					  <button type="submit" class="btn btn-primary" id="loginbtn">Log In</button>
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
					<form action="/action_page.php">

						<div class="form-group">
						<label for="fn">First Name:</label>
						<input type="fn" class="form-control" id="fn">
					  </div>

					  <div class="form-group">
						<label for="ln">Last Name:</label>
						<input type="ln" class="form-control" id="ln">
					  </div>

					  <div class="form-group">
						<label for="email">Email address:</label>
						<input type="email" class="form-control" id="email">
					  </div>

					  <div class="form-group">
						<label for="pwd">Password:</label>
						<input type="password" class="form-control" id="pwd">
					  </div> 

					  
					  <button type="submit" class="btn btn-primary" id="loginbtn1">Sign Up</button>
					  <p class="card-text" id="e">OR</p>
					  <button type="button" class="btn btn-primary" id="signupbtn1" onclick="abcd1()">Log In</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

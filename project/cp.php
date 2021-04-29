<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/cp.css">  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	
	<title></title>
</head>
<body>
	<div id="a">
		<h1><b>Change Password</b></h1>
	</div>
	<div id="b">
		<img src="img/cp.png" id="img1">

	</div>
		<div id="c">
			<div class="card" style="width:400px" id="d">
	  			<div class="card-body">
	    			<h4 class="card-title" id="e">Change Password</h4>
	    			<form action="/action_page.php">
	    			  <div class="form-group">
	    			    <label for="pwd" id="cplabel1">Current Password:</label>
	    			    <input type="password" class="form-control" id="pwd" placeholder="Current Password">
	    			  </div>
	    			  <div class="form-group">
	    			    <label for="pwd1">New Password:</label>
	    			    <input type="password" class="form-control" id="pwd1" placeholder="New Password">
	    			  </div>
	    			  <div class="form-group">
	    			    <label for="pwd2">Confirm Password:</label>
	    			    <input type="password" class="form-control" id="pwd2" placeholder="Confirm Password">
	    			  </div>
	    			  <button type="submit" class="btn btn-primary" id="submit">Submit</button>
	    			</form>
	  			</div>
			</div>
</body>
</html>  

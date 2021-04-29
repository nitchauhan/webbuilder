<?php
require "conn.php";

if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
}
else
{
	echo "connected";
}
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	echo $_POST["email"];
		$email1 = mysqli_real_escape_string($conn,$_POST["email"]);
		$password1 = mysqli_real_escape_string($conn,$_POST["password"]);
		$q = mysqli_query($conn,"CALL login('$email1','$password1')");
		$row = $q->fetch_assoc();
		// echo "$row";
		print_r($row);
		if ($row["User_ID"] > 0)
		{
			header("location: dashboard.html");			
		}
		else
		{
			header("location: login.php");	
		}
}

// header("location: dashboard.html");


?>
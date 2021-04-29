<!DOCTYPE html>

<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/forgotpass.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<title></title>
</head>
<body>
	<div id="a">
		<h1 id="h1_id">Forgot Password</h1>
		
		<!--<button type="button" class="btn btn-primary" id="loginbtn1" onclick="abcd()">Submit</button>-->
	</div>

	<div id="b">
		<img src="img/fpp.png" id="img1">
	</div>
		

<div id="c">
		<!--<div id="flip_card">-->
			<div class="card" style="width:400px;" id="d">
				<div class="card-body">
					<h4 class="card-title" id="e">Forgot Password</h4>
					<p class="card-text"><b>It's a good Idea to use a strong password that you don't use elsewhere.</b></p>
					<form action="" method = "post">
						<div class="form-group">
							<label for="email"><b>Email address:</b></label>
							<input type="email" class="form-control" id="email" name="email">
						</div>
						<div class="form-group">
							<label for="pwd"><b>OTP:</b></label>
							<input type="password" class="form-control" id="pwd" name="currpassword">
						</div>
						<div class="form-group">
							<label for="pwd1"><b>New Password:</b></label>
							<input type="password" class="form-control" id="pwd1" name="newpassword">
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


<?php
    use PHPMailer\PHPMailer\PHPMailer; 
    use PHPMailer\PHPMailer\Exception; 
      
    require 'vendor/autoload.php'; 
    if(isset($_POST["login"]))
    {       
    	$email = $_POST['email'];
    	$s1 = 'Select * from where table_name column_name(email) = '".$email."';';
    	$result = $con->query($s1)
    	if($res->num_rows == 1) {
    		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%&';
            $pass = array(); //remember to declare $pass as an array
            $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
            for ($i = 0; $i < 8; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
            }
            $pass = implode($pass);
            $s2 = "UPDATE user SET Password='" . $pass . "' WHERE Email='" . $email . "';";
            $con->query($s2);
            $s3 = "UPDATE login SET Password='" . $pass . "' WHERE Email='" . $email . "';";
            $con->query($s3);
            $mail = new PHPMailer(true); 
            $msg = "<p style='font-size:20px;'>Your password reset request has been generated:- </p>
                    <div style='width:200px;background-color:#ccc;font-size:30px;height:200px;text-align:center;'>
                    <p style='padding-top:39%;'><b>" . $pass ."</b></p>
            </div>";
            try { 
                $mail->SMTPDebug = 0;                                        
                $mail->isSMTP();                                             
                $mail->Host       = 'smtp.gmail.com';                     
                $mail->SMTPAuth   = true;                              
                $mail->Username   = 'webeasy45@gmail.com';                  
                $mail->Password   = 'avinashVishal11';                         
                $mail->SMTPSecure = 'tls';                               
                $mail->Port       = 587;   
            
                $mail->setFrom('webeasy45@gmail.com', 'Web Easy');            
                $mail->addAddress($email);  
                
                $mail->isHTML(true);                                   
                $mail->Subject = 'Password Reset'; 
                $mail->Body    = $msg; 
                $mail->AltBody = 'Body in plain text for non-HTML mail clients'; 
                $mail->send(); 
               // echo "Mail has been sent successfully!"; 
                echo "<script>console.log('nice');</script>";
            } catch (Exception $e) { 
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
            }
        }
        else
        {
            echo "<script>console.log('error');</script>";
        } 
    
    	}
?>
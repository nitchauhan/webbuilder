<!doctype html>
<?php
      include("php/connect.php");
      session_start();

      if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT User_ID FROM user_master WHERE Email_ID = '$myusername' and Password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
        
      if($count == 1) {                  
         header("location: dashboard.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }

?>


<html lang="en-us">
    
<!-- Mirrored from dashboard.zawiastudio.com/demo/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 09 Feb 2020 16:53:36 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>WEB EASY | Admin Login</title>
        <meta name="description" content="Dashboard UI Kit">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600" rel="stylesheet">

        <!-- Favicon -->
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

        <!-- Stylesheet -->
        <link rel="stylesheet" href="css/main.min3661.css?v=2.0">
    </head>
    <body class="o-page o-page--center">
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <div class="o-page__card">
            <div class="c-card u-mb-xsmall">
                <header class="c-card__header u-pt-large">
                    <a class="c-card__icon" href="#!">
                        <img src="img/logo-login.svg" alt="Dashboard UI Kit">
                    </a>
                    <h1 class="u-h3 u-text-center u-mb-zero">Welcome back! Please login.</h1>
                </header>
                
                <form class="c-card__body" method="post" action="">
                    <div class="c-field u-mb-small">
                        <label class="c-field__label" for="input1">Log in with your username</label> 
                        <input class="c-input" type="text" id="input1" placeholder="username" name="username" required> 
                    </div>

                    <div class="c-field u-mb-small">
                        <label class="c-field__label" for="input2">Password</label> 
                        <input class="c-input" type="password" id="input2" placeholder="Numbers, Letters..." name="password" required> 
                    </div>

                    <button class="c-btn c-btn--info c-btn--fullwidth" type="submit">Sign in to Dashboard</button>

                    
                </form>
                <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
            </div>         
        </div>

        <!-- Main javascsript -->
        <script src="js/main.min3661.js?v=2.0"></script>

        <script>
            window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
            ga('create','UA-88739867-2','auto');ga('send','pageview')
        </script>
        <script src="../../www.google-analytics.com/analytics.js" async defer></script>
    </body>

<!-- Mirrored from dashboard.zawiastudio.com/demo/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 09 Feb 2020 16:53:36 GMT -->
</html>
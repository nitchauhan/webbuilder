<!doctype html>
<html lang="en-us">
<?php
                    include("php/connect.php");
                    if(isset($_POST['submit']))
                    {
                        $id = $_POST['id'];
                        $fname = $_POST['fname'];
                        $lname = $_POST['lname'];
                        $email = $_POST['email'];
                        $pass = $_POST['pass'];
                        $sql = "update `user_master` set `First_Name` = '$fname', `Last_Name`='$lname',`Email_ID`='$email',`Password`='$pass' Where `User_ID` = $id";
                        $update = mysqli_query($db,$sql);

                        header('location:user-master.php')  ;

                    }

                    if (isset($_GET['remove'])) {
                    $id = $_GET['remove'];
                    echo $id;
                    $sql1 = "update `user_master` set `isactive` = false Where `User_ID` = $id";            
                    $row1 = mysqli_query($db,$sql1);                  
                    header('location:user-master.php'); 
                    }


                    if (isset($_GET['edit'])) {
                    $id = $_GET['edit'];
                    $result1 = mysqli_query($db,"CALL get_user_master_byid ($id)");            
                    $row = mysqli_fetch_array($result1);
?>


<!-- Mirrored from dashboard.zawiastudio.com/demo/performance.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 09 Feb 2020 16:51:03 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard</title>
    <meta name="description" content="Dashboard UI Kit">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600" rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="css/main.min3661.css?v=2.0">
</head>
<body class="o-page">
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
        <div class="o-page__sidebar js-page-sidebar">
            <div class="c-sidebar">
                <a class="c-sidebar__brand" href="#">
                    <img class="c-sidebar__brand-img" src="img/logo.png" alt="Logo"> Dashboard
                </a>
                
                <h4 class="c-sidebar__title">Dashboards</h4>
                <ul class="c-sidebar__list">                    

                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link " href="dashboard.php">
                            <i class="fa fa-tachometer u-mr-xsmall"></i>Dashboard 
                        </a>
                    </li>

                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link is-active" href="user-master.php">
                            <i class="fa fa-home u-mr-xsmall"></i>Users
                        </a>
                    </li>

                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link" href="template-master.php">
                            <i class="fa fa-line-chart u-mr-xsmall"></i>Templates
                        </a>
                    </li>

                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link" href="website-master.php">
                            <i class="fa fa-rocket u-mr-xsmall"></i>Websites
                        </a>
                    </li>

                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link" target="_blank" href="projects.html">
                            <i class="fa fa-table u-mr-xsmall"></i>Logout
                        </a>
                    </li>
                </ul>

                

            </div><!-- // .c-sidebar -->
        </div><!-- // .o-page__sidebar -->

        <main class="o-page__content">
            <header class="c-navbar">
                <button class="c-sidebar-toggle u-mr-small">
                    <span class="c-sidebar-toggle__bar"></span>
                    <span class="c-sidebar-toggle__bar"></span>
                    <span class="c-sidebar-toggle__bar"></span>
                </button><!-- // .c-sidebar-toggle -->

                <h2 class="c-navbar__title u-mr-auto">Users</h2>
                
                
            </header>

            <div class="c-card u-mb-small ">
               <form class="c-card__body col-md-6" method="post" action="">
                <input type="hidden" name="id" value="<?php echo $row['uid'] ?>">
                    <div class="c-field  u-mb-small">
                        <label class="c-field__label" for="input1">First Name</label> 
                        <input class="c-input" type="text" id="input1" placeholder="First Name" name="fname" value="<?php echo $row['fname'] ?>" required> 
                    </div>

                    <div class="c-field  u-mb-small">
                        <label class="c-field__label" for="input2">Last Name</label> 
                        <input class="c-input" type="text" id="input2" placeholder="Last Name" name="lname" value="<?php echo $row['lname'] ?>" required> 
                    </div>

                    <div class="c-field  u-mb-small">
                        <label class="c-field__label" for="input3">Email Address</label> 
                        <input class="c-input" type="text" id="input3" placeholder="Email Address" name="email" value="<?php echo $row['email'] ?>" required> 
                    </div>

                    <div class="c-field  u-mb-small">
                        <label class="c-field__label" for="input4">Template</label> 
                        <input class="c-input" type="text" id="input4" placeholder="Template" name="firstname" value="<?php echo $row['template_name'] ?>" required readonly="true"> 
                    </div>

                    <div class="c-field u-mb-small">
                        <label class="c-field__label" for="input5">Password</label> 
                        <input class="c-input" type="text" id="input5" placeholder="Numbers, Letters..." name="pass" value="<?php echo $row['pass'] ?>" required> 
                    </div>

                    <div class="c-field has-addon-left u-mb-small">
                        <label class="c-field__label" for="input6">Join date</label>
                        <span class="c-field__addon"><i class="fa fa-calendar"></i></span>
                        <label class="c-field__label u-hidden-visually" for="input6">Disabled Input</label>
                        <input class="c-input" data-toggle="datepicker" id="input6" type="text" value="<?php echo $row['join_date'] ?>" readonly>
                    </div>

                    <button class="c-btn c-btn--success" type="submit" name="submit">Update</button>

                    
                </form>
            </div>
            <?php

                }
            ?>


        </main><!-- // .o-page__content -->

        <!-- Main javascsript -->
        <script src="js/main.min3661.js?v=2.0"></script>

        <script>
            window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
            ga('create','UA-88739867-2','auto');ga('send','pageview')
        </script>
        <script src="../../www.google-analytics.com/analytics.js" async defer></script>
    </body>

    <!-- Mirrored from dashboard.zawiastudio.com/demo/performance.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 09 Feb 2020 16:51:03 GMT -->
    </html>
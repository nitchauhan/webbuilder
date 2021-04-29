<!doctype html>
<html lang="en-us">
<?php
                    include("php/connect.php");
                    if(isset($_POST['submit']))
                    {
                        $id = $_POST['id'];
                        $temp_name = $_POST['temp_name'];                        
                        $sql = "update `template_master` set `Temp_Head_Name` = '$temp_name' Where `Temp_ID` = $id";
                        $update = mysqli_query($db,$sql);

                       header('location:template-master.php')  ;

                    }

                    if (isset($_GET['remove'])) {
                    $id = $_GET['remove'];
                    echo $id;
                    $sql1 = "update `template_master` set `isactive` = false Where `Temp_ID` = $id";            
                    $row1 = mysqli_query($db,$sql1);                  
                    header('location:template-master.php'); 
                    }

                    if (isset($_GET['edit'])) {
                    $id = $_GET['edit'];
                    $result1 = mysqli_query($db,"CALL get_template_master_byid ($id)");            
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
                        <a class="c-sidebar__link " href="user-master.php">
                            <i class="fa fa-home u-mr-xsmall"></i>Users
                        </a>
                    </li>

                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link is-active" href="template-master.php">
                            <i class="fa fa-line-chart u-mr-xsmall"></i>Templates
                        </a>
                    </li>

                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link"  href="website-master.php">
                            <i class="fa fa-rocket u-mr-xsmall"></i>Websites
                        </a>
                    </li>

                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link" >
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

                <h2 class="c-navbar__title u-mr-auto">Template</h2>

                
                
            </header>

            <div class="c-card u-mb-small ">
               <form class="c-card__body col-md-6" method="post" action="">
                <input type="hidden" name="id" value="<?php echo $row['tempid'] ?>">
                    <div class="c-field  u-mb-small">
                        <label class="c-field__label" for="input1">Template Name</label> 
                        <input class="c-input" type="text" id="input1" placeholder="First Name" name="temp_name" value="<?php echo $row['template_name'] ?>" required> 
                    </div>
                    

                    <div class="c-field has-addon-left u-mb-small">
                        <label class="c-field__label" for="input6">Added date</label>
                        <span class="c-field__addon"><i class="fa fa-calendar"></i></span>
                        <label class="c-field__label u-hidden-visually" for="input6">Disabled Input</label>
                        <input class="c-input" data-toggle="datepicker" id="input6" type="text" value="<?php echo $row['added_data'] ?>" readonly>
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
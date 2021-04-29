<!doctype html>
<html lang="en-us">

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

                <h2 class="c-navbar__title u-mr-auto">Templates</h2>
                <button style="font-size:24px">
                   <a class="c-btn c-btn--success" href="addtemplate.php"> Add new <i class="fa fa-plus" ></i></a>

                </button>

                
                
            </header>

            <div class="c-toolbar u-justify-center u-mb-small">
             <div class="c-table-responsive@desktop">
                <table class="c-table c-table--zebra u-mb-small col-lg-6" id="datatable2">
                    <thead class="c-table__head">
                        <tr class="c-table__row">
                          <th class="c-table__cell c-table__cell--head">Template Name</th>                          
                          <th class="c-table__cell c-table__cell--head">Action</th>

                      </tr>
                  </thead>

                  <tbody>

                    <!-- php code -->

                    <?php
                    include("php/connect.php");
                    $result = mysqli_query($db,"CALL get_template_master_view");
                    while($row = mysqli_fetch_array($result))
                    {
                        ?>






                        <tr class="c-table__row c-table__row--danger">
                            <td class="c-table__cell"><?php echo $row['template_name'] ?>

                        </td>

                        

                <td class="c-table__cell">
                    <a class="c-btn c-btn--success" href="template-master-byid.php?edit=<?php echo $row['tempid'] ?>">
                        <i class="fa fa-pencil-square-o u-mr-xsmall"></i>Edit
                    </a>

                    <a class="c-btn c-btn--success" href="template-master-byid.php?remove=<?php echo $row['tempid'] ?>">
                        <i class="fa fa-trash-o u-mr-xsmall"></i>Delete
                    </a>
                </td>


            </tr>  
        <?php  } ?>                              
    </tbody>
</table>
</div>  
</div><!-- // .c-toolbar -->



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
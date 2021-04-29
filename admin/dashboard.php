<!doctype html>
<?php

include("php/connect.php");
$result = mysqli_query($db,"CALL get_dashboard_pie_chart");
$labl = [];
$val =[];
$arr =[];
while($row = mysqli_fetch_array($result))
{
    array_push($arr,array("label"=>$row["name"],"y"=>$row["count"]));
    
}


$dataPoints = array( 
    array("label"=>"Oxygen", "symbol" => "O","y"=>46.6),
    array("label"=>"Silicon", "symbol" => "Si","y"=>27.7),
    array("label"=>"Aluminium", "symbol" => "Al","y"=>13.9),
    array("label"=>"Iron", "symbol" => "Fe","y"=>5),
    array("label"=>"Calcium", "symbol" => "Ca","y"=>3.6),
    array("label"=>"Sodium", "symbol" => "Na","y"=>2.6),
    array("label"=>"Magnesium", "symbol" => "Mg","y"=>2.1),
    array("label"=>"Others", "symbol" => "Others","y"=>1.5)

);


$sql = "select * as `count` from `user_master` ;";
$sql1 = "select * as `count` from `template_master` ;";

$r1 = mysqli_query($db,$sql);
$r2 = mysqli_query($db,$sql1);


?>

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
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

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
                        <a class="c-sidebar__link is-active" href="dashboard.php">
                            <i class="fa fa-tachometer u-mr-xsmall"></i>Dashboard 
                        </a>
                    </li>

                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link" href="user-master.php">
                            <i class="fa fa-home u-mr-xsmall"></i>Users
                        </a>
                    </li>

                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link" href="template-master.php">
                            <i class="fa fa-line-chart u-mr-xsmall"></i>Templates
                        </a>
                    </li>

                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link" target="_blank" href="website-master.php">
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

                <h2 class="c-navbar__title u-mr-auto">Dashboard</h2>
                
                
            </header>

            <div class="c-toolbar u-justify-center u-mb-small">
               <div class="col-sm-6 col-lg-3">
                <div class="c-state c-state--success">
                    <h3 class="c-state__title">Users</h3>
                    <h4 class="c-state__number">4</h4>                        
                </div><!-- // c-state -->
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="c-state c-state--info">
                    <h3 class="c-state__title">Total Templates</h3>
                    <h4 class="c-state__number">2</h4>                                               
                </div><!-- // c-state -->
            </div>
        </div><!-- // .c-toolbar -->

        <div class="container-fluid">
            <div class="row">
                
                    
                <div class="col-lg-12 u-mr-auto u-mb-medium">
                    <div class="c-card u-p-medium" data-mh="main-graphs">
                        <div id="chartContainer" style="height: 370px; width: 100%;"></div>

                    </div>
                </div>
            </div>

            

        </div><!-- // .container -->

    </main><!-- // .o-page__content -->

    <!-- Main javascsript -->
    <script src="js/main.min3661.js?v=2.0"></script>

<script type="text/javascript">
    function load_chart_pie(){
        var chart = new CanvasJS.Chart("chartContainer", {
            theme: "light2",
            animationEnabled: true,
            title: {
                text: "Template Usage"
            },
            data: [{
                type: "doughnut",
                indexLabel: "{symbol} - {y}",
                yValueFormatString: "#,##0.0\"%\"",
                showInLegend: true,
                legendText: "{label} : {y}",
                dataPoints: <?php echo json_encode($arr, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();

    }

</script>

   <script>
        $(document).ready(function() {        
        load_chart_pie();
});

</script>


<script>
    window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
    ga('create','UA-88739867-2','auto');ga('send','pageview')
</script>
<script src="../../www.google-analytics.com/analytics.js" async defer></script>



<!--  -->
<input type="hidden" id="pie_lable" value="<?php echo $labl ?>">
<input type="hidden" id="pie_value" value="<?php echo $val ?>">
<!--  -->
</body>

<!-- Mirrored from dashboard.zawiastudio.com/demo/performance.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 09 Feb 2020 16:51:03 GMT -->
</html>
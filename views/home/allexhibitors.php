<?php

require_once __DIR__ . "/../../lib/session/SessionManager.php";

$session = new SessionManager();
$session->startSession();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="../../static/img/favicon.ico" />
    <title>Our Exhibitors</title>

    <link href="../../static/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../static/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../static/css/home/home.css" rel="stylesheet">
    <link href="../../static/css/home/allexhibitors.css" rel="stylesheet">

</head>
<body>

<img id="top" class="top-banner" src="../../static/img/top-banner.png">

<nav id="topbar" class="navbar navbar-inverse" data-spy="affix" data-offset-top="257">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#top-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand nav-link" href="index.php">
                <input class="hidden" value="top">
                EuroMed 2016
            </a>
        </div>
        <div id="top-navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a class="nav-but nav-link pulsate" href="index.php?tab=deadlines">
                        <i class="fa fa-calendar fa-lg" aria-hidden="true"></i>
                        Important Dates
                    </a>
                </li>
                <li>
                    <a class="nav-but nav-link" href="index.php?tab=workshops">
                        <i class="fa fa-briefcase fa-lg" aria-hidden="true"></i>
                        Workshops
                    </a>
                </li>
                <li>
                    <a class="nav-but nav-link" href="index.php?tab=prices">
                        <i class="fa fa-usd fa-lg" aria-hidden="true"></i>
                        Prices
                    </a>
                </li>
                <li>
                    <a class="nav-but nav-link" href="index.php?tab=speakers">
                        <i class="fa fa-microphone fa-lg" aria-hidden="true"></i>
                        For Speakers
                    </a>
                </li>
                <li>
                    <a class="nav-but nav-link" href="index.php?tab=exhibitors">
                        <i class="fa fa-table fa-lg" aria-hidden="true"></i>
                        For Exhibitors
                    </a>
                </li>
                <li>
                    <a class="nav-but nav-link" href="index.php?tab=schedule">
                        <i class="fa fa-table fa-lg" aria-hidden="true"></i>
                        Schedule
                    </a>
                </li>
                <li>
                    <a class="nav-but nav-link" href="index.php?tab=location">
                        <i class="fa fa-map-marker fa-lg" aria-hidden="true"></i>
                        Location
                    </a>
                </li>
                <li>
                    <a class="nav-but nav-link" href="index.php?tab=contact">
                        <i class="fa fa-address-card-o fa-lg" aria-hidden="true"></i>
                        Contact
                    </a>
                </li>
                <li>
                    <a class="nav-but nav-link" href="index.php?tab=sponsors">
                        <i class="fa fa-handshake-o fa-lg" aria-hidden="true"></i>
                        Sponsors
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php

                if (isset($_SESSION['full_name'])) {
                    echo '<li><a class="nav-but" href="../panel/' . $_SESSION['role'] . '/index.php"><span class="glyphicon glyphicon-user"></span>'
                        . $_SESSION['full_name'] . '</a></li><li><a id="logout" class="nav-but">'
                        . '<span><i class="fa fa-sign-out" aria-hidden="true"></i></span>Log Out</a></li>';
                } else {
                    echo '<li><a class="nav-but" href="auth.php?tab=login-tab"><span class="glyphicon glyphicon-chevron-right"></span>'
                        . 'Log In</a></li><li><a class="nav-but" href="auth.php?tab=reg-tab"><span class="glyphicon glyphicon-user"></span>'
                        . 'Register</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>

<ol class="breadcrumb breadcrumb-pos">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active"><a href="./allexhibitors.php">Our Exhibitors</a></li>
</ol>

<div class="custom-container container">
    <div class="row">

        <div class="inner-wrapper">
            <div class="menu-head text-center">
                <h1 class="tab-head">
                    Exhibitors
                </h1>
                <hr class="custom-hr">
            </div>

            <div class="row exhibit">
                <img class="exhib-img exhib-img-padding" src="../../static/img/exhibitors/exhibitor_1.png">
                <iframe class="exhibitor-video pull-right" src="https://www.youtube.com/embed/4Ko2NZ9z0nA" frameborder="0" allowfullscreen></iframe>
            </div>

            <hr class="custom-hr">

            <div class="row exhibit">
                <img class="exhib-img" src="../../static/img/exhibitors/exhibitor_2.png">
                <iframe class="exhibitor-video pull-right" src="https://www.youtube.com/embed/Q9J6vH_82h0" frameborder="0" allowfullscreen></iframe>
            </div>

            <hr class="custom-hr">

            <div class="row exhibit">
                <img class="exhib-img" src="../../static/img/exhibitors/exhibitor_3.png">
                <iframe class="exhibitor-video pull-right" src="https://www.youtube.com/embed/OXxQzUSCd68" frameborder="0" allowfullscreen></iframe>
            </div>

            <br>

        </div>

    </div>



    <div class="clearfix"></div>

</div>
</div>

</body>
<script type="text/javascript" src="../../static/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="../../static/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../static/js/home/logout_home.js"></script>

</html>

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

    <link rel="shortcut icon" href="../../static/img/favicon.ico" type="image/x-icon" />
    <title>EuroMed 2016</title>

    <link href="../../static/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../static/css/bootstrapValidator.min.css" rel="stylesheet">
    <link href="../../static/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../static/css/home/home.css" rel="stylesheet">
    <link href="../../static/css/home/about.css" rel="stylesheet">
    <link href="../../static/css/home/deadlines.css" rel="stylesheet">
    <link href="../../static/css/home/workshops.css" rel="stylesheet">
    <link href="../../static/css/home/speakers.css" rel="stylesheet">
    <link href="../../static/css/home/exhibitors.css" rel="stylesheet">
    <link href="../../static/css/home/schedule.css" rel="stylesheet">
    <link href="../../static/css/home/location.css" rel="stylesheet">
    <link href="../../static/css/home/contact.css" rel="stylesheet">
    <link href="../../static/css/home/sponsors.css" rel="stylesheet">
    <link href="../../static/css/home/login.css" rel="stylesheet">

    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>

<!--<div id="top" class="top-banner banner-height"></div>-->
<img id="top" class="top-banner" src="../../static/img/top-banner.png">

<nav id="topbar" class="navbar navbar-inverse" data-spy="affix" data-offset-top="257">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#top-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand nav-link">
                <input class="hidden" value="top">
                EuroMed 2016
            </a>
        </div>
        <div id="top-navbar" class="collapse navbar-collapse">

            <ul class="nav navbar-nav">
                <li>
                    <a class="nav-but nav-link pulsate">
                        <input class="hidden" value="deadlines">
                        <i class="fa fa-calendar fa-lg" aria-hidden="true"></i>
                        Important Dates
                    </a>
                </li>
                <li>
                    <a class="nav-but nav-link">
                        <input class="hidden" value="workshops">
                        <i class="fa fa-briefcase fa-lg" aria-hidden="true"></i>
                        Workshops
                    </a>
                </li>
                <li>
                    <a class="nav-but nav-link">
                        <input class="hidden" value="prices">
                        <i class="fa fa-usd fa-lg" aria-hidden="true"></i>
                        Prices
                    </a>
                </li>
                <li>
                    <a class="nav-but nav-link">
                        <input class="hidden" value="speakers">
                        <i class="fa fa-microphone fa-lg" aria-hidden="true"></i>
                        For Speakers
                    </a>
                </li>
                <li>
                    <a class="nav-but nav-link">
                        <input class="hidden" value="exhibitors">
                        <i class="fa fa-table fa-lg" aria-hidden="true"></i>
                        For Exhibitors
                    </a>
                </li>
                <li>
                    <a class="nav-but nav-link">
                        <input class="hidden" value="schedule">
                        <i class="fa fa-table fa-lg" aria-hidden="true"></i>
                        Schedule
                    </a>
                </li>
                <li>
                    <a class="nav-but nav-link">
                        <input class="hidden" value="location">
                        <i class="fa fa-map-marker fa-lg" aria-hidden="true"></i>
                        Location
                    </a>
                </li>
                <li>
                    <a class="nav-but nav-link">
                        <input class="hidden" value="contact">
                        <i class="fa fa-address-card-o fa-lg" aria-hidden="true"></i>
                        Contact
                    </a>
                </li>
                <li>
                    <a class="nav-but nav-link">
                        <input class="hidden" value="sponsors">
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

<div class="custom-container">

    <?php include_once __DIR__ . '/about.php'; ?>

    <?php include_once __DIR__ . '/deadlines.php'; ?>

    <?php include_once __DIR__ . '/workshops.php'; ?>

    <?php include_once __DIR__ . '/prices.php'; ?>

    <?php include_once __DIR__ . '/speakers.php'; ?>

    <?php include_once __DIR__ . '/exhibitors.php'; ?>

    <?php include_once __DIR__ . '/schedule.php'; ?>

    <?php include_once __DIR__ . '/location.php'; ?>

    <?php include_once __DIR__ . '/contact.php'; ?>

    <?php include_once __DIR__ . '/sponsors.php'; ?>

    <div class="text-center copyright">
        Copyright © 2017
    </div>

</div>

</body>
<script type="text/javascript" src="../../static/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="../../static/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../static/js/bootstrapValidator.min.js"></script>
<script type="text/javascript" src="../../static/js/home/home.js"></script>
<script type="text/javascript" src="../../static/js/home/deadlines.js"></script>
<script type="text/javascript" src="../../static/js/home/workshops.js"></script>
<script type="text/javascript" src="../../static/js/home/speakers.js"></script>
<script type="text/javascript" src="../../static/js/home/exhibitors.js"></script>
<script type="text/javascript" src="../../static/js/home/schedule.js"></script>
<script type="text/javascript" src="../../static/js/home/location.js"></script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFVU4XH5tqywMESlMxnySZRwyIbn1yu5g&callback=initMap">
</script>
<script type="text/javascript" src="../../static/js/home/contact.js"></script>
<script type="text/javascript" src="../../static/js/home/sponsors.js"></script>
<script src="../../static/js/home/logout_home.js"></script>

<?php

/* AUTO SCROLL WHEN COMING FROM ANOTHER PAGE */
if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
    if (isset($_GET['tab']) && !empty($_GET['tab'])) {
        echo '<script type="text/javascript">scrollTo("' . $_GET['tab'] . '");</script>';
    }
}

?>

</html>

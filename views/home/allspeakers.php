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
    <title>Our Speakers</title>

    <link href="../../static/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../static/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../static/css/home/home.css" rel="stylesheet">
    <link href="../../static/css/home/allspeakers.css" rel="stylesheet">

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
    <li class="breadcrumb-item active"><a href="./allspeakers.php">Our Speakers</a></li>
</ol>

<div class="custom-container container">
    <div class="row">

        <div class="inner-wrapper">
            <div class="menu-head text-center">
                <h1 class="tab-head">
                    Keynote Speakers
                </h1>
                <hr class="custom-hr">
            </div>

            <div id="keynote">
                <br>
            </div>

        </div>

        <div class="clearfix"></div>

        <div class="inner-wrapper">
            <div class="menu-head text-center">
                <h1 class="tab-head">
                    Search Speakers
                </h1>
                <hr class="custom-hr">
            </div>

            <div id="nonkeynote">

                <div>
                    <div class="form-horizontal">
                        <div class="text-center">
                            <label class="control-label col-md-3">
                                Search for Speakers
                            </label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
                                    <input id="searchSpeaker" class="form-control" type="search">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="text-center">
                        <a href="auth.php?tab=reg-tab">
                            To participate as a speaker, click to register.
                        </a>
                        <hr>
                    </div>
                </div>

            </div>

        </div>

        <div class="modal fade" id="speakerModal" tabindex="-1" role="dialog" aria-labelledby="speaker-modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-text">
                            <div class="speaker-name"></div>
                            <div class="speaker-title"></div>
                            <hr>
                            <h3 style="color:blue">Speaking at Panels</h3>
                            <div class="text-center">
                                1. Preserving the Intangible, Tools for Documenting and Sharing Folkloric Dance.<br>
                                2. Preserving the Intangible, Tools for Documenting and Sharing Folkloric Dance.<br>
                            </div>
                            <h3 style="color:blue">Bio</h3>
                            <div class="speaker-bio"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
 
</body>
<script type="text/javascript" src="../../static/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="../../static/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../static/js/home/allspeakers.js"></script>
<script type="text/javascript" src="../../static/js/home/logout_home.js"></script>

</html>

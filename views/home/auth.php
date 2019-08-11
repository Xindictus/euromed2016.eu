<?php

require_once __DIR__ . "/../../lib/session/SessionManager.php";

$session = new SessionManager();
$session->startSession();

if (isset($_SESSION['full_name'])) {
    echo '<script type="text/javascript">window.location.href = "' .
        '../panel/' . $_SESSION['role'] . '/index.php' .
        '";</script>';
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->

    <link rel="shortcut icon" href="../../static/img/favicon.ico" />
    <title>Authentication</title>

    <link href="../../static/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../static/css/bootstrapValidator.min.css" rel="stylesheet">
    <link href="../../static/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../static/css/home/home.css" rel="stylesheet">
    <link href="../../static/css/home/login.css" rel="stylesheet">
    <link href="../../static/css/home/registration.css" rel="stylesheet">

    <script src='https://www.google.com/recaptcha/api.js'></script>
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
                        DeadLines
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
                <li>
                    <a class="nav-but" href="auth.php?tab=login-tab">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        Log In
                    </a>
                </li>
                <li>
                    <a class="nav-but" href="auth.php?tab=reg-tab">
                        <span class="glyphicon glyphicon-user"></span>
                        Register
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="custom-container container">
    <div class="row">

        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#login-tab" data-toggle="tab">Login</a></li>
                <li><a href="#reg-tab" data-toggle="tab">Registration</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade in active" id="login-tab">
                    <div class="inner-wrapper">
                        <div class="menu-head text-center">
                            <h1 class="tab-head">
                                Login
                            </h1>
                            <hr class="custom-hr">
                        </div>

                        <div id="alertBoxLog" class="hidden"></div>

                    </div>

                    <div class="form-div">

                        <form id="login" class="form-horizontal">
                            <div class="col-md-8 col-md-offset-3">
                                <div class="custom-input-group">
                                    <input id="email_log" name="email_log" class="custom-input" required>
                                    <label for="email_log" class="custom-label">E-mail: </label>
                                </div>
                                <div class="custom-input-group">
                                    <input id="pass_log" type="password" name="pass_log" class="custom-input" required>
                                    <label for="pass_log" class="custom-label">Password: </label>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="text-center">
                                <input id="form_submit_log" class="btn btn-primary" type="button" value="Login">
                            </div>
                        </form>

                    </div>
                </div>

                <div class="tab-pane fade" id="reg-tab">

                    <div class="inner-wrapper">
                        <div class="menu-head text-center">
                            <h1 class="tab-head">
                                Registration
                            </h1>
                            <hr class="custom-hr">
                        </div>

                        <div id="alertBoxReg" class="hidden"></div>

                    </div>

                    <div class="clearfix"></div>

                    <div class="form-div">
                        <form id="registration" class="form-horizontal">
                            <!-- NAME -->
                            <div class="form-group">
                                <label class="control-label col-md-4">
                                    <span class="required">*</span>
                                    Name:
                                </label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="first_name" maxlength="25" placeholder="Type your name">
                                    </div>
                                </div>
                            </div>

                            <!-- SURNAME -->
                            <div class="form-group">
                                <label class="control-label col-md-4">
                                    <span class="required">*</span>
                                    Surname:
                                </label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="last_name" maxlength="25" placeholder="Type your surname">
                                    </div>
                                </div>
                            </div>

                            <!-- FATHER'S NAME -->
                            <div class="form-group">
                                <label class="control-label col-md-4">
                                    <span class="required">*</span>
                                    Father's Name:
                                </label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="father_name" maxlength="25" placeholder="Type your father's name">
                                    </div>
                                </div>
                            </div>

                            <!-- EMAIL -->
                            <div class="form-group">
                                <label class="control-label col-md-4">
                                    <span class="required">*</span>
                                    E-mail:
                                </label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="email" maxlength="100" placeholder="Type your e-mail">
                                    </div>
                                </div>
                            </div>

                            <!-- PASSWORD -->
                            <div class="form-group">
                                <label class="control-label col-md-4">
                                    <span class="required">*</span>
                                    Password:
                                </label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
                                        <input type="password" class="form-control" name="password" maxlength="15" placeholder="Type your password">
                                    </div>
                                </div>
                            </div>

                            <!-- PASSWORD - VERIFICATION -->
                            <div class="form-group">
                                <label class="control-label col-md-4">
                                    <span class="required">*</span>
                                    Verify Password:
                                </label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
                                        <input type="password" class="form-control" name="vpassword" maxlength="15" placeholder="Verify your password">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4" for="participationChoice">
                                    <span class="required">*</span>
                                    Participate as:
                                </label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-users" aria-hidden="true"></i></span>
                                        <select id="participationChoice" name="participationChoice" class="form-control">
                                            <option disabled selected value> -- select an option -- </option>
                                            <option value="visitor">Visitor</option>
                                            <option value="speaker">Speaker</option>
                                            <option value="exhibitor">Exhibitor</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div id="visitor_reg" class="reg-extension hidden">
                                <div class="form-group">
                                    <label class="control-label col-md-4">
                                        <span class="required">*</span>
                                        Choose your packet:
                                    </label>
                                    <div class="col-md-3">
                                        <select id="student-sel" name="studentValue" class="form-control">
                                            <option value="nonstudent">Non Student</option>
                                            <option value="student">Student</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select id="day-sel" name="packetDuration" class="form-control">
                                            <option value="full">Entire Program</option>
                                            <option value="one">One Day</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">
                                    </label>
                                    <div class="col-md-6 text-center">
                                        <div id="priceTag" class="alert alert-info "></div>
                                    </div>
                                </div>
                            </div>

                            <div id="speaker_reg" class="form-group reg-extension hidden">
                                <div class="form-group">
                                    <label class="control-label col-md-4">
                                        <span class="required">*</span>
                                        Choose your highest distinction:
                                    </label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-university" aria-hidden="true"></i></span>
                                            <select id="stud-level" name="stud_level" class="form-control" required>
                                                <option disabled selected value> -- select an option -- </option>
                                                <option value="under">Undergraduate</option>
                                                <option value="post">Postgraduate</option>
                                                <option value="phd">PhD</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">
                                        <span class="required">*</span>
                                        University:
                                    </label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-university" aria-hidden="true"></i></span>
                                            <input id="university" type="text" class="form-control" name="university" maxlength="50" placeholder="Type your university" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">
                                        <span class="required">*</span>
                                        Faculty:
                                    </label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-university" aria-hidden="true"></i></span>
                                            <input id="faculty" type="text" class="form-control" name="faculty" maxlength="50" placeholder="Type your faculty" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">
                                        <span class="required">*</span>
                                        Choose your packet:
                                    </label>
                                    <div class="col-md-3">
                                        <select id="student-sel-2" name="studentValue" class="form-control">
                                            <option value="nonstudent">Non Student</option>
                                            <option value="student">Student</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select id="day-sel-2" name="packetDuration" class="form-control">
                                            <option value="full">Entire Program</option>
                                            <option value="one">One Day</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">
                                    </label>
                                    <div class="col-md-6 text-center">
                                        <div id="priceTag-2" class="alert alert-info "></div>
                                    </div>
                                </div>
                            </div>

                            <div id="exhibitor_reg" class="reg-extension hidden">
                                <div class="form-group">
                                    <label class="control-label col-md-4">
                                        <span class="required">*</span>
                                        Company's Name:
                                    </label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-building-o" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" name="company" maxlength="50" placeholder="Type your company's name" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">
                                        <span class="required">*</span>
                                        Country:
                                    </label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-globe" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" name="country" maxlength="30" placeholder="Type your country" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">
                                        <span class="required">*</span>
                                        City:
                                    </label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-hospital-o" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" name="city" maxlength="30" placeholder="Type your city" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">
                                        <span class="required">*</span>
                                        Postal Code:
                                    </label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope-open" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" name="postal" maxlength="5" placeholder="Type your postal code" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-10" >
                                    <div class="g-recaptcha pull-right" data-sitekey="6Lc7pxAUAAAAAClv-LfW5kg0oBNQNVhO_y_V15Tk"></div>
                                </div>
                            </div>

                            <div class="text-center col-md-10 submission">
                                <input id="form_submit" class="btn btn-primary pull-right" type="button" value="Submit">
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>



    </div>
</div>

</body>
<script src="../../static/js/jquery-2.1.4.min.js"></script>
<script src="../../static/js/bootstrap.min.js"></script>
<script src="../../static/js/bootstrapValidator.min.js"></script>
<script src="../../static/js/home/login.js"></script>
<script src="../../static/js/home/registration.js"></script>
</html>

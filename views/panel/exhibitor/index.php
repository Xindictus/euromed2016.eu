<?php

require_once __DIR__ . "/../../../lib/session/SessionManager.php";

$session = new SessionManager();

$session->checkSession();

if ($_SESSION['role'] !== "exhibitor") {
    $session->destroySession();
    echo "<script>window.location.href = '../../home/index.php'; </script>";
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="../../../static/img/favicon.ico" type="image/x-icon" />

    <title>Exhibitor Panel</title>

    <link href="../../../static/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../static/css/bootstrapValidator.min.css" rel="stylesheet">
    <link href="../../../static/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../../static/css/home/home.css" rel="stylesheet">
    <link href="../../../static/css/panel/exhibitor.css" rel="stylesheet">
    <link href="../../../static/css/panel/schedule.css" rel="stylesheet">

</head>
<body>

<img id="top" class="top-banner" src="../../../static/img/top-banner.png">

<nav id="topbar" class="navbar navbar-inverse" data-spy="affix" data-offset-top="257">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#top-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand nav-link" href="../../home/index.php">
                <input class="hidden" value="top">
                EuroMed 2016
            </a>
        </div>
        <div id="top-navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a class="nav-but nav-link" href="../../home/index.php?tab=deadlines">
                        <i class="fa fa-calendar fa-lg" aria-hidden="true"></i>
                        Important Dates
                    </a>
                </li>
                <li>
                    <a class="nav-but nav-link" href="../../home/index.php?tab=workshops">
                        <i class="fa fa-briefcase fa-lg" aria-hidden="true"></i>
                        Workshops
                    </a>
                </li>
                <li>
                    <a class="nav-but nav-link" href="../../home/index.php?tab=prices">
                        <i class="fa fa-usd fa-lg" aria-hidden="true"></i>
                        Prices
                    </a>
                </li>
                <li>
                    <a class="nav-but nav-link" href="../../home/index.php?tab=speakers">
                        <i class="fa fa-microphone fa-lg" aria-hidden="true"></i>
                        For Speakers
                    </a>
                </li>
                <li>
                    <a class="nav-but nav-link" href="../../home/index.php?tab=exhibitors">
                        <i class="fa fa-table fa-lg" aria-hidden="true"></i>
                        For Exhibitors
                    </a>
                </li>
                <li>
                    <a class="nav-but nav-link" href="../../home/index.php?tab=schedule">
                        <i class="fa fa-table fa-lg" aria-hidden="true"></i>
                        Schedule
                    </a>
                </li>
                <li>
                    <a class="nav-but nav-link" href="../../home/index.php?tab=location">
                        <i class="fa fa-map-marker fa-lg" aria-hidden="true"></i>
                        Location
                    </a>
                </li>
                <li>
                    <a class="nav-but nav-link" href="../../home/index.php?tab=contact">
                        <i class="fa fa-address-card-o fa-lg" aria-hidden="true"></i>
                        Contact
                    </a>
                </li>
                <li>
                    <a class="nav-but nav-link" href="../../home/index.php?tab=sponsors">
                        <i class="fa fa-handshake-o fa-lg" aria-hidden="true"></i>
                        Sponsors
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="nav-but" href="./index.php">
                        <span class="glyphicon glyphicon-user"></span>
                        <?php echo $_SESSION['full_name'] ?>
                    </a>
                </li>
                <li>
                    <a id="logout" class="nav-but">
                        <span><i class="fa fa-sign-out" aria-hidden="true"></i></span>
                        Log Out
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<ol class="breadcrumb breadcrumb-pos">
    <li class="breadcrumb-item"><a href="../../home/index.php">Home</a></li>
    <li class="breadcrumb-item active"><a href="./index.php">Account</a></li>
</ol>

<div class="custom-container container">

    <div class="row">

        <div class="btn-group-vertical button-panel col-md-2" role="group">

            <button class="btn btn-default" href="#account-tab" data-toggle="tab">Account</button>
            <button class="btn btn-default" href="#exhibit-tab" data-toggle="tab">Exhibit Application</button>
            <button class="btn btn-default" href="#review-tab" data-toggle="tab">Exhibit's Application<br> Status</button>
            <button class="btn btn-default" href="#schedule-tab" data-toggle="tab">Exhibitor's Schedule<br> Status</button>
        </div>

        <div class="tab-content col-md-9">
            <div class="tab-pane fade in active" id="account-tab">

                <div class="inner-wrapper">
                    <div class="menu-head text-center">
                        <h1 class="tab-head">
                            Account Information
                        </h1>
                        <hr class="custom-hr">
                    </div>

                    <div id="alertBoxExhibitAcc" class="hidden"></div>
                </div>

                <form id="updateExhibitor" class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span class="required">*</span>
                            Name:
                        </label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                                <input id="first_name" type="text" class="form-control" name="first_name" maxlength="25" placeholder="Type your name">
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
                                <input id="last_name" type="text" class="form-control" name="last_name" maxlength="25" placeholder="Type your surname">
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
                                <input id="father_name" type="text" class="form-control" name="father_name" maxlength="25" placeholder="Type your father's name">
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
                                <input id="email" type="text" class="form-control" name="email" maxlength="100" placeholder="Type your e-mail">
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
                                <input id="password" type="password" class="form-control" name="password" maxlength="15" placeholder="Type your password">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span class="required">*</span>
                            Company's Name:
                        </label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-building-o" aria-hidden="true"></i></span>
                                <input id="company" type="text" class="form-control" name="company" maxlength="50" placeholder="Type your company's name" required>
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
                                <input id="country" type="text" class="form-control" name="country" maxlength="30" placeholder="Type your country" required>
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
                                <input id="city" type="text" class="form-control" name="city" maxlength="30" placeholder="Type your city" required>
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
                                <input id="postal" type="text" class="form-control" name="postal" maxlength="5" placeholder="Type your postal code" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <input id="form_submit" type="button" class="btn btn-success" value="Update Account">
                    </div>
                </form>
            </div>

            <div class="tab-pane fade in" id="exhibit-tab">
                <div class="inner-wrapper">
                    <div class="menu-head text-center">
                        <h1 class="tab-head">
                            Exhibit Submission
                        </h1>
                        <hr class="custom-hr">
                    </div>

                </div>

                <form id="exhibit_sub" class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span class="required">*</span>
                            Exhibit Title:
                        </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="exhibit_title" maxlength="30" placeholder="Type exhibit's title">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span class="required">*</span>
                            Exhibit Description:
                        </label>
                        <div class="col-md-6">
                            <textarea class="form-control" name="exhibit_desc" placeholder="Type a description for the exhibit" rows="5" ></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span class="required">*</span>
                            Size of area needed for this exhibit:
                        </label>
                        <div class="col-md-6">
                            <select id="packetSize" name="packetSize" class="form-control">
                                <option disabled selected value> -- select an option -- </option>
                                <option value="small">Small (3 m&sup2;)</option>
                                <option value="medium">Medium (5 m&sup2;)</option>
                                <option value="large">Large (10 m&sup2;)</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span class="required">*</span>
                            How many days will the exhibit be part of the exhibition:
                        </label>
                        <div class="col-md-6">
                            <select id="packetDuration" name="packetDuration" class="form-control">
                                <option disabled selected value> -- select an option -- </option>
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

                    <div class="form-group text-center">
                        <input type="button" class="btn btn-primary" value="Submit Exhibit">
                    </div>
                </form>
            </div>

            <div class="tab-pane fade in" id="review-tab">

                <div class="inner-wrapper">
                    <div class="menu-head text-center">
                        <h1 class="tab-head">
                            Exhibit's Application Status
                        </h1>
                        <hr class="custom-hr">
                    </div>
                </div>

                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Exhibit Title</th>
                        <th>Company</th>
                        <th>Cost for Stand</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Compact 3D Laser Printer</td>
                        <td>History Print</td>
                        <td>150€</td>
                        <td style="color: orangered">Awaiting Approval</td>
                    </tr>
                    <tr>
                        <td>Magic Eraser</td>
                        <td>History Print</td>
                        <td>150€</td>
                        <td style="color: green">Approved</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="tab-pane fade in" id="schedule-tab">
                <div class="inner-wrapper">
                    <div class="menu-head text-center">
                        <h1 class="tab-head">
                            Exhibitor's Schedule
                        </h1>
                        <hr class="custom-hr">
                    </div>

                </div>

                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" data-target="#monday-sc">Monday<br>31/10/2016</a></li>
                    <li><a data-toggle="tab" href="#tuesday-sc">Tuesday<br>1/11/2016</a></li>
                    <li><a data-toggle="tab" href="#wednesday-sc">Wednesday<br>2/11/2016</a></li>
                    <li><a data-toggle="tab" href="#thursday-sc">Thursday<br>3/11/2016</a></li>
                    <li><a data-toggle="tab" href="#friday-sc">Friday<br>4/11/2016</a></li>
                    <li><a data-toggle="tab" href="#saturday-sc">Saturday<br>5/11/2016</a></li>
                </ul>

                <div class="tab-content">
                    <div id="monday-sc" class="tab-pane fade in active">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Time</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>08:30 - 09:00</th>
                            </tr>
                            <tr>
                                <th>09:00 - 10:30</th>
                            </tr>
                            <tr>
                                <th>10:30 - 11:00</th>
                            </tr>
                            <tr>
                                <th>11:00 - 13:00</th>
                                <th class="mon">Exhibitor's Session</th>
                            </tr>
                            <tr>
                                <th>13:00 - 14:00</th>
                            </tr>
                            <tr>
                                <th>14:00 - 15:30</th>
                            </tr>
                            <tr>
                                <th>15:30 - 16:00</th>
                            </tr>
                            <tr>
                                <th>15:30 - 16:00</th>
                            </tr>
                            <tr>
                                <th>16:00 - 18:30</th>
                            </tr>
                            <tr>
                                <th>19:00 - 20:30</th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="tuesday-sc" class="tab-pane fade in">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Time</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>08:30 - 09:00</th>
                            </tr>
                            <tr>
                                <th>09:00 - 10:30</th>
                            </tr>
                            <tr>
                                <th>10:30 - 11:00</th>
                            </tr>
                            <tr>
                                <th>11:00 - 13:00</th>
                            </tr>
                            <tr>
                                <th>13:00 - 14:00</th>
                            </tr>
                            <tr>
                                <th>14:00 - 15:30</th>
                            </tr>
                            <tr>
                                <th>15:30 - 16:00</th>
                            </tr>
                            <tr>
                                <th>15:30 - 16:00</th>
                            </tr>
                            <tr>
                                <th>16:00 - 18:30</th>
                            </tr>
                            <tr>
                                <th>19:00 - 20:30</th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="wednesday-sc" class="tab-pane fade in">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Time</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>08:30 - 09:00</th>
                            </tr>
                            <tr>
                                <th>09:00 - 10:30</th>
                            </tr>
                            <tr>
                                <th>10:30 - 11:00</th>
                            </tr>
                            <tr>
                                <th>11:00 - 13:00</th>
                            </tr>
                            <tr>
                                <th>13:00 - 14:00</th>
                            </tr>
                            <tr>
                                <th>14:00 - 15:30</th>
                            </tr>
                            <tr>
                                <th>15:30 - 16:00</th>
                            </tr>
                            <tr>
                                <th>15:30 - 16:00</th>
                                <th class="wen">Exhibitor's Session</th>
                            </tr>
                            <tr>
                                <th>16:00 - 18:30</th>
                            </tr>
                            <tr>
                                <th>19:00 - 20:30</th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="thursday-sc" class="tab-pane fade in">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Time</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>08:30 - 09:00</th>
                            </tr>
                            <tr>
                                <th>09:00 - 10:30</th>
                            </tr>
                            <tr>
                                <th>10:30 - 11:00</th>
                            </tr>
                            <tr>
                                <th>11:00 - 13:00</th>
                            </tr>
                            <tr>
                                <th>13:00 - 14:00</th>
                            </tr>
                            <tr>
                                <th>14:00 - 15:30</th>
                            </tr>
                            <tr>
                                <th>15:30 - 16:00</th>
                            </tr>
                            <tr>
                                <th>15:30 - 16:00</th>
                            </tr>
                            <tr>
                                <th>16:00 - 18:30</th>
                            </tr>
                            <tr>
                                <th>19:00 - 20:30</th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="friday-sc" class="tab-pane fade in">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Time</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>08:30 - 09:00</th>
                            </tr>
                            <tr>
                                <th>09:00 - 10:30</th>
                            </tr>
                            <tr>
                                <th>10:30 - 11:00</th>
                                <th class="fri">Exhibitor's Session</th>
                            </tr>
                            <tr>
                                <th>11:00 - 13:00</th>
                            </tr>
                            <tr>
                                <th>13:00 - 14:00</th>
                            </tr>
                            <tr>
                                <th>14:00 - 15:30</th>
                            </tr>
                            <tr>
                                <th>15:30 - 16:00</th>
                            </tr>
                            <tr>
                                <th>15:30 - 16:00</th>
                            </tr>
                            <tr>
                                <th>16:00 - 18:30</th>
                            </tr>
                            <tr>
                                <th>19:00 - 20:30</th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="saturday-sc" class="tab-pane fade in">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Time</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>08:30 - 09:00</th>
                            </tr>
                            <tr>
                                <th>09:00 - 10:30</th>
                            </tr>
                            <tr>
                                <th>10:30 - 11:00</th>
                            </tr>
                            <tr>
                                <th>11:00 - 13:00</th>
                            </tr>
                            <tr>
                                <th>13:00 - 14:00</th>
                            </tr>
                            <tr>
                                <th>14:00 - 15:30</th>
                            </tr>
                            <tr>
                                <th>15:30 - 16:00</th>
                            </tr>
                            <tr>
                                <th>15:30 - 16:00</th>
                            </tr>
                            <tr>
                                <th>16:00 - 18:30</th>
                            </tr>
                            <tr>
                                <th>19:00 - 20:30</th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div style="margin: 1em 0 6em 0"></div>


            </div>

        </div>

    </div>
</div>

</body>
<script src="../../../static/js/jquery-2.1.4.min.js"></script>
<script src="../../../static/js/bootstrap.min.js"></script>
<script src="../../../static/js/bootstrapValidator.min.js"></script>
<script src="../../../static/js/panel/exhibitor.js"></script>
<script src="../../../static/js/home/logout.js"></script>
</html>

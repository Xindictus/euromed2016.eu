<?php

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

    require_once __DIR__ . "/../../lib/session/SessionManager.php";

    $session = new SessionManager();

    $session->startSession();
    $session->destroySession();

    echo json_encode("../../home/index.php");

}
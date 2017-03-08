<?php

require_once __DIR__ . "/../../lib/dbHandlers/DatabaseConnection.php";
require_once __DIR__ . "/../../lib/DAO/PlatformUserDAOImpl.php";

$valid = true;

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

    if (isset($_POST['email']) && !empty($_POST['email'])) {

        $conn = DatabaseConnection::startConnection();

        $impl = new PlatformUserDAOImpl($conn);

        if ($impl->checkMail($_POST['email']) == 0) {
            $valid = false;
        }

    }
}

echo json_encode(array(
    'valid' => $valid,
));
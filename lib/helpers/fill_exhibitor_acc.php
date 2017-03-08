<?php

require_once __DIR__ . '/../session/SessionManager.php';
require_once __DIR__ . '/../dbHandlers/DatabaseConnection.php';
require_once __DIR__ . '/../DAO/PlatformUserDAOImpl.php';
require_once __DIR__ . '/../DAO/ExhibitorDAOImpl.php';

$status = -1;
$response = [];

if( $_SERVER['REQUEST_METHOD'] == 'GET' ) {

    $session = new SessionManager();

    $session->startSession();

    if (isset($_SESSION['user_key']) && !empty($_SESSION['user_key'])) {

        $conn = DatabaseConnection::startConnection();

        $impl = new PlatformUserDAOImpl($conn);

        $user = $impl->selectById($_SESSION['user_key']);

        if (is_array($user)) {
            $response['first_name'] = $user[0]->getFirstName();
            $response['last_name'] = $user[0]->getLastName();
            $response['father_name'] = $user[0]->getFatherName();
            $response['email'] = $user[0]->getEmail();
            $response['password'] = "temppassword";

            $exb = new ExhibitorDAOImpl($conn);

            $exhibitor = $exb->getExhibitorById($_SESSION['user_key']);

            if (is_array($exhibitor)) {
                $response['company_name'] = $exhibitor[0]->getCompanyName();
                $response['country'] = $exhibitor[0]->getCountry();
                $response['city'] = $exhibitor[0]->getCity();
                $response['postal_code'] = $exhibitor[0]->getPostalCode();
            } else {
                DatabaseConnection::closeConnection($conn);
                echo json_encode($status);
                exit();
            }

            DatabaseConnection::closeConnection($conn);

            echo json_encode($response);
            exit();

        } else {
            DatabaseConnection::closeConnection($conn);
            echo json_encode($status);
            exit();
        }

    } else {
        echo json_encode($status);
        exit();
    }

} else {
    echo json_encode($status);
    exit();
}
<?php

require_once __DIR__ . '/../session/SessionManager.php';
require_once __DIR__ . '/../dbHandlers/DatabaseConnection.php';
require_once __DIR__ . '/../DAO/PlatformUserDAOImpl.php';
require_once __DIR__ . '/../DAO/SpeakerCandidateDAOImpl.php';

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

            $spk = new SpeakerCandidateDAOImpl($conn);

            $speaker = $spk->selectById($_SESSION['user_key']);

            if (is_array($speaker)) {
                $response['university'] = $speaker[0]->getUniversity();
                $response['faculty'] = $speaker[0]->getFaculty();
                $response['stud_level'] = $speaker[0]->getStudLevel();
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
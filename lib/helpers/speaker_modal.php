<?php

require_once __DIR__ . '/../dbHandlers/DatabaseConnection.php';
require_once __DIR__ . '/../DAO/SpeakersDAOImpl.php';

$response = [];

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

    if (isset($_POST['speaker_id']) && !empty($_POST['speaker_id'])) {

        $conn = DatabaseConnection::startConnection();

        $impl = new SpeakersDAOImpl($conn);

        $speaker = $impl->selectById($_POST['speaker_id']);

        if (is_array($speaker)) {
            $response['id'] = $speaker[0]->getSpeakerId();
            $response['fullname'] = $speaker[0]->getFullname();
            $response['title'] = $speaker[0]->getTitle();
            $response['bio'] = $speaker[0]->getBio();
            $response['image'] = $speaker[0]->getImagePath();
        }

    }
}

echo json_encode($response);
exit();
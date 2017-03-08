<?php

require_once __DIR__ . '/../dbHandlers/DatabaseConnection.php';
require_once __DIR__ . '/../DAO/SpeakersDAOImpl.php';

$response = [];

if( $_SERVER['REQUEST_METHOD'] == 'GET' ) {

    $conn = DatabaseConnection::startConnection();

    $impl = new SpeakersDAOImpl($conn);

    $speakers = $impl->selectAll();

    foreach ($speakers as $speaker) {

        array_push($response, [
            'id' => $speaker->getSpeakerId(),
            'fullname' => $speaker->getFullname(),
            'title' => $speaker->getTitle(),
            'keynote' => $speaker->getKeynote(),
            'image' => $speaker->getImagePath()
        ]);

    }
}

echo json_encode($response);
exit();
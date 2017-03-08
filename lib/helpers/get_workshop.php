<?php

require_once __DIR__ . "/../dbHandlers/DatabaseConnection.php";
require_once __DIR__ . "/../DAO/WorkshopDAOImpl.php";

if( $_SERVER['REQUEST_METHOD'] == 'GET' ) {

    if (isset($_GET['id']) && !empty($_GET['id'])) {

        $conn = DatabaseConnection::startConnection();

        $impl = new WorkshopDAOImpl($conn);

        $workshop = $impl->selectById($_GET['id']);

        if (is_array($workshop))
            $workshop = $workshop[0];

        DatabaseConnection::closeConnection($conn);

        echo json_encode([
            'workshop_title' => $workshop->getWorkshopTitle(),
            'workshop_desc' => $workshop->getWorkshopDesc(),
            'workshop_date' => $workshop->getEventDate(),
            'workshop_deadline' => $workshop->getDeadline()
        ]);
    }
}
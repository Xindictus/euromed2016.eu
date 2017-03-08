<?php

require_once __DIR__ . '/../dbHandlers/DatabaseConnection.php';
require_once __DIR__ . '/../DAO/WorkshopDAOImpl.php';
require_once __DIR__ . '/../DAO/PanelDAOImpl.php';


$status = -1;
$response = [];

if( $_SERVER['REQUEST_METHOD'] == 'GET' ) {

    if (isset($_GET['type']) && !empty($_GET['type'])) {

        $type = $_GET['type'];

        $conn = DatabaseConnection::startConnection();


        if ($type == "workshop") {

            $workIMPL = new WorkshopDAOImpl($conn);

            if (($result = $workIMPL->getTitles()) != -1) {
                foreach ($result as $workshop)
                    $response[$workshop->getWorkshopId()] = $workshop->getWorkshopTitle();
            }

        }

        if ($type == "panel") {

            $panelIMPL = new PanelDAOImpl($conn);

            if (($result = $panelIMPL->getTitles()) != -1) {
                foreach ($result as $panel)
                    $response[$panel->getPanelId()] = $panel->getPanelTitle();
            }
        }

        DatabaseConnection::closeConnection($conn);

        echo json_encode($response);
        exit();

    } else {
        echo json_encode($status);
        exit();
    }
} else {
    echo json_encode($status);
    exit();
}
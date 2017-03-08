<?php

require_once __DIR__ . "/../dbHandlers/DatabaseConnection.php";
require_once __DIR__ . "/../DAO/WorkshopDAOImpl.php";

if( $_SERVER['REQUEST_METHOD'] == 'GET' ) {

    $response = [];

    $conn = DatabaseConnection::startConnection();

    $impl = new WorkshopDAOImpl($conn);
    $workshops = $impl->getAllWorkshops();
    $row_size = 3;

    for($i = 0; $i < count($workshops); $i++){

        array_push($response,
            '<div id="' . $workshops[$i]->getWorkshopId(). '" class="col-md-4 text-center workshop-panel">'
            .'<div class="panel panel-info"><div class="panel-body somatic">'
            . $workshops[$i]->getWorkshopTitle() .
            '</div><div class="panel-footer text-center"><p style="color: blue">Click for Details</p>'
            .'</div></div></div></div>');
    }

    DatabaseConnection::closeConnection($conn);

    echo json_encode($response);
}
<?php

require_once __DIR__ . '/../dbHandlers/DatabaseConnection.php';
require_once __DIR__ . '/../session/SessionManager.php';
require_once __DIR__ . '/../DAO/PaperDAOImpl.php';

$session = new SessionManager();
$session->startSession();
$user_id = $_SESSION['user_key'];

$form_post_success = -1;

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

    $title_error = 0;
    $type_error = 0;
    $course_type_error = 0;
    $course_error = 0;

    if (isset($_POST['title']) && !empty($_POST['title'])) {
        $title = $_POST['title'];
    } else {
        echo json_encode($form_post_success);
        return;
    }

    if (isset($_POST['type']) && !empty($_POST['type'])) {
        $type = $_POST['type'];
    } else {
        echo json_encode($form_post_success);
        return;
    }

    if (isset($_POST['course_type']) && !empty($_POST['course_type'])) {
        $course_type = $_POST['course_type'];
    } else {
        echo json_encode($form_post_success);
        return;
    }

    if (isset($_POST['course']) && !empty($_POST['course'])) {
        $course = $_POST['course'];
    } else {
        echo json_encode($form_post_success);
        return;
    }

    $user_id = $_SESSION['user_key'];

    if (isset($_FILES['paper']['name']) && !empty($_FILES['paper']['name'])) {
        $file = $_FILES['paper'];

        if ($_FILES['paper']['type'] != 'application/pdf') {
            echo json_encode($form_post_success);
            return;
        }

        $uploaddir = __DIR__ . '/../../static/papers/';

        $fileName = "paper_{$user_id}_{$course_type}_{$course}";
        $uploadfile = $uploaddir . basename($fileName) . '.pdf';

    } else {
        echo json_encode($form_post_success);
        return;
    }

    $conn = DatabaseConnection::startConnection();

    $paper = new PaperDAOImpl($conn);

    if ($paper->insertPaper($user_id, $title, $type, $course_type, $course, 0, $uploaddir) == -1) {
        echo json_encode($form_post_success);
        return;
    }

//    if(file_exists("documenti/$fileName")) unlink("documenti/$fileName");
    if (!move_uploaded_file($file['tmp_name'], $uploadfile)) {
        echo json_encode($form_post_success);
        return;
    }

    DatabaseConnection::closeConnection($conn);

    $form_post_success = 0;
    echo json_encode($form_post_success);
    return;

} else {
    echo json_encode($form_post_success);
    return;
}

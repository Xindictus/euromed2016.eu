<?php

$form_post_success = -1;

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

    $first_name_error = 0;
    $last_name_error = 0;
    $father_name_error = 0;
    $email_error = 0;
    $password_error = 0;

    if (isset($_POST['first_name']) && !empty($_POST['first_name'])) {
        $first_name = $_POST['first_name'];
    } else {
        $first_name = NULL;
        $first_name_error = 1;
    }

    if (isset($_POST['last_name']) && !empty($_POST['last_name'])) {
        $last_name = $_POST['last_name'];
    } else {
        $last_name = NULL;
        $last_name_error = 1;
    }

    if (isset($_POST['father_name']) && !empty($_POST['father_name'])) {
        $father_name = $_POST['father_name'];
    } else {
        $father_name = NULL;
        $father_name_error = 1;
    }

    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $email = NULL;
        $email_error = 1;
    }

    if(isset($_POST['password']) && !empty($_POST['password'])){
        $password = $_POST['password'];
    } else {
        $password = NULL;
        $password_error = 1;
    }

    if($first_name_error != 1 && $last_name_error != 1
        && $father_name_error != 1 && $email_error != 1
        && $password_error != 1){

        require_once __DIR__ . "/../../lib/session/SessionManager.php";
        require_once __DIR__ . "/../../lib/dbHandlers/DatabaseConnection.php";
        require_once __DIR__ . "/../../lib/DAO/PlatformUserDAOImpl.php";
        require_once __DIR__ . "/../../lib/DAO/UserAuthenticationDAOImpl.php";

        $conn = DatabaseConnection::startConnection();

        $session = new SessionManager();
        $session->startSession();

        $user = new PlatformUserDAOImpl($conn);

        if ($user->updateAllFields($_SESSION['user_key'], $first_name, $last_name,
                $father_name, $email) != -1) {

            $auth = new UserAuthenticationDAOImpl($conn);

            if ($password == "") {
                if ($auth->updateEmail($_SESSION['user_key'], $email) == -1) {
                    DatabaseConnection::closeConnection($conn);
                    echo json_encode($form_post_success);
                    return;
                }
            } else {
                if ($auth->updateAllFields($_SESSION['user_key'], $email, $password) == -1) {
                    DatabaseConnection::closeConnection($conn);
                    echo json_encode($form_post_success);
                    return;
                }
            }

            DatabaseConnection::closeConnection($conn);

        } else {
            DatabaseConnection::closeConnection($conn);
            echo json_encode($form_post_success);
            return;
        }

        $form_post_success = 0;
        echo json_encode($form_post_success);
        return;

    } else{
        echo json_encode($form_post_success);
        return;
    }


} else {
    echo json_encode($form_post_success);
    return;
}
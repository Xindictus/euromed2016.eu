<?php

$form_post_success = [-1];

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

    $email_log_error = 0;
    $pass_log_error = 0;

    if (isset($_POST['email_log']) && !empty($_POST['email_log'])) {
        $email_log = $_POST['email_log'];
    } else {
        $email_log = null;
        $email_log_error = 1;
    }

    if (isset($_POST['pass_log']) && !empty($_POST['pass_log'])) {
        $pass_log = $_POST['pass_log'];
    } else {
        $pass_log = null;
        $pass_log_error = 1;
    }

    if ($email_log_error != 1 && $pass_log_error != 1) {

        require_once __DIR__ . "/../../lib/dbHandlers/DatabaseConnection.php";
        require_once __DIR__ . "/../../lib/DAO/PlatformUserDAOImpl.php";
        require_once __DIR__ . "/../../lib/DAO/UserAuthenticationDAOImpl.php";
        require_once __DIR__ . "/../../lib/session/SessionManager.php";

        $conn = DatabaseConnection::startConnection();

        $auth = new UserAuthenticationDAOImpl($conn);

        $loginResult = $auth->checkLogin($email_log, $pass_log);

        if ($loginResult == -1) {
            echo json_encode($form_post_success);
            return;
        }

        $user = new PlatformUserDAOImpl($conn);
        $result = $user->selectByEmail($email_log);

        DatabaseConnection::closeConnection($conn);

        if (is_array($result)) {
            $session = new SessionManager($result[0]->getUserId(),
                $result[0]->getFirstName(), $result[0]->getLastName(),
                $result[0]->getRole());

            $session->startNewSession();

        } else {

            echo json_encode($form_post_success);
            return;
        }

        $form_post_success[0] = 0;
        $role = strtolower($result[0]->getRole());
        $form_post_success[1] = "../../views/panel/{$role}/";
        echo json_encode($form_post_success);
        return;

    } else{
        echo json_encode($form_post_success);
        return;
    }
} else{
    echo json_encode($form_post_success);
    return;
}
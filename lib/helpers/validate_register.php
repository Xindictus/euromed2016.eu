<?php

$form_post_success = -1;

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

    $first_name_error = 0;
    $last_name_error = 0;
    $father_name_error = 0;
    $email_error = 0;
    $password_error = 0;
    $password_confirmation_error = 0;
    $password_mismatch = 0;
    $participationChoice_error = 0;
    $recaptcha_error = 0;
    /******************************************************************/
    $stud_level = null;
    $university = null;
    $faculty = null;
    /******************************************************************/
    $company = null;
    $country = null;
    $city = null;
    $postal = null;

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

    if (isset($_POST['vpassword']) && !empty($_POST['vpassword'])) {
        $password_confirmation = $_POST['vpassword'];
    } else {
        $password_confirmation = NULL;
        $password_confirmation_error = 1;
    }

    if(strcmp($password, $password_confirmation) != 0){
        $password_mismatch = 1;
    }

    if (isset($_POST['participationChoice']) && !empty($_POST['participationChoice'])) {
        $participationChoice = $_POST['participationChoice'];
    } else {
        $participationChoice = NULL;
        $participationChoice_error = 1;
    }

    if (isset($_POST['g-recaptcha-response'])) {
        $recaptchaResponse = $_POST['g-recaptcha-response'];
        $userIP = $_SERVER["REMOTE_ADDR"];
        $secretKey = "6Lc7pxAUAAAAAJ2ggW5ZUc05tSVIolGj8x-ygDuK";
        $request = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$recaptchaResponse}&remoteip={$userIP}");

        if(!strstr($request, "true")){
            $recaptcha_error = 1;
        }
    } else {
        $recaptchaResponse = null;
        $recaptcha_error = 1;
    }

    switch ($participationChoice) {
        case "speaker":
            if (isset($_POST['stud_level']) && !empty($_POST['stud_level']))
                $stud_level = $_POST['stud_level'];
            else {
                echo json_encode($form_post_success);
                return;
            }

            if (isset($_POST['university']) && !empty($_POST['university']))
                $university = $_POST['university'];
            else {
                echo json_encode($form_post_success);
                return;
            }

            if (isset($_POST['faculty']) && !empty($_POST['faculty']))
                $faculty = $_POST['faculty'];
            else {
                echo json_encode($form_post_success);
                return;
            }

            break;
        case "exhibitor":

            if (isset($_POST['company']) && !empty($_POST['company']))
                $company = $_POST['company'];
            else {
                echo json_encode($form_post_success);
                return;
            }

            if (isset($_POST['country']) && !empty($_POST['country']))
                $country = $_POST['country'];
            else {
                echo json_encode($form_post_success);
                return;
            }

            if (isset($_POST['city']) && !empty($_POST['city']))
                $city = $_POST['city'];
            else {
                echo json_encode($form_post_success);
                return;
            }

            if (isset($_POST['postal']) && !empty($_POST['postal']))
                $postal = $_POST['postal'];
            else {
                echo json_encode($form_post_success);
                return;
            }

            break;
        default:
            break;
    }

    if($first_name_error != 1 && $last_name_error != 1
        && $father_name_error != 1 && $email_error != 1
        && $password_error != 1 && $password_confirmation_error != 1
        && $password_mismatch != 1 && $participationChoice_error != 1
        && $recaptcha_error != 1){

        require_once __DIR__ . "/../../lib/dbHandlers/DatabaseConnection.php";
        require_once __DIR__ . "/../../lib/DAO/PlatformUserDAOImpl.php";
        require_once __DIR__ . "/../../lib/DAO/UserAuthenticationDAOImpl.php";
        require_once __DIR__ . "/../../lib/DAO/SpeakerCandidateDAOImpl.php";
        require_once __DIR__ . "/../../lib/DAO/ExhibitorDAOImpl.php";

        $conn = DatabaseConnection::startConnection();

        $user = new PlatformUserDAOImpl($conn);

        if ($user->insertPlatformUser($first_name, $last_name,
                $father_name, $email, $participationChoice) == -1){
            $form_post_success = -2;
            echo json_encode($form_post_success);
            return;
        }

        $user_id = $conn->lastInsertId();
        $hash = password_hash($password, PASSWORD_BCRYPT);

        $auth = new UserAuthenticationDAOImpl($conn);
        if ($auth->insertAuthentication($user_id, $email, $hash) == -1) {
            $form_post_success = -2;
            echo json_encode($form_post_success);
            return;
        }

        switch ($participationChoice) {
            case "speaker":
                $speaker = new SpeakerCandidateDAOImpl($conn);
                if ($speaker->insertCandidate($user_id, $university, $faculty, $stud_level) == -1) {
                    echo json_encode($form_post_success);
                    return;
                }
                break;
            case "exhibitor":
                $exhibitor = new ExhibitorDAOImpl($conn);
                if ($exhibitor->insertExhibitor($user_id, $company, $country, $city, $postal) == -1) {
                    echo json_encode($form_post_success);
                    return;
                }
                break;
        }

        DatabaseConnection::closeConnection($conn);

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
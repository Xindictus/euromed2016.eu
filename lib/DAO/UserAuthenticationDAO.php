<?php

require_once __DIR__ . '/../models/UserAuthentication.php';

interface UserAuthenticationDAO
{
    public function insertAuthentication($user_id, $username, $user_pass);

    public function checkLogin($email, $pass);

    public function updateEmail($user_id, $username);

    public function updateAllFields($user_id, $username, $user_pass);
}
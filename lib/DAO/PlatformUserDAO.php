<?php

require_once __DIR__ . '/../models/PlatformUser.php';

interface PlatformUserDAO
{
    public function insertPlatformUser($first_name, $last_name, $father_name,
                                       $email, $role);

    public function selectById($user_id);

    public function getAllUsers();

    public function checkMail($email);

    public function updateAllFields($user_id, $first_name, $lastName, $fatherName, $email);
}
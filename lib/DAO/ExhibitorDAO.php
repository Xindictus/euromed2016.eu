<?php

require_once __DIR__ . '/../models/Exhibitor.php';

interface ExhibitorDAO
{
    public function insertExhibitor($user_id, $company_name, $country, $city, $postal_code);

    public function getExhibitorById($user_id);

    public function updateExhibitor($user_id, $company_name, $country, $city, $postal_code);
}
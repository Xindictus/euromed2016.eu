<?php

require_once '../models/Exhibit.php';

interface ExhibitDAO
{
    public function getExhibitStatus($exhibit_id);

    public function insertExhibit($exhibit_title, $company_name, $cost, $exhibit_status);
}
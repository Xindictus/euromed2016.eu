<?php

require_once __DIR__ . '/../models/Workshop.php';

interface WorkshopDAO
{
    public function selectById($workshop_id);

    public function getAllWorkshops();

    public function getCount();

    public function getTitles();
}
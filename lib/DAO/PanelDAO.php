<?php

require_once __DIR__ . '/../models/Panel.php';

interface PanelDAO
{
    public function getTitles();
}
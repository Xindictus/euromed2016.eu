<?php

require_once __DIR__ . '/../models/Speaker.php';

interface SpeakersDAO
{
    public function selectAll();

    public function selectById($speaker_id);

    public function selectKeynote();

    public function selectNonKeynote();
}
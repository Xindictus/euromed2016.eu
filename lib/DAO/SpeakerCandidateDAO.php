<?php

require_once __DIR__ . '/../models/SpeakerCandidate.php';

interface SpeakerCandidateDAO
{
    public function insertCandidate($user_id, $university, $faculty, $stud_level);

    public function selectById($user_id);

    public function updateSpeakerCandidate($user_id, $university, $faculty, $stud_level);
}
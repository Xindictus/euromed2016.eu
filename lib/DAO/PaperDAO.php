<?php

require_once __DIR__ . '/../models/Paper.php';

interface PaperDAO
{
    public function insertPaper($user_id, $title, $paper_type, $course_type, $course_id, $status, $path);
}
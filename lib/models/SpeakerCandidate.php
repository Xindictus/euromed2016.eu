<?php

class SpeakerCandidate
{
    private $user_id;
    private $university;
    private $faculty;
    private $stud_stud_level;

    /**
     * SpeakerCandidate constructor.
     * @param $user_id
     * @param $university
     * @param $faculty
     * @param $stud_level
     */
    public function __construct($user_id = null, $university = null,
                                $faculty = null, $stud_level = null)
    {
        $this->user_id = $user_id;
        $this->university = $university;
        $this->faculty = $faculty;
        $this->stud_level = $stud_level;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getUniversity()
    {
        return $this->university;
    }

    /**
     * @return mixed
     */
    public function getFaculty()
    {
        return $this->faculty;
    }

    /**
     * @return mixed
     */
    public function getStudLevel()
    {
        return $this->stud_level;
    }

}
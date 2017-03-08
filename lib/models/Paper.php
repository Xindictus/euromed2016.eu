<?php

class Paper
{
    private $paper_id;
    private $user_id;
    private $title;
    private $paper_type;
    private $course_type;
    private $course_id;
    private $status;
    private $path;

    /**
     * Paper constructor.
     * @param $paper_id
     * @param $user_id
     * @param $title
     * @param $paper_type
     * @param $course_type
     * @param $course_id
     * @param $status
     * @param $path
     */
    public function __construct($paper_id = null, $user_id = null, $title = null,
                                $paper_type = null, $course_type = null,
                                $course_id = null, $status = null, $path = null)
    {
        $this->paper_id = $paper_id;
        $this->user_id = $user_id;
        $this->title = $title;
        $this->paper_type = $paper_type;
        $this->course_type = $course_type;
        $this->course_id = $course_id;
        $this->status = $status;
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getPaperId()
    {
        return $this->paper_id;
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getPaperType()
    {
        return $this->paper_type;
    }

    /**
     * @return mixed
     */
    public function getCourseType()
    {
        return $this->course_type;
    }

    /**
     * @return mixed
     */
    public function getCourseId()
    {
        return $this->course_id;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }
}
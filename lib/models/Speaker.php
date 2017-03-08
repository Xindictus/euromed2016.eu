<?php

class Speaker{

    private $speaker_id;
    private $fullname;
    private $title;
    private $bio;
    private $keynote;
    private $image_path;

    public function __construct($speaker_id = null, $fullname = null,
                                $title = null, $bio = null, $keynote = null, $image_path = null)
    {
        $this->speaker_id = $speaker_id;
        $this->fullname = $fullname;
        $this->title = $title;
        $this->bio = $bio;
        $this->keynote = $keynote;
        $this->image_path = $image_path;
    }

    public function getSpeakerId()
    {
        return $this->speaker_id;
    }

    public function getFullname()
    {
        return $this->fullname;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getBio()
    {
        return $this->bio;
    }

    public function getKeynote()
    {
        return $this->keynote;
    }

    public function getImagePath()
    {
        return $this->image_path;
    }
}
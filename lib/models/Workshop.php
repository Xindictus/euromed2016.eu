<?php

class Workshop
{
    private $workshop_id;
    private $workshop_title;
    private $workshop_desc;
    private $event_date;
    private $deadline;

    public function __construct($workshop_id = null, $workshop_title = null, $workshop_desc = null,
                                $event_date = null, $deadline = null)
    {
        $this->workshop_id = $workshop_id;
        $this->workshop_title = $workshop_title;
        $this->workshop_desc = $workshop_desc;
        $this->event_date = $event_date;
        $this->deadline = $deadline;
    }

    public function getWorkshopId()
    {
        return $this->workshop_id;
    }

    public function getWorkshopTitle()
    {
        return $this->workshop_title;
    }

    public function getWorkshopDesc()
    {
        return $this->workshop_desc;
    }

    public function getEventDate()
    {
        return $this->event_date;
    }

    public function getDeadline()
    {
        return $this->deadline;
    }

}
<?php

class Exhibit
{
    private $exhibit_id;
    private $exhibit_title;
    private $company_name;
    private $cost;
    private $exhibit_status;

    /**
     * Exhibit constructor.
     * @param $exhibit_id
     * @param $exhibit_title
     * @param $company_name
     * @param $cost
     */
    public function __construct($exhibit_id = null, $exhibit_title = null,
                                $company_name = null, $cost = null, $exhibit_status = null)
    {
        $this->exhibit_id = $exhibit_id;
        $this->exhibit_title = $exhibit_title;
        $this->company_name = $company_name;
        $this->cost = $cost;
        $this->exhibit_status = $exhibit_status;
    }

    /**
     * @return null
     */
    public function getExhibitId()
    {
        return $this->exhibit_id;
    }

    /**
     * @return null
     */
    public function getExhibitTitle()
    {
        return $this->exhibit_title;
    }

    /**
     * @return null
     */
    public function getCompanyName()
    {
        return $this->company_name;
    }

    /**
     * @return null
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @return null
     */
    public function getExhibitStatus()
    {
        return $this->exhibit_status;
    }

}
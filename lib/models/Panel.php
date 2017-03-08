<?php

class Panel
{
    private $panel_id;
    private $panel_title;
    private $start_date;

    /**
     * Panel constructor.
     * @param $panel_id
     * @param $panel_title
     * @param $start_date
     */
    public function __construct($panel_id = null, $panel_title = null,
                                $start_date = null)
    {
        $this->panel_id = $panel_id;
        $this->panel_title = $panel_title;
        $this->start_date = $start_date;
    }

    /**
     * @return null
     */
    public function getPanelId()
    {
        return $this->panel_id;
    }

    /**
     * @return null
     */
    public function getPanelTitle()
    {
        return $this->panel_title;
    }

    /**
     * @return null
     */
    public function getStartDate()
    {
        return $this->start_date;
    }
}
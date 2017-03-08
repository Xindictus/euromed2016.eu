<?php

class Exhibitor
{
    private $user_id;
    private $company_name;
    private $country;
    private $city;
    private $postal_code;

    /**
     * Exhibitor constructor.
     * @param $user_id
     * @param $company_name
     * @param $country
     * @param $city
     * @param $postal_code
     */
    public function __construct($user_id = null, $company_name = null,
                                $country = null, $city = null, $postal_code = null)
    {
        $this->user_id = $user_id;
        $this->company_name = $company_name;
        $this->country = $country;
        $this->city = $city;
        $this->postal_code = $postal_code;
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
    public function getCompanyName()
    {
        return $this->company_name;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return mixed
     */
    public function getPostalCode()
    {
        return $this->postal_code;
    }

}
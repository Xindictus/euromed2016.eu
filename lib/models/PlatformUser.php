<?php

class PlatformUser
{
    private $user_id;
    private $first_name;
    private $last_name;
    private $father_name;
    private $email;
    private $role;

    /**
     * PlatformUser constructor.
     * @param $user_id
     * @param $first_name
     * @param $last_name
     * @param $father_name
     * @param $email
     * @param $role
     */
    public function __construct($user_id = null, $first_name = null,
                                $last_name = null, $father_name = null,
                                $email = null, $role = null)
    {
        $this->user_id = $user_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->father_name = $father_name;
        $this->email = $email;
        $this->role = $role;
    }

    /**
     * @return null
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @return null
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @return null
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @return null
     */
    public function getFatherName()
    {
        return $this->father_name;
    }

    /**
     * @return null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return null
     */
    public function getRole()
    {
        return $this->role;
    }

}
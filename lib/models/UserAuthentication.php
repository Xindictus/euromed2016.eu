<?php

class UserAuthentication
{
    private $user_id;
    private $username;
    private $user_pass;

    /**
     * UserAuthentication constructor.
     * @param $user_id
     * @param $username
     * @param $user_pass
     */
    public function __construct($user_id = null, $username = null, $user_pass = null)
    {
        $this->user_id = $user_id;
        $this->username = $username;
        $this->user_pass = $user_pass;
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
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return null
     */
    public function getUserPass()
    {
        return $this->user_pass;
    }


}
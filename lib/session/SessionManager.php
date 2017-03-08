<?php

class SessionManager
{
    private $user_id;
    private $full_name;
    private $role;

    /**
     * SessionManager constructor.
     * @param null $user_id
     * @param null $firstName
     * @param null $lastName
     * @param null $role
     */
    public function __construct($user_id = null, $firstName = null, $lastName = null, $role = null){
        $this->user_id = $user_id;
        $this->full_name = "$firstName $lastName";
        $this->role = $role;
    }

    public function startNewSession(){

        session_name("EAM4EVER");
        session_start();
        session_regenerate_id(true);
        $_SESSION["user_key"] = $this->user_id;
        $_SESSION["full_name"] = $this->full_name;
        $_SESSION["role"] = $this->role;
        $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
        $_SESSION['remote_ip'] = $_SERVER['REMOTE_ADDR'];
    }

    public function startSession()
    {
        session_name("EAM4EVER");
        session_start();
    }

    public function destroySession(){
        session_unset();
        session_destroy();
    }

    public function checkSession()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_name("EAM4EVER");
            session_start();
        }

        $login_flag = 0;
        if( isset($_SESSION['user_key']) && isset($_SESSION['full_name']) && isset($_SESSION['role'])
            && isset($_SESSION['user_agent']) && isset($_SESSION['remote_ip'])){

            if($_SESSION['user_agent'] == $_SERVER['HTTP_USER_AGENT'] && $_SESSION['remote_ip'] == $_SERVER['REMOTE_ADDR']){
                $login_flag = 1;
                session_regenerate_id(true);
            }
        }

//        echo $login_flag."<br>";
//        echo "ID: " . $_SESSION['user_key'] . " - Name: " . $_SESSION['full_name']." - Role: " . $_SESSION['role'] . "<br>";
//        echo "SESAG:".$_SESSION['user_agent']."<br>SERVAG:".$_SERVER['HTTP_USER_AGENT']."<br>";
//        echo "SESADDR:".$_SESSION['remote_ip']."<br>SERVADDR:".$_SERVER['REMOTE_ADDR']."<br>";

        if($login_flag == 0) {
            $this->destroySession();
            echo "<script>window.location.href = '../../home/index.php'; </script>";
            exit;
        }
    }
}
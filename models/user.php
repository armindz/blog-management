<?php 

class User {

    private $username;
    private $password;
    private $id;
    
    function __construct($username, $password, $id)
    {
        $this->username = $username;
        $this->password = $password;
        $this->id = $id;
    }

    function get_username() {
        return $this->username;
    }

    function get_password() {
        return $this->password;
    }

    function get_id() {
        return $this->id;
    }
    
}


?>
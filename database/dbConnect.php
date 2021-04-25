<?php
class dbConnect
{
    function connect()
    {
        require_once('config.php');
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if (!$conn) // testing the connection  
        {
            die("Cannot connect to the database");
        }
        return $conn;
    }
    public function Close()
    {
        mysqli::close();
    }
}

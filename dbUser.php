<?php 

require_once 'dbConnect.php';
require_once 'user.php';

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 


    class dbUser extends dbConnect {

        function __construct()
        {
            $dbConn = new dbConnect(); 
        }
        
        public function storeUser($username, $password, $id) {
    
            $sql = "INSERT INTO users VALUES ('".$username."','".$password."' ,'".$id."')";
            $query = $this->connect()->query($sql);

        }

        public function storeUserToDatabase ($user) {
            
           
            $username = $user->get_username();
            $password = $user->get_password();
            $id = $user->get_id();
            
            if($this->isUsernameUnique($username)){
                $sql = "INSERT INTO users VALUES ('".$username."', MD5('".$password."') ,'".$id."')";
                $query = $this->connect()->query($sql);
                return $query;

            }
        }

        public function isUsernameUnique($username) {

            $sql = "SELECT * FROM users WHERE username = '".$username."'";
            $result = $this->connect()->query($sql);
            $numOfRows = $result->num_rows;

            if($numOfRows == 0) {
                return true;
            }
            else {
                return false;
            }
        }

        public function getAllUsers() {

            $sql = "SELECT * FROM users";
            $result = $this->connect()->query($sql);

            $numOfRows = $result->num_rows;

            if ($numOfRows > 0) {
                while($row = $result->fetch_assoc())
            
                $data[] = $row;
            
            }
            return $data;

        }

        public function login($username, $password) {

           
            $sql = "SELECT * FROM users WHERE username = '".$username."' AND password = MD5('".$password."')";
            $result = $this->connect()->query($sql);  
            
            $numOfRows = $result->num_rows;

            if($numOfRows == 1) {
                $userData = $result->fetch_array();
                $_SESSION['login'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $userData['id'];
                
                return $userData['id'];
            }

            else {
                return false;
            }
        }

        public function getUsernameFromUserId($userId) {

            $sql = "SELECT * FROM users WHERE id='".$userId."'";
            $result = $this->connect()->query($sql);

            if($result->num_rows > 0) {

                while ($row = mysqli_fetch_array($result)) {

                    $username = $row['username'];
                    return $username;
                    
                }
            }
        }

        function getUserByUserData ($username,$password) {


            $sql = "SELECT * FROM users WHERE username = '".$username."' AND password = '".$password."'";
            $result = $this->connect()->query($sql);  
            
            if ($result->num_rows > 0) {
                $userData = $result->fetch_array();
                $username = $userData['username'];
                $password = $userData['password'];
                $id = $userData['id'];
                $user = new User($username, $password, $id);
                return $user;
            }
            return false;
            
        }
        function displayUsersData() {

          $datas = $this->getAllUsers();
         foreach ($datas as $data) {
    
                 echo $data['username'];
                 echo $data['password'];
                 echo $data['id'];
    }
}



function generateUserId() {
    $last_id = mysqli_insert_id($this->connect());
   return $last_id;

}








    }
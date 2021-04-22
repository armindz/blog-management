<?php 
require_once 'dbConnect.php';
require_once 'post.php';
    class dbPost extends dbConnect {
        
        function __construct()
        {
            $dbConn = new dbConnect(); 
        }

        function storePostToDb($title,$content,$date,$imageURL) {

            $id = $this->generatePostId();
            $dateFormat = date("Y-m-d", strtotime($date));
            $sql = "INSERT INTO posts VALUES ('".$id."','".$title."','".$content."','".$dateFormat."','".$imageURL."')";
           
            if($this->connect()->query($sql)) {
                return true;
            }
            else {
                return false;
            }
           
        }
/*
        function storePostToDatabase($post) {

            $id = $post->get_id();
            $title = $post->get_title();
            $content = $post->get_content();
            $date = $post->get_date();
            $imageURL = $post->get_imageURL();

            $sql = "INSERT INTO posts VALUES ('".$id."','".$title."','".$content."','".$date."','".$imageURL."')";

            if($result = $this->connect()->query($sql)) {
                return true;
            }
            else {
                return false;
            }
            
        }
*/


        function getAllPosts () {

            $sql = "SELECT * FROM posts";
            $result = $this->connect()->query($sql);

            $listOfPosts = array();
            if ($result->num_rows > 0) {
                while($row = mysqli_fetch_assoc($result)) {

                    $listOfPosts[] = $row;
                }



            }
        
            return $listOfPosts;

        
        }
        function getPostByPostId ($postId) {

            $sql = "SELECT * FROM posts WHERE id='".$postId."'";

            $result = $this->connect()->query($sql);

            if($result->num_rows > 0) {
                $postData = $result->fetch_array();
                $title = $postData['title'];
                $content = $postData['content'];
                $date = $postData['date'];
                $imageURL = $postData['imageURL'];
                $post = new Post ($postId, $title, $content, $date, $imageURL);
                return $post;
            }

            else {
                return false;
            }
        }

        function generatePostId() {
            $lastId = mysqli_insert_id($this->connect());
            return $lastId;

        }


    }





?>
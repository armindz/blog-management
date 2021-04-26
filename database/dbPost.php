<?php
require_once __DIR__ . "/dbConnect.php";
require_once __DIR__ . "/../models/post.php";

class dbPost extends dbConnect
{

    function __construct()
    {
        $dbConn = new dbConnect();
    }

    // store post to db based on post's data
    function storePostToDb($title, $content, $date, $imageURL, $author)
    {

        $id = $this->generatePostId();
        $dateFormat = date("Y-m-d", strtotime($date));
        $sql = "INSERT INTO posts VALUES ('" . $id . "','" . $title . "','" . $content . "','" . $dateFormat . "','" . $imageURL . "','" . $author . "')";

        if ($this->connect()->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
    // store post to database by forwarding post obj
    function storePostToDatabase($post)
    {

        $id = $post->get_id();
        $title = $post->get_title();
        $content = $post->get_content();
        $date = $post->get_date();
        $imageURL = $post->get_imageURL();

        $sql = "INSERT INTO posts VALUES ('" . $id . "','" . $title . "','" . $content . "','" . $date . "','" . $imageURL . "')";

        if ($result = $this->connect()->query($sql)) {
            return true;
        } else {
            return false;
        }
    }


    // return all posts as array
    function getAllPosts()
    {

        $sql = "SELECT * FROM posts";
        $result = $this->connect()->query($sql);

        $listOfPosts = array();
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                $listOfPosts[] = $row;
            }
        }

        return $listOfPosts;
    }

    // return post related to forwarded id
    function getPostByPostId($postId)
    {

        $sql = "SELECT * FROM posts WHERE id='" . $postId . "'";

        $result = $this->connect()->query($sql);

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_array($result)) {

                $id = $row['id'];
                $title = $row['title'];
                $date = $row['date'];
                $content = $row['content'];
                $imageURL = $row['imageURL'];
                $author = $row['author'];

                $post = new Post($id, $title, $content, $date, $imageURL, $author);
                return $post;
            }
        }
    }

    //remove post from db
    function deletePostFromDatabase($postId)
    {

        $sql = "DELETE FROM posts WHERE id='" . $postId . "'";

        if ($result = $this->connect()->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    // return list of posts related to specific user's id
    function getPostsRelatedToUser($userId)
    {
        $sql = "SELECT * FROM posts WHERE author='" . $userId . "'";
        $result = $this->connect()->query($sql);

        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $listOfPosts[] = $row;
            }
            return $listOfPosts;
        }
        return false;
    }

    // generate post id based on last inserted id in db
    function generatePostId()
    {
        $lastId = mysqli_insert_id($this->connect());
        return $lastId;
    }
}

<?php 
require_once 'dbPost.php';
$postId = $_POST['postId'];

$postDb = new dbPost();

if($postDb->deletePostFromDatabase($postId)) {
    header('location:index.php');
}

else {

    echo "Post cannot be deleted";
}









?>
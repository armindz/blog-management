<?php

require_once __DIR__ . "/../database/dbPost.php";

$postId = $_POST['postId'];
$postDb = new dbPost();

if ($postDb->deletePostFromDatabase($postId)) { // if post is successfully deleted, redirect to homepage
    header('location:../index.php');
} else {
    echo "Post cannot be deleted";
}

<?php
require_once __DIR__ . "/../database/dbPost.php";

if (isset($_POST['createPost'])) {  // proceed if new post button is clicked 

    $postDb = new dbPost();

    $title = $_POST['title'];
    $date = $_POST['date'];
    $content = $_POST['content'];
    $imageURL = $_POST['imageURL'];
    $author = $_POST['author'];

    if ($postDb->storePostToDb($title, $content, $date, $imageURL, $author)) { // redirect to homepage if stored to db
        header('location:../index.php');
    } else {
        echo "Failed";
    }
}

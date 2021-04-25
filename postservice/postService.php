<?php 
require_once __DIR__ . "/../database/dbPost.php";


if(isset($_POST['createPost'])) {

$postDb = new dbPost();

$title = $_POST['title'];
$date = $_POST['date'];
$content = $_POST['content'];
$imageURL = $_POST['imageURL'];
$author = $_POST['author'];



if ($postDb->storePostToDb($title, $content, $date, $imageURL,$author)) {
    header('location:../index.php');
}

else {
    echo "Failed";

}


    
}

?>
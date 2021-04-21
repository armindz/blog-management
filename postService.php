<?php 
require_once 'dbPost.php';

if(isset($_POST['createPost'])) {

$postDb = new dbPost();

$title = $_POST['title'];
$date = $_POST['date'];
$content = $_POST['content'];
$imageURL =$_POST['imageURL'];



if ($postDb->storePostToDb($title, $content, $date, $imageURL)) {
    echo "Success";
}

else {
    echo "Failed";

}


    
}

?>
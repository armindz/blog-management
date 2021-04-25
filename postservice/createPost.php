
<?php


//start session
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

//redirect if logged in
if(!isset($_SESSION['user'])){
    header('location:userservice/login.php');
}


?>




<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
<title>Create post - Blog Management</title>
<link rel="icon" href="../img/logo/bmicon.png">
<link rel="stylesheet" href="../css/bootstrap.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
<script rel="text/javascript" src="js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</head>

<body>


<header>

<!-- ---------------------- NORMAL HEADER ------------------- -->
<nav class="navbar navbar-expand-lg navbar-light float-left ">

<!-- logo brand -->
<div class="col-2 mx-auto d-none d-lg-block  ">
    <a class="navbar-brand" href="index.php">
        <img class="logo" src="../img/logo/bmLogo.png">
    </a>
</div>
<!-- /logo brand-->

<!-- navbar items -->
<div class="col-4 mx-auto d-none d-lg-block ">
    <ul class="navbar-nav float-end">
        <li class="nav-item activeBorderBottom mx-3">
            <a class="nav-link text-light " href="../index.php">Homepage</a>
        </li>
        
        <li class="nav-item mx-4">
            <a class="nav-link disabled" href="#">My profile</a>
        </li>
    </ul>

</div>
<!-- /navbar items -->


<!-- search bar -->
<div class="col-2 mx-auto d-none d-lg-block">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Search..">
        <div class="input-group-append">
            <button class="btn btn-secondary" type="button">
                <i class="bi bi-search"></i>
          </button>
        </div>
    </div>

</div>
<div class="col-1 mx-auto d-none d-lg-block">
<p class="text-light text-center mx-auto my-auto" > <?php echo "Hi, ". $_SESSION['username']; ?>
</div>
<div class="col-2 mx-auto d-none d-lg-block">

<form name="logout" method="post" action="userservice/logoutService.php">
<button class="btn btn-primary" name="logout" alt="Log out" type="submit">
<i class="bi bi-box-arrow-right">Log out</i>
</button>
</form>

</div>
<!-- /search bar -->

</nav>
<!-- ---------------------- END OF NORMAL HEADER ------------------- -->




<!-- ---------------------- SMALL HEADER ------------------- -->
<nav class="navbar navbar-light float-left ">

<!-- navbar brand -->
<div class="col-11  d-block d-lg-none">

<a href="index.php" class="navbar-brand mx-auto "><img id="logoSmall" src="../img/logo/bmicon.png"></a>

<!-- /navbar brand -->


<!-- collapse button -->
<button class="navbar-toggler toggler-example text-light float-end" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><span class="dark-blue-text"><i
class="bi bi-list"></i></span></button>
<!-- /collapse button -->

<!-- collapsible content -->
<div class="collapse navbar-collapse text-center" id="navbarSupportedContent1">

    <!-- navbar items -->
    <ul class="navbar-nav mr-auto ">
        <li class="nav-item activeBorderBottom">
            <a class="nav-link text-light" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-light" href="#">My profile</a>
        </li>
     

        <li>
            <form name="logout" method="post" action="userservice/logoutService.php">
                <button class="btn btn-primary" name="logout" alt="Log out" type="submit">
                    <i class="bi bi-box-arrow-right"> Log out</i>
                </button>
            </form>
        </li>
    </ul>
    <!-- /navbar items -->
</div>
</div>
<!-- /collapsible content -->


</nav>

<!-- ------------------------- END OF SMALL HEADER ----------------------- -->
</header>





<div class="container mx-auto my-4">
 
        <div class="d-flex justify-content-center">
            <h3 > Create post </h3>
        </div>



        <div class="d-flex justify-content-end my-4 mx-auto">
             <form name="posts" method="POST" action="../index.php">
                 <button name="posts" type="submit" class="btn btn-secondary">
                 <i class="bi bi-arrow-90deg-left"></i> Back to posts
                    </button>
                </form> 
        </div>
</div>

<div class="container col-md-8 my-4 border shadow">

  <form name="createPost" method="POST" action="postservice/postService.php"> 

<div class="row d-flex justify-content-center mx-auto my-4">

<div class="col-md-8 ">
  <label for="title" class="form-label">Title</label>
  <input type="text" class="form-control" name="title" id="postTitle">
</div>

</div>


<div class="row d-flex justify-content-center mx-auto my-4">


<div class="col-md-4">
  <label for="date" class="form-label">Date</label>
  <input type="hidden" class="form-control" name="date" id="postDate" value="<?php echo $date = date('Y-m-d');?>">
  <p><?php echo $date?></p>
  </div>
  
  <div class="col-md-4 ">
  <label for="image" class="form-label">Image</label>
  <input type="text" class="form-control" name="imageURL" id="postImage">
</div>



</div>

<div class="row d-flex justify-content-center mx-auto my-4">


<div class="col-md-8">
  <label for="content" class="form-label">Content</label>
  <textarea class="form-control" name="content" id="postDate"></textarea>
  </div>


</div>

<div class="row d-flex justify-content-center mx-auto my-4">


<div class="col-md-8 d-flex justify-content-center my-4 mx-auto">
<input type="hidden" name="author" value="<?php echo $_SESSION['id']; ?>">
  <button type="submit" name="createPost" class="btn btn-primary">Create post</button>
  </div>


</div>


  </form>

</div>










<!-- -----------------------   FOOTER ----------------------- -->
<footer class="bg-light text-center text-lg-start">

<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
<a class="text-dark mx-3" href="index.php">Homepage</a>
<a class="text-dark mx-3" href="#">About us</a>
</br>
</br>
© 2021 Copyright:
<a class="text-dark" href="#">BM Inc. </a>
</div>

</footer>


<!-- -----------------------  END OF FOOTER ----------------------- -->


</body>


</html>
<?php
require_once __DIR__ . "/../models/post.php";
require_once __DIR__ . "/../database/dbPost.php";
require_once __DIR__ . "/../database/dbUser.php";

//start session if not started
if (!isset($_SESSION)) {
    session_start();
}

$postDb = new dbPost();
$userDb = new dbUser();

$postId = $_POST['postId']; // get post id from post preview button 
$post = $postDb->getPostByPostId($postId);
$isLoggedIn = isset($_SESSION['user']);
?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <title>Post - Blog Management</title>
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
            <div class="col-2 mx-auto d-none d-lg-block float-end">
                <a class="navbar-brand" href="../index.php">
                    <img class="logo" src="../img/logo/bmLogo.png">
                </a>
            </div>
            <!-- /logo brand-->

            <!-- navbar items -->
            <div class="col-4 mx-auto d-none d-lg-block">
                <ul class="navbar-nav float-end">

                    <li class="nav-item mx-3">
                        <a class="nav-link text-light " href="../index.php">Homepage</a>
                    </li>

                    <li class="nav-item mx-4">
                        <a class="nav-link text-light" href="../userservice/userProfile.php">My profile</a>
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
            <!-- /search bar -->

            <!-- Hi, user -->
            <div class="col-1 mx-auto d-none d-lg-block">
                <?php if ($isLoggedIn) { ?>
                    <p class="text-light text-center mx-auto my-auto"> <?php echo "Hi, " . $_SESSION['username']; ?>
                    <?php } ?>
            </div>
            <!-- Hi, user -->

            <!-- login&logout button -->
            <div class="col-2 mx-auto d-none d-lg-block">
                <?php if ($isLoggedIn) { ?>
                    <form name="logout" method="post" action="../userservice/logoutService.php">
                        <button class="btn btn-primary" name="logout" alt="Log out" type="submit">
                            <i class="bi bi-box-arrow-right">Log out</i>
                        </button>
                    </form>
                <?php } else { ?>
                    <a href="../userservice/login.php" class="btn btn-primary">
                        <i class="bi bi-box-arrow-in-right"> Log in</i></a>
                <?php } ?>
            </div>
            <!-- login&logout button -->
        </nav>
        <!-- ---------------------- END OF NORMAL HEADER ------------------- -->


        <!-- ---------------------- SMALL HEADER ------------------- -->
        <nav class="navbar navbar-light float-left ">


            <div class="col-11 d-block d-lg-none">

                <!-- navbar brand -->
                <a href="../index.php" class="navbar-brand mx-auto "><img id="logoSmall" src="../img/logo/bmicon.png"></a>
                <!-- /navbar brand -->

                <!-- collapse button -->
                <button class="navbar-toggler toggler-example text-light float-end" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><span class="dark-blue-text"><i class="bi bi-list"></i></span></button>
                <!-- /collapse button -->

                <!-- collapsible content -->
                <div class="collapse navbar-collapse text-center" id="navbarSupportedContent1">

                    <!-- navbar items -->
                    <ul class="navbar-nav mr-auto ">
                        <li class="nav-item">
                            <a class="nav-link text-light" href="../index.html">Home</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link text-light" href="../userservice/userProfile.php">My profile</a>
                        </li>
                
                        <!-- login&logout button -->
                        <li>
                            <?php if ($isLoggedIn) { ?>
                                <form name="logout" method="post" action="userservice/logoutService.php">
                                    <button class="btn btn-primary" name="logout" alt="Log out" type="submit">
                                        <i class="bi bi-box-arrow-right"> Log out</i>
                                    </button>
                                </form>
                            <?php } else { ?>
                                <a href="userservice/login.php" class="btn btn-primary">
                                    <i class="bi bi-box-arrow-in-right"> Log in</i></a>
                            <?php } ?>
                        </li>
                        <!-- login&logout button -->
                    </ul>
                    <!-- /navbar items -->
                </div>
            </div>
            <!-- /collapsible content -->
        </nav>
        <!-- ------------------------- END OF SMALL HEADER ----------------------- -->
    </header>



    <!-- ------------------------------ POST PREVIEW BODY ----------------------- -->
    <div class="container d-flex mx-auto my-4">
        <!-- delete post button -->
        <div class="d-flex justify-content-start my-4 mx-auto">
            <?php if ($isLoggedIn && $post->get_author() === $_SESSION['id']) { ?>
                <form name="delete" method="POST" action="postDelete.php">
                    <input id="postId" name="postId" type="hidden" value="<?php echo $post->get_id(); ?>">
                    <button name="delete" title="Remove" class="btn btn-danger" type="submit">
                        <i class="bi bi-trash">Delete post</i>
                    </button>
                </form>
            <?php } ?>
        </div>
        <!-- /delete post button -->

        <!-- return to homepage button -->
        <div class="d-flex justify-content-end my-4 mx-auto">
            <form name="posts" method="POST" action="../index.php">
                <button name="posts" type="submit" class="btn btn-secondary">
                    <i class="bi bi-arrow-90deg-left"></i> Back to posts
                </button>
            </form>
        </div>
        <!-- /return to homepage button -->
    </div>


    <div class="container col-md-8 my-4 border shadow">

        <form name="createPost" method="POST" action="postService.php">

            <!-- post title -->
            <div class="row d-flex justify-content-center mx-auto my-4">

                <div class="col-md-8 d-flex justify-content-center">
                    <h2><?php echo $post->get_title(); ?></h2>
                </div>
            </div>
            <!-- /post title -->

            <!-- post image -->
            <div class="row d-flex justify-content-center mx-auto my-4">
                <div class="col-md-8 d-flex justify-content-center">
                    <img src="../img/logo/bmicon.png">
                </div>
            </div>
            <!-- /post image -->

            <!-- post content -->
            <div class="row d-flex justify-content-center mx-auto my-4">
                <div class="col-md-8 d-flex justify-content-center my-4 mx-auto">
                    <p><?php echo $post->get_content() ?></p>
                </div>
            </div>
            <!-- /post content -->

            <!-- post date & author -->
            <div class="row d-flex justify-content-center mx-auto my-4">


                <div class="col-md-4">
                    <p> Date: <?php echo $post->get_date(); ?></p>
                </div>

                <div class="col-md-4 text-right ">
                    <p> Author: <?php echo $userDb->getUsernameFromUserId($post->get_author()) ?> </p>
                </div>
            </div>
            <!-- /post date & author -->
        </form>

    </div>

    <!-- ------------------------------ END OF POST PREVIEW BODY ----------------------- -->


    <!-- -----------------------   FOOTER ----------------------- -->
    <footer class="bg-light text-center text-lg-start">

        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            <a class="text-dark mx-3" href="../index.php">Homepage</a>
            <a class="text-dark mx-3" href="../contactUs.php">Contact us</a>
            </br>
            </br>
            ?? 2021 Copyright:
            <a class="text-dark" href="https://www.armindz.github.io">BM Inc. </a>
        </div>

    </footer>

    <!-- -----------------------  END OF FOOTER ----------------------- -->
</body>

</html>
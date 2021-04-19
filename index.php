<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>Home - Blog Management</title>
    <link rel="stylesheet" href="css/bootstrap.css">
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
<div class="col-4 mx-auto d-none d-lg-block float-end">
    <a class="navbar-brand">
        <img class="logo" src="img/logo/bmLogo.png">
    </a>
</div>
<!-- /logo brand-->

<!-- navbar items -->
<div class="col-4 mx-auto d-none d-lg-block">
    <ul class="navbar-nav">
        <li class="nav-item activeBorderBottom mx-auto">
            <a class="nav-link text-light " href="index.html">Homepage</a>
        </li>
        <li class="nav-item mx-auto">
            <a class="nav-link text-light" href="movies.html">Movies</a>
        </li>
        <li class="nav-item mx-auto">
            <a class="nav-link disabled" href="#">Series</a>
        </li>
        <li class="nav-item mx-auto">
            <a class="nav-link text-light" href="contact.html">Contact us</a>
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

</nav>
<!-- ---------------------- END OF NORMAL HEADER ------------------- -->



<!-- ---------------------- SMALL HEADER ------------------- -->
<nav class="navbar navbar-light float-left ">

<!-- navbar brand -->
<div class="col-11 d-block d-lg-none">
    <a href="" class="navbar-brand mx-auto "><img id="logoSmall" src="img/logo/bmicon.png"></a>

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
                <a class="nav-link text-light" href="index.html">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="movies.html">Movies</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="contact.html">Contact us</a>
            </li>
        </ul>
        <!-- /navbar items -->
    </div>
</div>
<!-- /collapsible content -->


</nav>

<!-- ------------------------- END OF SMALL HEADER ----------------------- -->
</header>

















 <!-- -----------------------   FOOTER ----------------------- -->
 <footer class="bg-light text-center text-lg-start">

<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    <a class="text-dark mx-3" href="index.php">Homepage</a>
    <a class="text-dark mx-3" href="#">About us</a>
    <a class="text-dark mx-3" href="contact.php">Contact us</a>
    </br>
    </br>
    © 2021 Copyright:
    <a class="text-dark" href="#">BM Inc. </a>
</div>

</footer>


<!-- -----------------------  END OF FOOTER ----------------------- -->


</body>


</html>
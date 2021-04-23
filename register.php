<?php
include_once('dbUser.php');

$userDb = new dbUser();
$username = $_POST['username'];
$password = $_POST['password'];
$user = new User($username, $password, $userDb->generateUserId());


if(isset($_POST['register'])){
if($userDb->storeUserToDatabase($user)) {

    echo "Registered successfully";
    header('location:login.php');
    
}

else {
    echo "Something went wrong. Try again";
    header('location:register.php');

}
}


?>




<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>Register - Blog Management</title>
    <link rel="icon" href="img/logo/bmicon.png">
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
<div class="col-10 mx-auto d-none d-lg-block float-end">
    <a class="navbar-brand">
        <img class="logo" src="img/logo/bmLogo.png">
    </a>
</div>
<!-- /logo brand-->


</nav>
<!-- ---------------------- END OF NORMAL HEADER ------------------- -->



<!-- ---------------------- SMALL HEADER ------------------- -->
<nav class="navbar navbar-light float-left ">

<!-- navbar brand -->
<div class="col-11 d-block d-lg-none">
    <a href="" class="navbar-brand mx-auto "><img id="logoSmall" src="img/logo/bmicon.png"></a>

    <!-- /navbar brand -->
</div>
</nav>

<!-- ------------------------- END OF SMALL HEADER ----------------------- -->
</header>


<!-- ----------------------------- REGISTER FORM ---------------------------- -->


    <div class="container ">
        <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center ">
        
           <div class="form col-7 col-sm-7 col-md-6 col-lg-4 col-xl-3 shadow p-3 bg-body rounded px-2 mx-auto my-auto">
        <form name="register" method="POST" action="">  
                 
             <h3 class="text-center my-4">Registration</h3>
                 <input type="username" name="username" id="registerUsername" placeholder="Username" class="form-control my-3 rounded-pill ">
                
                 <input type="password" name="password" id="registerPassword" placeholder="Password" class="form-control my-3 rounded-pill">
                 <p class="change_link text-center">  
                                    Already member ?  
                                    <a href="login.php" class="to_register">Log in</a>  
                                </p>  
                <div class="text-center d-grid gap-2 d-flex justify-content-center ">
                 <button type="submit" name="register" class="btn btn-primary my-3 col-10 rounded-pill">Register</button>
                </div>
           </form>
       </div>
   
        </div>
  </div>
      <!-- ----------------------------- /REGISTER FORM ---------------------------- -->










   

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
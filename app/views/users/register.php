<?php
require APPROOT.'/views/includes/header.php';
?>



<!doctype html>
<html lang="en">
<head>



    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg  {
                font-size: 3.5rem;
                
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link  href=" <?php echo URLROOT ?>/css/register.css" rel="stylesheet">
</head>
<body class="text-center  container">
<main class="form-signin w-75">
    <form  action="<?php echo URLROOT; ?>/users/register" method="POST">
        <img class="mb-4" src="" alt="Online daktari" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal"> Registration </h1>
        <small class="text-warning">Fields marked with * are required.</small>
       

        <div class="form-floating ">
            <input type="text" class="form-control" id="firstName" placeholder="name@example.com" name="firstName">
            <label for="firstName">First Name *</label>
            <span class="bg bg-warning">
                 <?php echo $data['firstNameError']; ?>
            </span>
        </div>

        <div class="form-floating ">
            <input type="text" class="form-control" id="lastName" placeholder="name@example.com" name="lastName">
            <label for="lastName">Last Name *</label>
            <span class="bg bg-warning">
                 <?php echo $data['lastNameError']; ?>
            </span>
        </div>

        <div class="form-floating ">
            <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
            <label for="email">Email address *</label>
            <form class="form-floating">
            <span class="bg bg-warning">
                 <?php echo $data['emailError']; ?>
            </span>
        </div>
        <div class="form-floating ">
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            <label for="password">Password *</label>
            <span class="bg bg-warning">
                <?php echo $data['passwordError']; ?>
            </span>
        </div>

        <div class="form-floating ">
            <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" name="confirmPassword">
            <label for="confirmPassword">Confirm Password *</label>
            <span class="bg bg-warning">
                <?php echo $data['confirmPasswordError']; ?>
            </span>
        </div>
        <div class="mt-3 mb-3">
            <input class="form-check-input mr-5" type="radio" name="userType" id="patient" value="patient">
            <label class="form-check-label" for="patient">Patient</label>


            <input class="form-check-input" type="radio" name="userType" id="doctor" checked value="doctor">

            <label class="form-check-label" for="doctor">Doctor</label>

       
        </div>

        
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
         
        <p class="mt-3">Have an account?<a href="<?php echo URLROOT;?>/users/login" > Login!</a></p>
        <p class="mt-5 mb-3 text-muted">&copy; <?php echo date('Y')?></p>
    </br>


    </form>
</main>
</body>
</html>



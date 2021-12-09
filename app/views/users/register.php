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
    <link href="signin.css" rel="stylesheet">
</head>
<body class="text-center">

<main class="form-signin container">
    <form  action="<?php echo URLROOT; ?>/users/register" method="POST">
        <img class="mb-4" src="" alt="Online daktari" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal"> Registration </h1>
        <small class="text-warning">Fields marked with * are required.</small>
       

        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="firstName">
            <label for="floatingInput">First Name *</label>
            <span class="bg bg-warning">
                 <?php echo $data['firstNameError']; ?>
            </span>
        </div>

        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="lastName">
            <label for="floatingInput">Last Name *</label>
            <span class="bg bg-warning">
                 <?php echo $data['lastNameError']; ?>
            </span>
        </div>

        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
            <label for="floatingInput">Email address *</label>
            <form class="form-floating">
            <span class="bg bg-warning">
                 <?php echo $data['emailError']; ?>
            </span>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">Password *</label>
            <span class="bg bg-warning">
                <?php echo $data['passwordError']; ?>
            </span>
        </div>

        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Confirm Password" name="confirmPassword">
            <label for="floatingPassword">Confirm Password *</label>
            <span class="bg bg-warning">
                <?php echo $data['confirmPasswordError']; ?>
            </span>
        </div>
                <div>
                 <br class="form-floating">
                 <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                   <label class="form-check-label" for="flexRadioDefault1">Patient</label>
                 </br>
                 <br class="form-floating">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">Doctor</label>
                </br>
               </div>
    <span class="bg bg-warning">
                <?php echo $data['userTypeError']; ?>
            </span>
            <br>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
         </br>
         <br>
        <p class="mt-3">Have an account?<a href="<?php echo URLROOT;?>/users/login" > Login!</a></p>
        <p class="mt-5 mb-3 text-muted">&copy; <?php echo date('Y')?></p>
    </br>

</div>
    </form>
</main>
</body>
</html>



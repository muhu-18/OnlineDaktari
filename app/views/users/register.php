<?php
require APPROOT.'/views/includes/header.php';

?>
<head>
<!--    <link rel="stylesheet" href="--><?php //echo URLROOT; ?><!--/public/css/login.css">-->
</head>

<body class="container mt-5">
<div class="row">
<main class="form-signin w-md-100 col">
    <form action="<?php echo URLROOT; ?>/users/register" method="POST">
<!--        <div>-->
<!--            <img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="eWaste logo" width="72" height="57">-->
<!--            <small class="text-warning" style="display: block">Fields marked with * are required.</small>-->
<!--        </div>-->

        <div class="form-item mb-3">
            <label for="firstName">First Name*</label>
            <input type="text" class="form-control" id="firstName" placeholder="John" name="firstName">
            <span class="bg bg-warning">
                 <?php echo $data['firstNameError']; ?>
             </span>
        </div>

        <div class="form-item mb-3">
            <label for="lastName">Last Name*</label>
            <input type="text" class="form-control" id="lastName" placeholder="Doe" name="lastName">
            <span class="bg bg-warning">
                 <?php echo $data['lastNameError']; ?>
             </span>
        </div>

        <div class="form-item mb-3">
            <label for="email">Email address*</label>
            <input type="email" class="form-control" id="email" placeholder="john@doe.com" name="email">
            <span class="bg bg-warning">
                 <?php echo $data['emailError']; ?>
             </span>
        </div>

        <div class="form-item mb-3">
            <label for="tel">Phone*</label>
            <input type="tel" class="form-control" id="tel" placeholder="0797165741" name="phone">
            <span class="bg bg-warning">
                 <?php echo $data['phoneError']; ?>
             </span>
        </div>

        <div class="form-item mb-3">
            <label for="password">Password*</label>
            <input type="password" class="form-control" id="password" placeholder="password" name="password">
            <span class="bg bg-warning">
                 <?php echo $data['passwordError']; ?>
             </span>
        </div>

        <div class="form-item mb-3">
            <label for="confirmPassword">Confirm Password*</label>
            <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" name="confirmPassword">
            <span class="bg bg-warning">
                 <?php echo $data['confirmPasswordError']; ?>
             </span>
        </div>

        <div class="form-item mb-3">
            <input type="radio" id="patient" name="usertype" value="patient" checked>
            <label for="usertype">Patient</label>
            <input type="radio" id="doctor" name="usertype" value="doctor">
            <label for="usertype">Doctor</label>
        </div>

        <div id="coordinates" style="visibility: hidden; height: 0">
            <input type="text" id="address" name="address" value="">
            <input type="text" id="latitude" name="lat" value="">
            <input type="text" id="longitude" name="long" value="">
        </div>

        <button class="w-100 btn btn-lg btn-primary button-green" type="submit">Sign Up</button>
        <p class="mt-3">Already registered?<a href="<?php echo URLROOT;?>/users/login" > Login!</a></p>
        <p class="mt-5 mb-3 text-muted">&copy; <?php echo date('Y')?></p>
    </form>
</main>
<div class="col">
    <div id="map" style="height: 30rem"></div>
</div>

</div>

<?php
require APPROOT.'/views/includes/gmap.php';
?>

</body>
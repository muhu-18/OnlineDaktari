<?php
    require APPROOT.'/views/includes/header.php';
?>

<div>
    <?php
    require APPROOT.'/views/includes/navigation.php';
    ?>
</div>

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
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>
<body class="text-center">

<main class="form-signin container">
    <form action="<?php echo URLROOT; ?>/users/login" method="POST">
        <img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
            <label for="floatingInput">Email address *</label>
            <span class="bg bg-warning">
                 <?php echo $data['usernameError']; ?>
            </span>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">Password *</label>
            <span class="bg bg-warning">
                <?php echo $data['passwordError']; ?>
            </span>
        </div>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        <p class="mt-3">Not registered yet?<a href="<?php echo URLROOT;?>/users/register" > Create an account!</a></p>
        <p class="mt-5 mb-3 text-muted">&copy; <?php echo date('Y')?></p>
    </form>
</main>



</body>
</html>


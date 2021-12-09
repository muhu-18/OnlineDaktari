<?php
    require_once APPROOT.'/views/includes/header.php';
?>


    <!-- Custom styles for this template -->
    <link href=" <?php echo URLROOT ?>/css/signin.css" rel="stylesheet">

<body class="text-center container">

<main class="form-signin w-md-100">
    <form action="<?php echo URLROOT; ?>/users/login" method="POST">
        <img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="Online daktari" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Log in</h1>
        <small class="text-warning">Fields marked with * are required.</small>
        <div class="form-floating">
            
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
            <label for="floatingInput">Email address *</label>
    </div>
  </div>

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


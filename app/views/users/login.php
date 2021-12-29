<?php
require APPROOT.'/views/includes/header.php';
?>
<head>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/login.css">
</head>

<main class="form-signin w-md-100">
    <div style="background-color: #8f1c1c; padding: 0.5rem; color: #f5f5f5">
        <?php
//        echo $data['message']
        ?>
    </div>

    <form action="<?php echo URLROOT; ?>/users/login" method="POST">
        <a href="<?php echo URLROOT; ?>">
            <img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="eWaste Logo" width="72" height="57">
        </a>
        <small class="text-warning" style="display: block">Fields marked with * are required.</small>
        <div class="form-item">
            <label for="email">Email address *</label>
            <input type="email" class="form-control" id="email" placeholder="email" name="email">
            <span class="bg bg-warning">
                 <?php echo $data['emailError']; ?>
            </span>
        </div>
        </div>

        <div class="form-item">
            <label for="password">Password *</label>
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">

            <span class="bg bg-warning">
                <?php echo $data['passwordError']; ?>
            </span>
        </div>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary button-green" type="submit">Sign in</button>
        <p class="mt-3">Not registered yet?<a href="<?php echo URLROOT;?>/users/register" > Create an account!</a></p>
        <p class="mt-5 mb-3 text-muted">&copy; <?php echo date('Y')?></p>
    </form>
</main>
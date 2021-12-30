
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>/pages/index">LOGO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo URLROOT; ?>/pages/index">Home</a>
        </li>
          <?php if(isset($_SESSION['user_id'])) : ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/pages/notifications"> <i class="bi bi-bell-fill"></i>Notifications</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/pages/appointments">Appointments</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/pages/doctors">Doctors</a>
        </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Settings
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">            
            <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/pages/payment">Payment</a></li>
            <li><a class="dropdown-item"  href="<?php echo URLROOT; ?>/pages/wallet">Profile</a></li>
            <li><a class="dropdown-item"  href="<?php echo URLROOT; ?>/pages/wallet">Wallet</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/users/settings">Logout</a></li>
          </ul>
        </li>
          <?php endif; ?>
          <li class="nav-item btn-login">
              <?php if(isset($_SESSION['user_id'])) : ?>
                  <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Log out</a>
              <?php else : ?>
                  <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a>
              <?php endif; ?>
          </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
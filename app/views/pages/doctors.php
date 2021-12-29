<?php
 require_once APPROOT."/views/includes/header.php";
?>
<div>
    <?php
    require APPROOT.'/views/includes/navigation.php';
    ?>
</div>
<div class="container my-5">
    <h1><?php echo $data['title'] ?></h1>
<div class="row row-cols-1 row-cols-md-2 g-4">
    <?php foreach ($data['doctors'] as $doctor): ?>
    <div class="col">
        <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Dr. John Doe</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="card-body d-flex justify-content-between">
                    <span>4.5</span>
                    <span>Work Hours: 10:00AM-4:00PM</span>

                </div>
            </div>
            <hr>
            <div class="card-body d-flex justify-content-between">

                    <span>Consultation Fee: Ksh. 350</span>

                    <button class="btn btn-lg btn-primary bg-success">Book Now</button>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
</div>
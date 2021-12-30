<?php
require_once APPROOT."/views/includes/header.php";
?>
<div>
    <?php
    require APPROOT.'/views/includes/navigation.php';
    ?>
</div>

<body class="container">
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Day</th>
        <th scope="col">Date</th>
        <th scope="col">Time</th>
        <th scope="col">Month</th>
        <th scope="col">Year</th>
        <th scope="col">Doctor</th>
        <th scope="col" class="text-center">Action</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">1</th>
        <td class="day"></td>
        <td class="date"></td>
        <td class="time"></td>
        <td class="month"></td>
        <td class="year"></td>
        <td class="doctor"></td>
        <td class="action d-flex justify-content-between">
            <button class="btn btn-info">Edit</button>
            <button class="btn btn-danger">Cancel</button>
        </td>
    </tr>
    </tbody>
</table>
</body>
<!-- this should go after your </body> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css"/ >
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js" ></script>

<?php
require_once APPROOT."/views/includes/header.php";
?>
<div>
    <?php
    require APPROOT.'/views/includes/navigation.php';
    ?>
</div>


<div class="container">
    <h1><?php echo 'Choose Time and Day'?></h1>
    <div class="row p-5">
        <div id="datetimepicker" class="m-5 col-6" style="width: 0"></div>
        <div class="col-6 col-md-4 mt-0">
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
        </div>
    </div>


    <button type="submit" id="submit" class="btn btn-success" autocomplete="off" disabled="true">Continue</button>

    <form style="visibility: hidden; height: 0">
        <input type="text" id="day" name="day" value="" placeholder="day">
        <input type="text" id="date" name="date" value="" placeholder="date">
        <input type="text" id="month" name="month" value="" placeholder="month">
        <input type="text" id="time" name="time" value="" placeholder="time">
        <input type="text" id="year" name="year" value="" placeholder="year">

  </div>
<script type="text/javascript">

    $(document).ready(function () {

        // alert(typeof jQuery())
        // jQuery is loaded



        $('#datetimepicker').datetimepicker({
            format: 'Y-m-d H:i',
            inline: true,
            lang: 'ru'
        });

        $('.xdsoft_datetimepicker').addClass('col-sm-12 col-md-6');

        $(function () {
            const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            $("#datetimepicker").on("change", function () {



                var selected = $(this).val();
                let dateOb = new Date(selected);
                let day = days[dateOb.getDay()];
                let date = dateOb.getDate();
                let month = dateOb.getMonth();
                let year = dateOb.getFullYear();
                let time = selected.split(' ')[1];

                $("#day").val(day);
                $("#date").val(date);
                $("#month").val(month);
                $("#time").val(time);
                $("#year").val(year);

                $(".day").text(day);
                $(".date").text(date);
                $(".month").text(month);
                $(".time").text(time);
                $(".year").text(year);

                if($('#day')){
                    $('#submit').prop('disabled', false)
                }

            });
        });
    });


</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url(); ?>assets/img/favicon.ico" type="image/x-icon" />
    <title><?php echo ($title != '') ? $title : 'On Time - MyPRO'; ?></title>
    <?php include 'include_head.php';?>
    <!-- CSS -->


    <style>
    /**
 * Extracted from: SweetAlert
 * Modified by: Istiak Tridip
 */
    .success-checkmark {
        width: 80px;
        height: 115px;
        margin: 0 auto;
    }

    .success-checkmark .check-icon {
        width: 80px;
        height: 80px;
        position: relative;
        border-radius: 50%;
        box-sizing: content-box;
        border: 4px solid #4CAF50;
    }

    .success-checkmark .check-icon::before {
        top: 3px;
        left: -2px;
        width: 30px;
        transform-origin: 100% 50%;
        border-radius: 100px 0 0 100px;
    }

    .success-checkmark .check-icon::after {
        top: 0;
        left: 30px;
        width: 60px;
        transform-origin: 0 50%;
        border-radius: 0 100px 100px 0;
        animation: rotate-circle 4.25s ease-in;
    }

    .success-checkmark .check-icon::before,
    .success-checkmark .check-icon::after {
        content: '';
        height: 100px;
        position: absolute;
        background: #FFFFFF;
        transform: rotate(-45deg);
    }

    .success-checkmark .check-icon .icon-line {
        height: 5px;
        background-color: #4CAF50;
        display: block;
        border-radius: 2px;
        position: absolute;
        z-index: 10;
    }

    .success-checkmark .check-icon .icon-line.line-tip {
        top: 46px;
        left: 14px;
        width: 25px;
        transform: rotate(45deg);
        animation: icon-line-tip 0.75s;
    }

    .success-checkmark .check-icon .icon-line.line-long {
        top: 38px;
        right: 8px;
        width: 47px;
        transform: rotate(-45deg);
        animation: icon-line-long 0.75s;
    }

    .success-checkmark .check-icon .icon-circle {
        top: -4px;
        left: -4px;
        z-index: 10;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        position: absolute;
        box-sizing: content-box;
        border: 4px solid rgba(76, 175, 80, 0.5);
    }

    .success-checkmark .check-icon .icon-fix {
        top: 8px;
        width: 5px;
        left: 26px;
        z-index: 1;
        height: 85px;
        position: absolute;
        transform: rotate(-45deg);
        background-color: #FFFFFF;
    }

    @keyframes rotate-circle {
        0% {
            transform: rotate(-45deg);
        }

        5% {
            transform: rotate(-45deg);
        }

        12% {
            transform: rotate(-405deg);
        }

        100% {
            transform: rotate(-405deg);
        }
    }

    @keyframes icon-line-tip {
        0% {
            width: 0;
            left: 1px;
            top: 19px;
        }

        54% {
            width: 0;
            left: 1px;
            top: 19px;
        }

        70% {
            width: 50px;
            left: -8px;
            top: 37px;
        }

        84% {
            width: 17px;
            left: 21px;
            top: 48px;
        }

        100% {
            width: 25px;
            left: 14px;
            top: 45px;
        }
    }

    @keyframes icon-line-long {
        0% {
            width: 0;
            right: 46px;
            top: 54px;
        }

        65% {
            width: 0;
            right: 46px;
            top: 54px;
        }

        84% {
            width: 55px;
            right: 0px;
            top: 35px;
        }

        100% {
            width: 47px;
            right: 8px;
            top: 38px;
        }
    }

    .error-circle {
        position: relative;
        width: 70px;
        height: 70px;
        border-radius: 40px;
        background-color: #990000;
        border: 5px solid #fff;
    }

    .error-circle>div {
        position: absolute;
        top: 76%;
        left: 50%;
        margin-left: -15px;
        margin-top: -27px;
        text-align: center;
        width: 20px;
        font-size: 48px;
        font-weight: bold;
        color: #fff;
        font-family: Arial;
    }
    </style>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">

<body>
    <div id="pre-loader">
        <div id="preload_inner">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div>

    <!-- <div class="top_header_static_img">
        <img src="<?php echo base_url(); ?>assets/img/bg.jpg" style="max-width:100%;">
    </div> -->
    <section class="construction_service_area">
        <div class="container">
            <div class="sec_title">
                <h2><?php echo $heading_title; ?></h2>
            </div>
            <div class="we_left_text">
                <table class="table table-bordered" id="ManageUsers">
                    <thead>
                        <tr>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Is Activated</th>
                            <th>Activated On</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($content as $u) {?>
                        <tr>
                            <td><?php echo $u->firstname ?></td>
                            <td><?php echo $u->lastname ?></td>
                            <td><?php echo $u->email ?></td>
                            <td><?php echo $u->mobile ?></td>
                            <td><?php echo $u->isactivated ?></td>
                            <td><?php echo $u->activatedon ?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>

        </div>

    </section>


    <?php include 'include_bottom.php';?>
</body>

</html>
<!-- JS -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.8/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.js"></script>
<script>
$(function() {
    $('#ManageUsers').DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: true,
        responsive: true
    });
});
</script>
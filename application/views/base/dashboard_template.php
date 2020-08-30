<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>TNPSC CAREER</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="<?php echo base_url();?>assets/css/project.css" id="app-style" rel="stylesheet" type="text/css" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.ico">

        <!-- DataTables -->
        <link href="<?php echo base_url();?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="<?php echo base_url();?>assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />   

        <!-- Bootstrap Css -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <!-- ADDED Boostrap--->
        <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->

        <!-- Icons Css -->
        <link href="<?php echo base_url();?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo base_url();?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <!-- JAVASCRIPT -->
        <script src="<?php echo base_url();?>assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/node-waves/waves.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.table2excel.js"></script>

        <!-- Required datatable js -->
        <script src="<?php echo base_url();?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="<?php echo base_url();?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/jszip/jszip.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="<?php echo base_url();?>assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="<?php echo base_url();?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <script src="<?php echo base_url();?>assets/js/common_js.js"></script>
        <script src="<?php echo base_url();?>assets/js/sweetalert.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>

    </head>

    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">

             <?php include('header.php'); ?>

            <!-- ========== Left Sidebar Start ========== -->
            <?php include('menu.php'); ?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <?php echo (isset($content))?$content:''; ?>
                        

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                
               <?php include('footer.php'); ?>

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

       

        

        <!-- Datatable init js 
        <script src="<?php echo base_url();?>assets/js/pages/datatables.init.js"></script>--> 
        
        



        
        <script src="<?php echo base_url();?>assets/js/app.js"></script>
 
        <!-- include summernote css/js -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <script type="text/javascript">
$(document).ready(function() {
  $('.summernote').summernote();
});
        </script>
    </body>
</html>

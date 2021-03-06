<div class="row align-items-center">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4 class="font-size-18">Exam</h4>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?php echo site_url('masters/exams/'); ?>">Exam</a></li>
                <li class="breadcrumb-item active">Exam</li>
            </ol>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="float-right d-none d-md-block">

            <a class="btn btn-primary waves-effect waves-light" href="<?php echo base_url(); ?>masters/exams/">
                View Exam
            </a>
        </div>
    </div>
</div>

<?php
if ($this->session->flashdata('alert_success')) {
    ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <strong>Success!</strong> <?php echo $this->session->flashdata('alert_success'); ?>
</div>
<?php
}

if ($this->session->flashdata('alert_danger')) {
    ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <strong>Success!</strong> <?php echo $this->session->flashdata('alert_danger'); ?>
</div>
<?php
}

if ($this->session->flashdata('alert_warning')) {
    ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <strong>Success!</strong> <?php echo $this->session->flashdata('alert_warning'); ?>
</div>
<?php
}
if (validation_errors()) {
    ?>
<!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
<?php echo validation_errors(); ?>
</div> -->
<?php
}
?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Exam</h4>

                <form action="<?php echo base_url(); ?>masters/exams/add" method="post" enctype="multipart/form-data">
                    <div class="row">
                      
<div class="col-lg-6">
                    <div class="form-group">
                        <label>Exam Name</label><span class="mandatory">*</span>
                        <input name="exams_name" id="Exam" type="text" class="form-control" placeholder="Enter Exam Name"
                            required>
                        <?php if (form_error('exams_name')) {?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <?php echo form_error('exams_name'); ?>
                        </div>
                        <?php }?>
                    </div>

                </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label>Exam Description</label><span class="mandatory">*</span>
                        <input name="exams_des" id="exams_des" type="text" class="form-control" placeholder="Exam Description"
                            required>
                        <?php if (form_error('exams_des')) {?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <?php echo form_error('exams_des'); ?>
                        </div>
                        <?php }?>
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label>Exam Image Upload</label><span class="mandatory">*</span>
                        <input name="user_file" id="exams_des" type="file" class="form-control" placeholder="Exam Description"
                            required>
                       
                    </div>
                    </div>
                </div>
                    <div class="form-group mb-0">
                        <div>
                            <button name="submit" type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect" onclick="window.history.back()">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
function get_region(zone_id) {
    $.ajax({
        url: "<?php echo site_url() ?>/users/manage_dealers/get_region",
        method: "POST",
        type: "ajax",
        data: {
            zone_id: zone_id
        },
        success: function(result) {
            var data = JSON.parse(result);
            $('#region')
                .find('option')
                .remove();
            $.each(data, function(key, value) {
                var option = '<option value="' + value.region_id + '">' + value.region_name +
                    '</option>';
                $('#region').append(option);
            });
        },
        error: function(error) {
            console.log(error);
        }
    });
}
</script>
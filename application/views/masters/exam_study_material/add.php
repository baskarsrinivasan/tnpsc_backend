<div class="row align-items-center">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4 class="font-size-18">Exam Study Material</h4>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?php echo site_url('masters/exam_study_material/'); ?>">Exam Study Material</a></li>
                <li class="breadcrumb-item active">Exam Study Material</li>
            </ol>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="float-right d-none d-md-block">

            <a class="btn btn-primary waves-effect waves-light" href="<?php echo base_url(); ?>masters/exam_study_material/">
                View Exam Study Material
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
                <h4 class="card-title">Create Exam Study Material</h4>

                <form action="<?php echo base_url(); ?>masters/exam_study_material/add" method="post" enctype="multipart/form-data">
                    <div class="row">
                          <div class="col-lg-6">
                         <div class="form-group">
                        <label>Exam</label><span class="mandatory">*</span>
                        <select name="exam_id" class="form-control"  required>
                            <option>--Select Exam--</option>
                            <?php foreach($exams as $row){?>
                            <option value="<?php echo $row->id?>"><?php echo $row->exams_name?></option>
                            <?php } ?>
                        </select>
                        <?php if (form_error('exam_id')) {?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <?php echo form_error('exam_id'); ?>
                        </div>
                        <?php }?>
                    </div>
                    </div>
<div class="col-lg-6">
                    <div class="form-group">
                        <label>Currentaffairs Question</label><span class="mandatory">*</span>
                          <textarea name="exam_study_material_name" id="description" rows="4" cols="50" class="form-control summernote"
                            placeholder="Currentaffairs Question" required></textarea>
                      
                        <?php if (form_error('exam_study_material_name')) {?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <?php echo form_error('exam_study_material_name'); ?>
                        </div>
                        <?php }?>
                    </div>

                </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label>Currentaffairs Answer</label><span class="mandatory">*</span>
                        <textarea name="exam_study_material_des" id="description" rows="4" cols="50" class="form-control summernote"
                            placeholder="Currentaffairs Answer" required></textarea>
                       
                        <?php if (form_error('exam_study_material_des')) {?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <?php echo form_error('exam_study_material_des'); ?>
                        </div>
                        <?php }?>
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label>Date</label><span class="mandatory">*</span>
                        <input name="date" id="exam_study_material_des" type="date" class="form-control" placeholder="Date"
                            required>
                       
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label>Exam Image Upload</label><span class="mandatory">*</span>
                        <input name="user_file" id="exam_study_material_des" type="file" class="form-control" placeholder="Exam Description"
                            >
                       
                    </div>
                    </div>
                     <div class="col-lg-6">
                    <div class="form-group">
                        <label>Exam Document Upload</label><span class="mandatory">*</span>
                        <input name="user_file1" id="exam_study_material_des" type="file" class="form-control" placeholder="Exam Description"
                            >
                       
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
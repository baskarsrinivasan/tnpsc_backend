
<?php foreach($default as $row){}?>
<div class="row align-items-center">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4 class="font-size-18">Category</h4>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?php echo site_url('masters/category/'); ?>">Category</a></li>
                <li class="breadcrumb-item active">Category</li>
            </ol>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="float-right d-none d-md-block">

            <a class="btn btn-primary waves-effect waves-light" href="<?php echo base_url(); ?>masters/category/">
                View Category
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
                <h4 class="card-title">Edit Category</h4>
                <form action="<?php echo base_url(); ?>masters/exams/edit/<?php echo $default['id']; ?>"
                    method="post" enctype="multipart/form-data">
                   
                    <div class="form-group">
                        <label>Exam Name</label><span class="mandatory">*</span>
                        <input name="exams_name" id="category" type="text" class="form-control" placeholder="Enter category Name"
                            value="<?php echo $default['exams_name']; ?>">
                        <?php if (form_error('exams_name')) {?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <?php echo form_error('exams_name'); ?>
                        </div>
                        <?php }?>
                    </div>
                    <div class="form-group">
                        <label>اExam Description</label><span class="mandatory">*</span>
                        <input name="exams_des" id="category" type="text" class="form-control" placeholder=" اسم القسم<"
                            value="<?php echo $default['exams_des']; ?>">
                        <?php if (form_error('exams_des')) {?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <?php echo form_error('exams_des'); ?>
                        </div>
                        <?php }?>
                    </div>
                     
                    <div class="form-group">
                        <label>Exam Image Upload</label><span class="mandatory">*</span>
                        <input name="user_file" id="exams_des" type="file" class="form-control" placeholder="Exam Description"
                            required>
                        
                    </div>
                  <img src="<?php echo $default['image']; ?>" width="150px" height="150px">
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
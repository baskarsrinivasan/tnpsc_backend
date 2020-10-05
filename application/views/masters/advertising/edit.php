
<?php foreach($default as $row){}?>
<div class="row align-items-center">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4 class="font-size-18">Advertising</h4>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?php echo site_url('masters/Advertising/'); ?>">Advertising</a></li>
                <li class="breadcrumb-item active">Advertising</li>
            </ol>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="float-right d-none d-md-block">

            <a class="btn btn-primary waves-effect waves-light" href="<?php echo base_url(); ?>masters/Advertising/">
                View Advertising
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
                <h4 class="card-title">Edit Advertising</h4>
                <form action="<?php echo base_url(); ?>masters/advertising/edit/<?php echo $default['id']; ?>"
                    method="post" enctype="multipart/form-data">
                   
                    <div class="form-group">
                        <label>Advertising Name</label><span class="mandatory">*</span>

                        <select name="advertising_name" class="form-control"  required>
                            <option>--Select Exam--</option>
                            <option value="1" <?php if ($default['advertising_name']=='1') {
    echo 'selected';
}?>>Banner Image 760*100</option>
                            <option value="2" <?php if ($default['advertising_name']=='2') {
    echo 'selected';
}?>>Banner Image 760*200</option>
                            <option value="3" <?php if ($default['advertising_name']=='3') {
    echo 'selected';
}?>>Box Image</option>
                            <option value="4" <?php if ($default['advertising_name']=='4') {
    echo 'selected';
}?>>Side Bar Image</option>
                            <option value="5" <?php if ($default['advertising_name']=='5') {
    echo 'selected';
}?>>Side Bar Big Image</option>
                            <?php foreach($exams as $row){?>
                            <option value="<?php echo $row->id?>" <?php if ($row->id == $default['exam_id']) {
    echo 'selected';
}?>><?php echo $row->exams_name?></option>
                            <?php } ?>
                        </select>
                        
                        <?php if (form_error('advertising_name')) {?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <?php echo form_error('advertising_name'); ?>
                        </div>
                        <?php }?>
                    </div>
                    <div class="form-group">
                        <label>اAdvertising Description</label><span class="mandatory">*</span>
                         <textarea name="advertising_des" id="description" rows="4" cols="50" class="form-control"
                            placeholder="Advertising Description" required><?php echo $default['advertising_des']; ?></textarea>
                       
                        <?php if (form_error('advertising_des')) {?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <?php echo form_error('advertising_des'); ?>
                        </div>
                        <?php }?>
                    </div>
                     
                    <div class="form-group">
                        <label>Advertising Image Upload</label><span class="mandatory">*</span>
                        <input name="user_file" id="advertising_des" type="file" class="form-control" placeholder="Advertising Description"
                            >
                        
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
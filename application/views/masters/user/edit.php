
<?php foreach($default as $row){}?>
<div class="row align-items-center">
     <div class="col-sm-6">
        <div class="page-title-box">
            <h4 class="font-size-18">User</h4>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?php echo site_url('masters/User/'); ?>">User</a></li>
                <li class="breadcrumb-item active">Manage User</li>
            </ol>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="float-right d-none d-md-block">
            <a class="btn btn-primary waves-effect waves-light" href="<?php echo base_url(); ?>masters/user/">
                View User
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
                <h4 class="card-title">Edit Country</h4>
                <form action="<?php echo base_url(); ?>masters/user/edit/<?php echo $default['user_id']; ?>"
                    method="post" enctype="multipart/form-data">
                   
                    
                    <div class="form-group">
                        <label>First Name</label><span class="mandatory">*</span>
                        <input name="first_name" id="country" type="text" class="form-control" placeholder="Enter First Name"
                            value="<?php echo $default['first_name']; ?>">
                        <?php if (form_error('country_trans')) {?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <?php echo form_error('first_name'); ?>
                        </div>
                        <?php }?>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label><span class="mandatory">*</span>
                        <input name="last_name" id="country" type="text" class="form-control" placeholder="Enter Last Name"
                            value="<?php echo $default['last_name']; ?>">
                        <?php if (form_error('country_trans')) {?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <?php echo form_error('last_name'); ?>
                        </div>
                        <?php }?>
                    </div>
                    <div class="form-group">
                        <label>Email</label><span class="mandatory">*</span>
                        <input name="email" id="country" type="text" class="form-control" placeholder="Enter Email"
                            value="<?php echo $default['email']; ?>">
                        <?php if (form_error('email')) {?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <?php echo form_error('email'); ?>
                        </div>
                        <?php }?>
                    </div>
                    <div class="form-group">
                        <label>Mobile Number</label><span class="mandatory">*</span>
                        <input name="mobile" id="country" type="text" class="form-control" placeholder="Enter Mobile Number"
                            value="<?php echo $default['mobile']; ?>">
                        <?php if (form_error('mobile')) {?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <?php echo form_error('mobile'); ?>
                        </div>
                        <?php }?>
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
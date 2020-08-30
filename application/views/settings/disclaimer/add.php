<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
<style>
#button1 {
    position: absolute;
    left: 900px;
    margin-top: -51px;
}

#button2 {
    position: absolute;
    left: 950px;
    margin-top: -51px;
}

.btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
}

.btn-circle.btn-lg {
    width: 50px;
    height: 50px;
    padding: 10px 16px;
    font-size: 18px;
    line-height: 1.33;
    border-radius: 25px;
}

.btn-circle.btn-xl {
    width: 70px;
    height: 70px;
    padding: 10px 16px;
    font-size: 24px;
    line-height: 1.33;
    border-radius: 35px;
}

i.mdi.mdi-fullscreen {
    float: right;
    margin-left: 960px;
}
</style>
<div class="row align-items-center">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4 class="font-size-18">Manage Disclaimer</h4>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Settings</a></li>
                <li class="breadcrumb-item active">Disclaimer</li>
            </ol>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="float-right d-none d-md-block">

            <a class="btn btn-primary waves-effect waves-light" href="<?php echo base_url(); ?>settings/disclaimer/">
                View Disclaimer
            </a>
        </div>
    </div>
</div>

<?php
if ($this->session->flashdata('alert_success')) {
    ?>
<div class="alert alert-success alert-dismissible show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <strong>Success!</strong> <?php echo $this->session->flashdata('alert_success'); ?>
</div>
<?php
}

if ($this->session->flashdata('alert_danger')) {
    ?>
<div class="alert alert-danger alert-dismissible show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <strong>Success!</strong> <?php echo $this->session->flashdata('alert_danger'); ?>
</div>
<?php
}

if ($this->session->flashdata('alert_warning')) {
    ?>
<div class="alert alert-warning alert-dismissible show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <strong>Success!</strong> <?php echo $this->session->flashdata('alert_warning'); ?>
</div>
<?php
}
if (validation_errors()) {
    ?>
<div class="alert alert-danger alert-dismissible show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <?php echo validation_errors(); ?>
</div>
<?php
}
?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create New Disclaimer</h4>

                <form action="<?php echo base_url(); ?>settings/disclaimer/add" method="post">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" id="product_desc"
                            placeholder="Enter Heading">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" id="product_desc" rows="4" cols="50"
                            class="form-control summernote" placeholder="Enter Description"></textarea>
                    </div>


                    <div class="form-group mb-0">
                        <div>
                            <button name="submit" type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<div class="row align-items-center">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4 class="font-size-18">Zone Management</h4>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Settings</a></li>
                <li class="breadcrumb-item active">Zone</li>
            </ol>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="float-right d-none d-md-block">
           
                <a class="btn btn-primary waves-effect waves-light" href="<?php echo base_url(); ?>settings/zone/">
                    <i class="mdi mdi-plus mr-2"></i> View Zones
                </a>
        </div>
    </div>
</div>

<?php
if($this->session->flashdata('alert_success'))
{
?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <strong>Success!</strong> <?php echo $this->session->flashdata('alert_success'); ?>
</div>
<?php
}

if($this->session->flashdata('alert_danger'))
{
?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <strong>Success!</strong> <?php echo $this->session->flashdata('alert_danger'); ?>
</div>
<?php
}

if($this->session->flashdata('alert_warning'))
{
?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <strong>Success!</strong> <?php echo $this->session->flashdata('alert_warning'); ?>
</div>
<?php
}
if(validation_errors())
{
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
                <h4 class="card-title">Edit <?php echo $default['zone_name']; ?></h4>

                <form  action="<?php echo base_url();?>settings/zone/edit/<?php echo $default['id'];?>" method="post">
                    <div class="form-group">
                        <label>Zone Name</label>
                        <input name="zone_name" id="zone_name" type="text" class="form-control" required="" placeholder="Enter zone name" value="<?php echo $default['zone_name']; ?>">
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
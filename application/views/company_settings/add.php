<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<div class="row align-items-center">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4 class="font-size-18">Coupon</h4>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?php echo site_url('coupons/coupon/'); ?>">Coupon</a></li>
                <li class="breadcrumb-item active">Manage Coupon</li>
            </ol>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="float-right d-none d-md-block">

            <a class="btn btn-primary waves-effect waves-light" href="<?php echo base_url(); ?>coupons/coupon/">
                View Coupon
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
                <h4 class="card-title">Create Coupon</h4>

                <form action="<?php echo base_url(); ?>coupons/coupon/add" method="post" enctype="multipart/form-data">
                    
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Coupon Name</label><span class="mandatory">*</span>
                            <input name="coupon_name" id="coupon_name" type="text" class="form-control" placeholder="أدخل اسم القسيمة "
                                required>
                            <?php if (form_error('coupon_name')) {?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <?php echo form_error('coupon_name'); ?>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Coupon Image</label><span class="mandatory">*</span>
                            <input name="user_file" id="user_file" type="file" class="form-control" placeholder="Image" required>
                            <?php if (form_error('user_file')) {?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <?php echo form_error('user_file'); ?>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Price</label><span class="mandatory">*</span>
                            <input name="price" id="price" type="text" class="form-control" placeholder="Enter Price"
                                required>
                            <?php if (form_error('price')) {?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <?php echo form_error('price'); ?>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Highlights</label><span class="mandatory">*</span>
                            <input name="highlights" id="highlights" type="text" class="form-control" placeholder="Enter Highlights"
                                required>
                            <?php if (form_error('highlights')) {?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <?php echo form_error('highlights'); ?>
                            </div>
                            <?php }?>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Condition</label><span class="mandatory">*</span>
                            <input name="condition" id="condition" type="text" class="form-control" placeholder="Enter condition"
                                required>
                            <?php if (form_error('condition')) {?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <?php echo form_error('condition'); ?>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Points</label><span class="mandatory">*</span>
                            <input name="points" id="points" type="text" class="form-control" placeholder="Enter points"
                                required>
                            <?php if (form_error('points')) {?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <?php echo form_error('points'); ?>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Expiry Date</label><span class="mandatory">*</span>
                            <input name="expiry" id="expiry" type="text" class="form-control" placeholder="Enter expiry"
                                required>
                            <?php if (form_error('expiry')) {?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <?php echo form_error('expiry'); ?>
                            </div>
                            <?php }?>
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
<script type="text/javascript">
    $(function() {
    $("#expiry").datepicker({
        dateFormat: 'dd-mm-yy'
    });

});
</script>



<div class="row align-items-center">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4 class="font-size-18">Company Settings</h4>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?php echo site_url('company_settings/company_settings/'); ?>">Manage Company Settings</a>
                </li>
                <li class="breadcrumb-item active">Manage Company Settings</li>
            </ol>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="float-right d-none d-md-block">

            <a class="btn btn-primary waves-effect waves-light"
                href="<?php echo base_url(); ?>company_settings/company_settings/">
                Manage Company Settings
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
<?php
$restaurant = $default[0]->restaurant_id
// print_r($default[0]->coupon_image);
// exit();
?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Coupon</h4>

                <form
                    action="<?php echo base_url(); ?>company_settings/company_settings/edit/<?php echo $default['id']; ?>"
                    method="post" enctype="multipart/form-data">

                    <div class="row">
                       
                
                     
                       
                        <div class="col-lg-6">
                        <div class="form-group">
                            <label>PAGE TITLE</label><span class="mandatory">*</span>
                            <textarea name="page_title" id="page_title" type="text" class="form-control summernote" placeholder="Enter Highlights"
                            required><?php echo $default['page_title'];?></textarea> 
                            
                            <?php if (form_error('page_title')) {?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <?php echo form_error('page_title'); ?>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>PAGE DESCRIPTION</label><span class="mandatory">*</span>
                            <textarea name="page_desc" id="page_desc" type="text" class="form-control summernote" placeholder="أدخل لمحات  "
                            required><?php echo $default['page_desc'];?></textarea> 
                           
                            <?php if (form_error('page_desc')) {?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <?php echo form_error('page_desc'); ?>
                            </div>
                            <?php }?>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>ABOUT DESCRIPTION</label><span class="mandatory">*</span>
                            <textarea name="about_desc" id="about_desc" type="text" class="form-control summernote" placeholder="Enter about_desc"
                            required><?php echo $default['about_desc'];?></textarea> 
                            
                            <?php if (form_error('about_desc')) {?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <?php echo form_error('about_desc'); ?>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>META DESCRIPTION</label><span class="mandatory">*</span>
                            <textarea name="meta_desc" id="meta_desc" type="text" class="form-control summernote" placeholder="META DESCRIPTION"
                            required><?php echo $default['meta_desc'];?></textarea>
                            
                            <?php if (form_error('meta_desc')) {?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <?php echo form_error('meta_desc'); ?>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>META KEYWORD</label><span class="mandatory">*</span>
                                <input name="meta_keyword" id="meta_keyword" type="text" class="form-control"
                                    placeholder="Enter Price" value="<?php echo $default['meta_keyword']; ?>"
                                    required>
                                <?php if (form_error('meta_keyword')) {?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <?php echo form_error('meta_keyword'); ?>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                        <br/>
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
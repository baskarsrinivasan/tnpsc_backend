
<?php foreach($default as $row){}?>
<div class="row align-items-center">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4 class="font-size-18">Exam Currentaffairs</h4>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?php echo site_url('masters/exam_currentaffairs/'); ?>">Exam Currentaffairs</a></li>
                <li class="breadcrumb-item active">Exam Currentaffairs</li>
            </ol>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="float-right d-none d-md-block">

            <a class="btn btn-primary waves-effect waves-light" href="<?php echo base_url(); ?>masters/exam_currentaffairs/">
                View Exam Currentaffairs
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
                <form action="<?php echo base_url(); ?>masters/exam_currentaffairs/edit/<?php echo $default['id']; ?>"
                    method="post" enctype="multipart/form-data">
                   
                         <div class="form-group">
                        <label>Exam Name</label><span class="mandatory">*</span>
                        <select name="exam_id" class="form-control"  required>
                            <option>--Select Exam--</option>
                            <?php foreach($exams as $row){?>
                            <option value="<?php echo $row->id?>" <?php if ($row->id == $default['exam_id']) {
    echo 'selected';
}?>><?php echo $row->exams_name?></option>
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
                  
                    <div class="form-group">
                        <label>Exam Name</label><span class="mandatory">*</span>
                         <textarea name="exam_currentaffairs_name" id="description" rows="4" cols="50" class="form-control summernote"
                            placeholder="Currentaffairs Question" required><?php echo $default['exam_currentaffairs_name']; ?></textarea>
                       
                        <?php if (form_error('exam_currentaffairs_name')) {?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <?php echo form_error('exam_currentaffairs_name'); ?>
                        </div>
                        <?php }?>
                    </div>
                    <div class="form-group">
                        <label>اExam Description</label><span class="mandatory">*</span>
                        <textarea name="exam_currentaffairs_des" id="description" rows="4" cols="50" class="form-control summernote"
                            placeholder="Enter Description"><?php echo $default['exam_currentaffairs_des']; ?></textarea>
                       
                        <?php if (form_error('exam_currentaffairs_des')) {?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <?php echo form_error('exam_currentaffairs_des'); ?>
                        </div>
                        <?php }?>
                    </div>
                     
                    <div class="form-group">
                        <label>Exam Image Upload</label><span class="mandatory">*</span>
                        <input name="user_file" id="exam_currentaffairs_des" type="file" class="form-control" placeholder="Exam Description"
                            >
                        
                    </div>
                     <div class="form-group">
                        <label>Exam Document Upload</label><span class="mandatory">*</span>
                        <input name="user_file1" id="exam_currentaffairs_des" type="file" class="form-control" placeholder="Exam Description"
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
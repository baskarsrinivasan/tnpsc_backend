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
            <h4 class="font-size-18">Faq Management</h4>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Settings</a></li>
                <li class="breadcrumb-item active">Faq</li>
            </ol>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="float-right d-none d-md-block">

            <a class="btn btn-primary waves-effect waves-light" href="<?php echo base_url(); ?>settings/faq/">
                <i class="mdi mdi-plus mr-2"></i> View Faq
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
                <h4 class="card-title">Edit Faq</h4>

                <form action="<?php echo base_url(); ?>settings/faq/edit/<?php echo $default['id']; ?>" method="post">
                    <div class="form-group">
                        <label>Insurance Category</label>
                        <select name="insurance_type" id="insurance_type" type="text" class="form-control" required>
                            <option value="">Select</option>
                            <?php foreach ($types as $t) {?>
                            <option <?php if ($t->id == $default['insurance_id']) {
    echo 'selected';
}
    ?> value="<?php echo $t->id; ?>"><?php echo $t->insurance_name; ?></option>
                            <?php }?>
                        </select>
                    </div>

                    <div class="max" style="background-color:#f9f9f9;">
                        <div class="multi-fields">
                            <div class="multi-field">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Question</label><span class="mandatory">*</span>
                                        <textarea name="question" id="question" rows="4" cols="50"
                                            class="form-control summernote" placeholder="Enter Question"><?php echo $default['question']?></textarea>
                                        <?php if (form_error('question')) {?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <?php echo form_error('question'); ?>
                                        </div>
                                        <?php }?>
                                    </div>
                                    <div class="col-md-6">
                                        <label>سؤال</label><span class="mandatory">*</span>
                                        <textarea name="question_trans" id="question" rows="4" cols="50"
                                            class="form-control summernote" placeholder="Enter Question">
                                                <?php echo $default1['question']?>
                                            </textarea>
                                        <?php if (form_error('question')) {?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <?php echo form_error('question'); ?>
                                        </div>
                                        <?php }?>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Answer</label><span class="mandatory">*</span>
                                        <textarea name="answer" id="answer" rows="4" cols="50"
                                            class="form-control summernote" placeholder="Enter Answer"><?php echo $default['answer']?></textarea>
                                        <?php if (form_error('answer')) {?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <?php echo form_error('answer'); ?>
                                        </div>
                                        <?php }?>
                                    </div>
                                    <div class="col-md-6">
                                        <label>إجابة</label><span class="mandatory">*</span>
                                        <textarea name="answer_trans" id="answer" rows="4" cols="50"
                                            class="form-control summernote" placeholder="Enter Answer"><?php echo $default1['answer']?></textarea>
                                        <?php if (form_error('answer')) {?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <?php echo form_error('answer'); ?>
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>



                                <br>

                                <!-- <button type="button" id="button1" class="add-field btn btn-default btn-circle"><i
                                        class="glyphicon glyphicon-plus"></i></button>
                                <button type="button" id="button2" class="remove-field btn btn-default btn-circle"><i
                                        class="glyphicon glyphicon-minus"></i></button> -->

                            </div>
                        </div>
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

<script>
$('.max').each(function() {
    var $wrapper = $('.multi-fields', this);
    $(".add-field", $(this)).click(function(e) {
        $('.multi-field:first-child', $wrapper).clone(true).appendTo($wrapper).find('input').val('')
            .focus('.uom');
    });
    $('.multi-field .remove-field', $wrapper).click(function() {
        if ($('.multi-field', $wrapper).length > 1)
            $(this).parent('.multi-field').remove();
    });
});
</script>
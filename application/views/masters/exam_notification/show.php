<div class="row align-items-center">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4 class="font-size-18">Exam Notification</h4>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?php echo site_url('masters/exam_notification/'); ?>">Exam Notification</a></li>
                <li class="breadcrumb-item active">Exam Notification</li>
            </ol>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="float-right d-none d-md-block">

            <a class="btn btn-primary waves-effect waves-light" href="<?php echo base_url(); ?>masters/exam_notification/add/">
                <i class="mdi mdi-plus mr-2"></i> Add New
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
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="dmstable" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>                            
                            <th>Exam Name</th>
                            <th>Exam Description<th>
                         
                            
                            
                                                      
                            <th>ACTION</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
datatable_init('<?php echo base_url(); ?>', '<?php echo $datatable; ?>', [
   
    {
        "data": "exam_notification"
    },
    {
        "data": "exam_notification_des"
    },
     {
        "data": "image",
        "render": function(data) {
            if (data) {
                return '<a href="' + data + '" target="_blank"><img src="' + data +
                    '" class="avatar" width="50" height="50"/></a>';
            } else {
                return "No Attachment";
            }

        }
    },
   {
        "data": "action"
    }
]);

function delete_item(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then(isConfirmed => {
        if (isConfirmed.value) {
            $.ajax({
                url: "<?php echo base_url(); ?>masters/exams/delete/" + id + "/",
                success: function(result) {
                    if (result) {
                        window.location('masters/exams/');
                    }
                }
            });

            if (isConfirmed.value) {
                Swal.fire(
                    'Deleted!',
                    'exams has been deleted.',
                    'success'
                );
                $('#dmstable').DataTable().ajax.reload();
            }
        }
    });
}


function update_status(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You can always change the status to active or in-active!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Change it!'
    }).then(isConfirmed => {
        if (isConfirmed.value) {
            $.ajax({
                url: "<?php echo base_url(); ?>masters/exam_notification/change_status/" + id + "/",
                success: function(result) {
                    if (result) {
                        window.location('masters/exam_notification');
                    }
                }
            });

            if (isConfirmed.value) {
                Swal.fire(
                    'Changed!',
                    'exams status has been changed successfully!',
                    'success'
                );
                $('#dmstable').DataTable().ajax.reload();
            }
        }
    });
}
</script>
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
           
                <a class="btn btn-primary waves-effect waves-light" href="<?php echo base_url(); ?>settings/zone/add/">
                    <i class="mdi mdi-plus mr-2"></i> Add New
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
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                 <table id="dmstable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
					<thead>
						<tr>
							<th>#</th>
							<th>ZONE</th>
							<th>CREATED</th>
							<th>MODIFIED</th>
							<th>ACTION</th>
						</tr>
					</thead>
				</table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	datatable_init('<?php echo base_url();?>','<?php echo $datatable;?>',[
                   { "data": "id" },
                   { "data": "zone_name" },
                   { "data": "created_at" },
                   { "data": "modified_at" },
                   { "data": "action" }
                ]);

    function delete_item(id)
    {
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            $.ajax({url: "<?php echo base_url();?>settings/zone/delete/"+id+"/", success: function(result){
                if(result)
                {
                    window.location('settings/zone');
                }
            }});
          if (result.value) {
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            );
            $('#dmstable').DataTable().ajax.reload();
          }
        });
    }
</script>


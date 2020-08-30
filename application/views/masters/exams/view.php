<div class="row align-items-center">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4 class="font-size-18">Category</h4>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?php echo site_url('masters/category/'); ?>">Category</a></li>
                <li class="breadcrumb-item active">Category</li>
            </ol>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="float-right d-none d-md-block">

            <a class="btn btn-primary waves-effect waves-light" href="<?php echo base_url(); ?>masters/category/">
                View Category
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">View Category</h4>
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>Category Name</th>
                            <td><?php echo $default1['categoryname']; ?></td>
                        </tr>
                        <tr>
                            <th>سم القسم</th>
                            <td><?php echo $default['categoryname']; ?></td>
                        </tr>                        
                        <tr>
                            <th>Status</th>
                            <td><?php if($default1['inactive'] == 1)
                            {
                                echo  "Active";
                            }
                            else
                                {
                                     echo  "InActive";
                                }
                                    
                                ?></td>
                        </tr>

                        <tr>
                            <td colspan="2" class="text-center">
                                <!--
                                <a href="<?php echo base_url(); ?>seller/branchmanager/branch_manager/edit/<?php echo $default['user_id']; ?>"
                                    class="btn btn-primary">
                                    Edit Branch
                                </a> -->

                                &nbsp;<a href="<?php echo base_url(); ?>masters/category/"
                                    class="btn btn-secondary">Back</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
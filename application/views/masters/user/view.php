<div class="row align-items-center">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4 class="font-size-18">Manage Users</h4>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?php echo site_url('masters/User/'); ?>">Manage Users</a></li>
                <li class="breadcrumb-item active">User Details</li>
            </ol>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="float-right d-none d-md-block">
            <a class="btn btn-primary waves-effect waves-light" href="<?php echo base_url(); ?>masters/user/">
                View User Details
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">View User Details</h4>
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>First Name</th>
                            <td><?php echo $default['firstname']; ?></td>
                        </tr>
                        <tr>
                            <th>Last Name</th>
                            <td><?php echo $default['lastname']; ?></td>
                        </tr>  
                          <tr>
                            <th>Email</th>
                            <td><?php echo $default['email']; ?></td>
                        </tr> 
                        <tr>
                            <th>Mobile Number</th>
                            <td><?php echo $default['mobile']; ?></td>
                        </tr>                        
                        
                        <tr>
                            <td colspan="2" class="text-center">
                                <!--
                                <a href="<?php echo base_url(); ?>seller/branchmanager/branch_manager/edit/<?php echo $default['user_id']; ?>"
                                    class="btn btn-primary">
                                    Edit Branch
                                </a> -->

                                &nbsp;<a href="<?php echo base_url(); ?>masters/user/"
                                    class="btn btn-secondary">Back</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
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


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">View Coupon</h4>
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>PAGE TITLE</th>
                            <td><?php echo $default['page_title']; ?> </td>
                        </tr>
                        <tr>
                            <th>سPAGE DESCRIPTION</th>
                            <td><?php echo $default['page_desc']; ?> </td>
                        </tr>  
                        <tr>
                            <th>ABOUT DESCRIPTION</th>
                            <td><?php echo $default['about_desc']; ?> </td>
                        </tr>
                        <tr>
                            <th>META DESCRIPTION</th>
                            <td><?php echo $default['meta_desc']; ?> </td>
                        </tr>
                        <tr>
                            <th>META KEYWORD</th>
                            <td><?php echo $default['meta_keyword']; ?> </td>
                        </tr>
                       
                        <tr>
                            <th>STATUS</th>
                            <td><?php if($default['status']== 1)
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

                                &nbsp;<a href="<?php echo base_url(); ?>company_settings/company_settings/"
                                    class="btn btn-secondary">Back</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
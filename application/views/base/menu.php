<?php
$u1 = $this->uri->segment(1);
$u2 = $this->uri->segment(2);
?>
<div class="vertical-menu">
    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>
<?php if($this->auth_level=='9') { ?>
                <li>
                    <a href="<?php echo base_url(); ?>" class="waves-effect">
                        <i class="ti-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-user"></i>
                        <span>Master</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url(); ?>masters/exams">Exams</a></li>
                        <li><a href="<?php echo base_url(); ?>masters/exam_syllabus">Exam Syllabus</a></li>
                        <li><a href="<?php echo base_url(); ?>masters/exam_notification">Exam Notification</a></li>
                        <li><a href="<?php echo base_url(); ?>masters/exam_currentaffairs">Exam Currentaffairs</a></li>
                       <!--  <li><a href="<?php echo base_url(); ?>masters/language">Manage languages</a></li>
                        <li><a href="<?php echo base_url(); ?>masters/company">Company</a></li>
                        <li><a href="<?php echo base_url(); ?>masters/department">Departments</a></li>
                        
                        <li><a href="<?php echo base_url(); ?>masters/transtype1">Transtype1</a></li>
                        <li><a href="<?php echo base_url(); ?>masters/transtype2">Transtype2</a></li>
                        <li><a href="<?php echo base_url(); ?>masters/transtype3">Transtype3</a></li>
                        <li><a href="<?php echo base_url(); ?>masters/documents">Documents</a></li>
                        <li><a href="<?php echo base_url(); ?>masters/transdata">Transdata</a></li> -->
                       
                    </ul>

                </li>
            
                  <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-user"></i>
                        <span>Manage Users</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url(); ?>masters/user">User Details</a></li>
                       
                       
                    </ul>

                </li>
              
            <?php } elseif($this->auth_level=='8'){ ?>
 <li>
                    <a href="<?php echo base_url(); ?>finance/transdata" class="has-arrow waves-effect">
                        <i class="ti-user"></i>
                        <span>Transdata</span>
                    </a>
                  

                </li>
                  <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-user"></i>
                        <span>Manage Users</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url(); ?>finance/user">User Details</a></li>
                       
                       
                    </ul>

                </li>
                 <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-user"></i>
                        <span>Survey Reports</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url(); ?>masters/survey">Survey Reports</a></li>
                       
                       
                    </ul>

                </li>
            <?php } elseif($this->auth_level=='7') { ?>
<li>
                    <a href="<?php echo base_url(); ?>finance/transdata" class="has-arrow waves-effect">
                        <i class="ti-user"></i>
                        <span>Transdata</span>
                    </a>
                  

                </li>
                  <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-user"></i>
                        <span>Manage Users</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url(); ?>transdata_operator/user">User Details</a></li>
                       
                       
                    </ul>

                </li>
                 <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-user"></i>
                        <span>Survey Reports</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url(); ?>transdata_operator/survey">Survey Reports</a></li>
                       
                       
                    </ul>

                </li>
            <?php } ?>
              
                <!-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-user"></i>
                        <span>Companies</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url(); ?>masters/company">Manage Companies</a></li>
                    </ul>

                </li> -->
               
                
                
               
                
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
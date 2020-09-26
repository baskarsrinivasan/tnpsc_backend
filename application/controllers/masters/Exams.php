<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Exams extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->is_logged_in();
        $this->load->library('form_validation');
        ($this->verify_min_level(1)) ? '' : redirect('login');
    }

    public function index()
    {
        $view_data['datatable'] = base_url() . 'masters/exams/datatable/';
        $data = array(
            'title' => 'exams',
            'content' => $this->load->view('masters/exams/show', $view_data, true),
        );
        $this->load->view('base/main_template', $data);
    }

    public function datatable()
    {
        $this->datatables->select('c.id as id,c.exams_name,IF(c.is_active=1,CONCAT(c.exams_name,"<br><span class=\"badge badge-success\">ACTIVE</span>"),CONCAT(c.exams_name,"<br><span class=\"badge badge-danger\">IN-ACTIVE</span>")) as exams,c.exams_des as exams_des,c.image as image')
            ->from('exams as c');
            
            
            $this->db->order_by("c.id","desc");
        $this->datatables->add_column('action', '<a class="btn btn-primary btn-sm" href="' . base_url() . 'masters/exams/edit/$1"><i class="fas fa-edit"></i></a> &nbsp; 
        &nbsp;<a
        class="btn btn-info btn-sm"
        href="javascript:void(0);"
        onclick="update_status($1)"
        title="Change Status">
        <i class="fas fa-share"></i> Delete &nbsp;
    </a>
        <a
        class="btn btn-info btn-sm"
        href="javascript:void(0);"
        onclick="update_status($1)"
        title="Change Status">
        <i class="fas fa-share"></i> Status
    </a>', 'id');

        echo $this->datatables->generate();
    }

    public function add()
    {

        
        if (isset($_POST['submit'])) {
            //Receive Values
            $exams_name = $this->input->post('exams_name');            
            $exams_des = $this->input->post('exams_des');            
                     
            //Set validation Rules
            $this->form_validation->set_rules('exams_name', 'Exams Name', 'required');
            $this->form_validation->set_rules('exams_des', 'Exams Description', 'required');
            //check is the validation returns no error
            if ($this->form_validation->run() == true) {  
             if ($_FILES['user_file']['name']) {
                    if (!is_dir('./attachments/exam/')) {
                        mkdir('./attachments/exam/', 0777, true);
                    }
                    $upload_path = './attachments/exam/';
                    $upload_path_table = base_url() . 'attachments/exam/';
                    $banner = $_FILES['user_file']['name'];
                    $expbanner = explode('.', $banner);
                    $bannerexptype = $expbanner[1];
                    $date = date('m/d/Yh:i:sa', time());
                    $rand = rand(10000, 99999);
                    $encname = $date . $rand;
                    $bannername = md5($encname) . '.' . $bannerexptype;
                    $bannerpath = $upload_path . $bannername;
                    move_uploaded_file($_FILES["user_file"]["tmp_name"], $bannerpath);
                    $cover_pic = $upload_path_table . $bannername;
                } else {
                    $cover_pic = "";
                }
                              
                if($exams_name != "")
                {
                    //prepare insert array
                    $insert_array = array(
                        'exams_name' => $exams_name,  
                        'exams_des' => $exams_des,  
                        'image' => $cover_pic,  
                        'is_active'  =>'1'                
                        
                    );
                    //insert values in database
                    $insert = $this->mcommon->common_insert('exams', $insert_array);
               
                   
                      

                    
                }


                if ($insert > '0') {
                    $this->session->set_flashdata('alert_success', 'exams added successfully!');
                } else {
                    $this->session->set_flashdata('alert_danger', 'Something went wrong. Please try again later');
                }
            }
        }
        $view_data["title"]="Tnpsc Career";
        $data = array(
            'title' => 'Add exams',
            'content' => $this->load->view('masters/exams/add', $view_data, true),
        );
        $this->load->view('base/main_template', $data);

    }

    public function edit($id)
    {
        if (isset($_POST['submit'])) {
             $exams_name = $this->input->post('exams_name');            
            $exams_des = $this->input->post('exams_des');            
                     
            //Set validation Rules
            $this->form_validation->set_rules('exams_name', 'Exams Name', 'required');
            $this->form_validation->set_rules('exams_des', 'Exams Description', 'required');
            //check is the validation returns no error
            if ($this->form_validation->run() == true) {
                 if (($_FILES['user_file']['name'])!='') {
                    if (!is_dir('./attachments/exam/')) {
                        mkdir('./attachments/exam/', 0777, true);
                    }
                    $upload_path = './attachments/exam/';
                    $upload_path_table = base_url() . 'attachments/exam/';
                    $banner = $_FILES['user_file']['name'];
                    $expbanner = explode('.', $banner);
                    $bannerexptype = $expbanner[1];
                    $date = date('m/d/Yh:i:sa', time());
                    $rand = rand(10000, 99999);
                    $encname = $date . $rand;
                    $bannername = md5($encname) . '.' . $bannerexptype;
                    $bannerpath = $upload_path . $bannername;
                    move_uploaded_file($_FILES["user_file"]["tmp_name"], $bannerpath);
                    $cover_pic = $upload_path_table . $bannername;
                
               
                    $update_array = array(
                         'exams_name' => $exams_name,  
                        'exams_des' => $exams_des,  
                        'image' => $cover_pic,  
                            
                                               
                        
                    );
                    //insert values in database
                    $update = $this->mcommon->common_edit('exams', $update_array,array('id' => $id));
                    }
                    else
                   $update_array = array(
                         'exams_name' => $exams_name,  
                        'exams_des' => $exams_des,  
                      
                             
                                               
                        
                    );
                    //insert values in database
                    $update = $this->mcommon->common_edit('exams', $update_array,array('id' => $id));  {

                    }

              

                if ($update) {
                    $this->session->set_flashdata('alert_success', 'exams updated successfully!');
                    redirect('masters/exams');

                } else {
                    $this->session->set_flashdata('alert_danger', 'Something went wrong. Please try again later');
                }
            }
        }

        // $view_data['default'] = $this->mcommon->specific_row('m_countries', array('c_id' => $id));

        $view_data['default'] = $this->mcommon->specific_row('exams', array('id' => $id));
        /*$view_data['default1'] = $this->mcommon->specific_row('exams_translation', array('id' => $id,'language_id'=>'302'));*/
        // print_r($view_data['default']);
        // exit();
        $data = array(
            'title' => 'Edit exams',
            'content' => $this->load->view('masters/exams/edit', $view_data, true),
        );
        $this->load->view('base/main_template', $data);

    }

    public function delete($id)
    {
        $delete = $this->mcommon->common_delete('m_countries', array('c_id' => $id));
       
        return $delete;

    }

    public function change_status($id)
    {
        $current_status = $this->mcommon->specific_row_value('exams', array('id' => $id), 'is_active');
        $change_status = ($current_status == 1) ? 0 : 1;
        $update = $this->mcommon->common_edit('exams', array('is_active' => $change_status), array('id' => $id));

        return $update;

    }

    public function view($id)
    {
        // $view_data['default'] = $this->mcommon->specific_row('m_countries', array('c_id' => $id));
        $view_data['default'] = $this->mcommon->specific_row('exams_translation', array('examsid' => $id,'language_id'=>'302'));
        $view_data['default1'] = $this->mcommon->specific_row('exams', array('examsid' => $id));
         
        $data = array(
            'title' => 'View exams',
            'content' => $this->load->view('masters/exams/view', $view_data, true),   
        );
        $this->load->view('base/main_template', $data);
    }

}

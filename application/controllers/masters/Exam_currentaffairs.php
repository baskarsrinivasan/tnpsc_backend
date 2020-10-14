<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Exam_currentaffairs extends MY_Controller
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
        $view_data['datatable'] = base_url() . 'masters/exam_currentaffairs/datatable/';
        $data = array(
            'title' => 'exam_currentaffairs',
            'content' => $this->load->view('masters/exam_currentaffairs/show', $view_data, true),
        );
        $this->load->view('base/main_template', $data);
    }

    public function datatable()
    {
        $this->datatables->select('c.id as id,c.exam_currentaffairs_name,IF(c.is_active=1,CONCAT(c.exam_currentaffairs_name,"<br><span class=\"badge badge-success\">ACTIVE</span>"),CONCAT(c.exam_currentaffairs_name,"<br><span class=\"badge badge-danger\">IN-ACTIVE</span>")) as exam_currentaffairs,c.exam_currentaffairs_des as exam_currentaffairs_des,c.image as image')
            ->from('exam_currentaffairs as c');
            
            
            $this->db->order_by("c.id","desc");
        $this->datatables->add_column('action', '<a class="btn btn-primary btn-sm" href="' . base_url() . 'masters/exam_currentaffairs/edit/$1"><i class="fas fa-edit"></i></a> &nbsp; 
        &nbsp; 
        <a
            class="btn btn-warning btn-sm"
            href="' . base_url() . 'masters/exam_currentaffairs/view/$1"
            title="View">
            <i class="ti-eye"></i>
            </a>
        &nbsp;&nbsp; <a
        class="btn btn-danger btn-sm"
        href="javascript:void(0);"
        onclick="delete_item($1)"
        title="Change Status">
        <i class="fas fa-trase"></i> Delete
    </a> &nbsp;&nbsp;
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
            $exam_id= $this->input->post('exam_id');            
            $exam_currentaffairs_name = $this->input->post('exam_currentaffairs_name');            
            $exam_currentaffairs_des = $this->input->post('exam_currentaffairs_des');            
            $date = $this->input->post('date');            
                     
            //Set validation Rules
            $this->form_validation->set_rules('exam_id', 'exam_id', 'required');
            $this->form_validation->set_rules('exam_currentaffairs_name', 'exam_currentaffairs Name', 'required');
           
            $this->form_validation->set_rules('date', 'Date', 'required');
            //check is the validation returns no error
            if ($this->form_validation->run() == true) {  
             if ($_FILES['user_file']['name']) {
                    if (!is_dir('./attachments/exam_currentaffairs/')) {
                        mkdir('./attachments/exam_currentaffairs/', 0777, true);
                    }
                    $upload_path = './attachments/exam_currentaffairs/';
                    $upload_path_table = base_url() . 'attachments/exam_currentaffairs/';
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
                   if ($_FILES['user_file1']['name']) {
                    if (!is_dir('./attachments/exam_syllabus/')) {
                        mkdir('./attachments/exam_syllabus/', 0777, true);
                    }
                    $upload_path = './attachments/exam_syllabus/';
                    $upload_path_table = base_url() . 'attachments/exam_syllabus/';
                    $banner = $_FILES['user_file1']['name'];
                    $expbanner = explode('.', $banner);
                    $bannerexptype = $expbanner[1];
                    $date = date('m/d/Yh:i:sa', time());
                    $rand = rand(10000, 99999);
                    $encname = $date . $rand;
                    $bannername = md5($encname) . '.' . $bannerexptype;
                    $bannerpath = $upload_path . $bannername;
                    move_uploaded_file($_FILES["user_file1"]["tmp_name"], $bannerpath);
                    $cover_pic1 = $upload_path_table . $bannername;
                } else {
                    $cover_pic1 = "";
                }

                if($exam_currentaffairs_name != "")
                {
                    //prepare insert array
                    $insert_array = array(
                        'exam_id' => $exam_id,  
                        'exam_currentaffairs_name' => $exam_currentaffairs_name,  
                        'exam_currentaffairs_des' => $exam_currentaffairs_des,  
                        'image' => $cover_pic, 
                        'document' => $cover_pic1,   
                        'date' => $date,   
                        'is_active'  =>'1'                
                        
                    );
                    //insert values in database
                    $insert = $this->mcommon->common_insert('exam_currentaffairs', $insert_array);
               
                   
                      

                    
                }


                if ($insert > '0') {
                    $this->session->set_flashdata('alert_success', 'exam_currentaffairs added successfully!');
                    redirect('masters/exam_currentaffairs/');
                } else {
                    $this->session->set_flashdata('alert_danger', 'Something went wrong. Please try again later');
                }
            }
        }
       
         $view_data['exams'] = $this->mcommon->records_all('exams',array('is_active'=>'1'),  $order_by='');
        $data = array(
            'title' => 'Add exam_currentaffairs',
            'content' => $this->load->view('masters/exam_currentaffairs/add', $view_data, true),
        );
        $this->load->view('base/main_template', $data);

    }

    public function edit($id)
    {
        if (isset($_POST['submit'])) {
             $exam_id = $this->input->post('exam_id');            
             $exam_currentaffairs_name = $this->input->post('exam_currentaffairs_name');            
            $exam_currentaffairs_des = $this->input->post('exam_currentaffairs_des');            
               $date = $this->input->post('date');       
            //Set validation Rules
            $this->form_validation->set_rules('exam_id', 'exam_id', 'required');
            $this->form_validation->set_rules('exam_currentaffairs_name', 'exam_currentaffairs Name', 'required');
          
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
                        'exam_id' => $exam_id,  
                         'exam_currentaffairs_name' => $exam_currentaffairs_name,  
                        'exam_currentaffairs_des' => $exam_currentaffairs_des,  
                        'image' => $cover_pic,  
                         'date' => $date,   
                            
                                               
                        
                    );
                    //insert values in database
                    $update = $this->mcommon->common_edit('exam_currentaffairs', $update_array,array('id' => $id));
                    }
                    elseif (($_FILES['user_file1']['name'])!='') {
                    if (!is_dir('./attachments/exam/')) {
                        mkdir('./attachments/exam/', 0777, true);
                    }
                    $upload_path = './attachments/exam/';
                    $upload_path_table = base_url() . 'attachments/exam/';
                    $banner = $_FILES['user_file1']['name'];
                    $expbanner = explode('.', $banner);
                    $bannerexptype = $expbanner[1];
                    $date = date('m/d/Yh:i:sa', time());
                    $rand = rand(10000, 99999);
                    $encname = $date . $rand;
                    $bannername = md5($encname) . '.' . $bannerexptype;
                    $bannerpath = $upload_path . $bannername;
                    move_uploaded_file($_FILES["user_file1"]["tmp_name"], $bannerpath);
                    $cover_pic1 = $upload_path_table . $bannername;
                
               
                    $update_array = array(
                        'exam_id' => $exam_id,  
                         'exam_currentaffairs_name' => $exam_currentaffairs_name,  
                        'exam_currentaffairs_des' => $exam_currentaffairs_des,  
                        'document' => $cover_pic1, 
                         'date' => $date,   
                            
                                               
                        
                    );
                    //insert values in database
                    $update = $this->mcommon->common_edit('exam_currentaffairs', $update_array,array('id' => $id));
                    }
                    else
                   $update_array = array(
                    'exam_id' => $exam_id,  
                         'exam_currentaffairs_name' => $exam_currentaffairs_name,  
                        'exam_currentaffairs_des' => $exam_currentaffairs_des, 
                         'date' => $date,    
                      
                             
                                               
                        
                    );
                    //insert values in database
                    $update = $this->mcommon->common_edit('exam_currentaffairs', $update_array,array('id' => $id));  {

                    }

              

                if ($update) {
                    $this->session->set_flashdata('alert_success', 'exam_currentaffairs updated successfully!');
                    redirect('masters/exam_currentaffairs');

                } else {
                    $this->session->set_flashdata('alert_danger', 'Something went wrong. Please try again later');
                }
            }
        }

        // $view_data['default'] = $this->mcommon->specific_row('m_countries', array('c_id' => $id));
 $view_data['exams'] = $this->mcommon->records_all('exams',array('is_active'=>'1'),  $order_by='');
        $view_data['default'] = $this->mcommon->specific_row('exam_currentaffairs', array('id' => $id));
        /*$view_data['default1'] = $this->mcommon->specific_row('exam_currentaffairs_translation', array('id' => $id,'language_id'=>'302'));*/
        // print_r($view_data['default']);
        // exit();
        $data = array(
            'title' => 'Edit exam_currentaffairs',
            'content' => $this->load->view('masters/exam_currentaffairs/edit', $view_data, true),
        );
        $this->load->view('base/main_template', $data);

    }

    public function delete($id)
    {
        $delete = $this->mcommon->common_delete('exam_currentaffairs', array('id' => $id));
       
        return $delete;

    }

    public function change_status($id)
    {
        $current_status = $this->mcommon->specific_row_value('exam_currentaffairs', array('id' => $id), 'is_active');
        $change_status = ($current_status == 1) ? 0 : 1;
        $update = $this->mcommon->common_edit('exam_currentaffairs', array('is_active' => $change_status), array('id' => $id));

        return $update;

    }

    public function view($id)
    {
        // $view_data['default'] = $this->mcommon->specific_row('m_countries', array('c_id' => $id));
    
        $view_data['default1'] = $this->mcommon->specific_row('exam_currentaffairs', array('id' => $id));
         
        $data = array(
            'title' => 'View exam_currentaffairs',
            'content' => $this->load->view('masters/exam_currentaffairs/view', $view_data, true),   
        );
        $this->load->view('base/main_template', $data);
    }

}

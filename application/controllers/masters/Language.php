<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Language extends MY_Controller
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
        $view_data['datatable'] = base_url() . 'masters/language/datatable/';
        $data = array(
            'title' => 'language',
            'content' => $this->load->view('masters/language/show', $view_data, true),
        );
        $this->load->view('base/main_template', $data);
    }

    public function datatable()
    {
        $this->datatables->select('c.id as id,c.language,IF(c.is_active=1,CONCAT(c.language,"<br><span class=\"badge badge-success\">ACTIVE</span>"),CONCAT(c.language,"<br><span class=\"badge badge-danger\">IN-ACTIVE</span>")) as language')
            ->from('languages as c');
            
            
            //$this->db->order_by("c.id","desc");
        $this->datatables->add_column('action', '<a class="btn btn-primary btn-sm" href="' . base_url() . 'masters/language/edit/$1"><i class="fas fa-edit"></i></a> &nbsp; 
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

        $view_data = "";
        if (isset($_POST['submit'])) {
            //Receive Values
            $language = $this->input->post('language');            
                   
            
            $this->form_validation->set_rules('language', 'Language Name', 'required');
            //check is the validation returns no error
            if ($this->form_validation->run() == true) {                
                if($language != "")
                {
                    //prepare insert array
                    $insert_array = array(
                        'language' => $language,   
                        'is_active' =>'1'                
                        
                    );
                    //insert values in database
                    $insert = $this->mcommon->common_insert('languages', $insert_array);
               
                }


                if ($insert > '0') {
                    $this->session->set_flashdata('alert_success', 'Language added successfully!');
                } else {
                    $this->session->set_flashdata('alert_danger', 'Something went wrong. Please try again later');
                }
            }
        }
        $data = array(
            'title' => 'Add language',
            'content' => $this->load->view('masters/language/add', $view_data, true),
        );
        $this->load->view('base/main_template', $data);

    }

    public function edit($id)
    {
        if (isset($_POST['submit'])) {
            //Receive Values
            $language = $this->input->post('language');
            
            $this->form_validation->set_rules('language', 'Language Name', 'required');
          
            if ($this->form_validation->run() == true) {
               
                    $update_array = array(
                        'language' => $language,                    
                        
                    );
                    
                    $update = $this->mcommon->common_edit('languages', $update_array,array('id' => $id));
                    

                if ($update) {
                    $this->session->set_flashdata('alert_success', 'Language updated successfully!');
                    redirect('masters/language');

                } else {
                    $this->session->set_flashdata('alert_danger', 'Something went wrong. Please try again later');
                }
            }
        }

        // $view_data['default'] = $this->mcommon->specific_row('m_countries', array('c_id' => $id));

        $view_data['default'] = $this->mcommon->specific_row('languages', array('id' => $id));
        
        $data = array(
            'title' => 'Edit Language',
            'content' => $this->load->view('masters/language/edit', $view_data, true),
        );
        $this->load->view('base/main_template', $data);

    }

    public function delete($id)
    {
        $delete = $this->mcommon->common_delete('m_countries', array('c_id' => $id));
        $delete = $this->mcommon->common_delete('m_countries_translation', array('language_id' => $id));
        return $delete;

    }

    public function change_status($id)
    {
        $current_status = $this->mcommon->specific_row_value('languages', array('id' => $id), 'is_active');
        $change_status = ($current_status == 1) ? 0 : 1;
        $update = $this->mcommon->common_edit('languages', array('is_active' => $change_status), array('id' => $id));

        return $update;

    }

    public function view($id)
    {
        // $view_data['default'] = $this->mcommon->specific_row('m_countries', array('c_id' => $id));
      
        $view_data['default1'] = $this->mcommon->specific_row('languages', array('id' => $id));
         
        $data = array(
            'title' => 'View language',
            'content' => $this->load->view('masters/language/view', $view_data, true),   
        );
        $this->load->view('base/main_template', $data);
    }

}

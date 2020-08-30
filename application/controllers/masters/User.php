<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->is_logged_in();
        $this->load->library('form_validation');
        ($this->verify_role('admin'))?'':redirect('login');
    }

    public function index()
    {
        $view_data['datatable'] = base_url() . 'masters/user/datatable/';
        $data = array(
            'title' => 'Country',
            'content' => $this->load->view('masters/user/show', $view_data, true),
        );
        $this->load->view('base/main_template', $data);
    }

    public function datatable()
    {
        $this->datatables->select('c.customerid as id,c.firstname as first_name,c.lastname as last_name,c.email,c.mobile')
            ->from('customer as c');
           
            
            //$this->db->order_by("c.id","desc");
        $this->datatables->add_column('action', ' <a
            class="btn btn-warning btn-sm"
            href="' . base_url() . 'masters/user/view/$1"
            title="View">
            <i class="ti-eye"></i>
        
    ', 'id');

        echo $this->datatables->generate();
    }

    public function add()
    {

        $view_data = "";
        if (isset($_POST['submit'])) {
            //Receive Values
            $country = $this->input->post('country');            
            $country_trans = $this->input->post('country_trans');            
            //Set validation Rules
            $this->form_validation->set_rules('country', 'Country Name', 'required');
            //check is the validation returns no error
            if ($this->form_validation->run() == true) {                
                if($country != "")
                {
                    //prepare insert array
                    $insert_array = array(
                        'country_name' => $country,                    
                        
                    );
                    //insert values in database
                    $insert = $this->mcommon->common_insert('m_countries', $insert_array);
               
                   
                        $trans_array = array(                        
                            'language_id' => 301,                    
                            'country_id' => $insert,                    
                            'country' => $country,                    
                        );
                        //insert values in database
                        $insert_english = $this->mcommon->common_insert('m_countries_translation', $trans_array);

                        $insert_array = array(                        
                                                'language_id' => 302,                    
                                                'country_id' => $insert,                    
                                                'country' => $country_trans,                    
                                            );
                        //insert values in database
                        $insert_arabic = $this->mcommon->common_insert('m_countries_translation', $insert_array);

                    
                }


                if ($insert > '0') {
                    $this->session->set_flashdata('alert_success', 'Country added successfully!');
                } else {
                    $this->session->set_flashdata('alert_danger', 'Something went wrong. Please try again later');
                }
            }
        }
        $data = array(
            'title' => 'Add Country',
            'content' => $this->load->view('masters/country/add', $view_data, true),
        );
        $this->load->view('base/main_template', $data);

    }

    public function edit($id)
    {
        if (isset($_POST['submit'])) {
            //Receive Values
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $email = $this->input->post('email');
            $mobile = $this->input->post('mobile');
                        
            //Set validation Rules
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('mobile', 'Mobile Number', 'required');
            //check is the validation returns no error
            if ($this->form_validation->run() == true) {
                // print_r($id);
                // exit();
               //prepare insert array
                    $update_array = array(
                        'first_name' => $first_name,                    
                        'last_name' => $last_name,                    
                        'email' => $email,                    
                        'mobile' => $mobile,
                    );
                   
                    $update = $this->mcommon->common_edit('users', $update_array,array('user_id' => $id));
                    

                if ($update) {
                    $this->session->set_flashdata('alert_success', 'Users updated successfully!');
                    redirect('masters/user');

                } else {
                    $this->session->set_flashdata('alert_danger', 'Something went wrong. Please try again later');
                }
            }
        }

        // $view_data['default'] = $this->mcommon->specific_row('m_countries', array('c_id' => $id));

        $view_data['default'] = $this->mcommon->specific_row('users', array('user_id' => $id));
        
        // print_r($view_data['default']);
        // exit();
        $data = array(
            'title' => 'Edit Users',
            'content' => $this->load->view('masters/user/edit', $view_data, true),
        );
        $this->load->view('base/main_template', $data);

    }

    public function delete($id)
    {
        $delete = $this->mcommon->common_delete('m_countries', array('c_id' => $id));
        $delete = $this->mcommon->common_delete('m_countries_translation', array('country_id' => $id));
        return $delete;

    }

    public function change_status($id)
    {
        $current_status = $this->mcommon->specific_row_value('m_countries', array('c_id' => $id), 'is_active');
        $change_status = ($current_status == 1) ? 0 : 1;
        $update = $this->mcommon->common_edit('m_countries', array('is_active' => $change_status), array('c_id' => $id));

        return $update;

    }

    public function view($id)
    {
        // $view_data['default'] = $this->mcommon->specific_row('m_countries', array('c_id' => $id));
        
        $view_data['default'] = $this->mcommon->specific_row('customer', array('customerid' => $id));
         
        $data = array(
            'title' => 'View Country',
            'content' => $this->load->view('masters/user/view', $view_data, true),   
        );
        $this->load->view('base/main_template', $data);
    }

}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends MY_Controller
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
        $view_data['datatable'] = base_url() . 'page/page/datatable/';
        $data = array(
            'title' => 'Pages',
            'content' => $this->load->view('page/show', $view_data, true),
        );
        $this->load->view('base/main_template', $data);
    }

    public function datatable()
    {
        $this->datatables->select('d.id as id,d.title,d.content,p.title as titles,p.content as contents')
            ->from('pages as d')
            ->join('pages_translation as p','d.id=p.page_id')
            ->where('p.language_id','302')
            ->add_column('action', '<a class="btn btn-primary btn-sm" href="' . base_url() . 'page/page/edit/$1">EDIT</a> &nbsp;', 'id');

        echo $this->datatables->generate();
    }

    public function add()
    {
        if (isset($_POST['submit'])) {
            //Receive Values
            $title = $this->input->post('title');
            $description = $this->input->post('description');
            //Set validation Rules
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');

            //check is the validation returns no error
            if ($this->form_validation->run() == true) {
                //prepare insert array

                $insert_array = array(
                    'title' => $title,
                    'content' => $description,
                );

                //insert values in database
                $insert = $this->db->insert('m_disclaimer', $insert_array);
                if ($insert > '0') {
                    $this->session->set_flashdata('alert_success', 'Disclaimer added successfully!');
                } else {
                    $this->session->set_flashdata('alert_danger', 'Something went wrong. Please try again later');
                }
            }
        }
        $view_data[''] = "";
        $data = array(
            'title' => 'Add Pages',
            'content' => $this->load->view('page/page/add', $view_data, true),
        );
        $this->load->view('base/main_template', $data);

    }

    public function edit($id)
    {

        if (isset($_POST['submit'])) {
            $title = $this->input->post('title');
            $title_trans = $this->input->post('title_trans');
            $description = $this->input->post('description');
            $description_trans = $this->input->post('description_trans');
            //Set validation Rules
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');

            //check is the validation returns no error
            if ($this->form_validation->run() == true) {
                //prepare update array
                $update_array = array(
                    'title' => $title,
                    'content' => $description,
                );
                //insert values in database
                $update = $this->mcommon->common_edit('pages', $update_array, array('id' => $id));
                 $trans_array = array(                        
                            'language_id' => 301,                    
                            'page_id' => $id,                    
                            'title' => $title,                    
                            'content' => $description,                    
                        );
                        //insert values in database
                        $update_english = $this->mcommon->common_edit('pages_translation', $trans_array,array('page_id' => $id,'language_id' => 301));

                        $trans_array1 = array(                        
                          'language_id' => 302,                    
                            'page_id' => $id,                    
                            'title' => $title_trans,                    
                            'content' => $description_trans,                    
                                           
                                            );
                        //insert values in database
                       $update_arabic = $this->mcommon->common_edit('pages_translation', $trans_array1,array('page_id' => $id,'language_id' => 302));


                if ($update) {
                    $this->session->set_flashdata('alert_success', 'Pages updated successfully!');
                    redirect('page/page');

                } else {
                    $this->session->set_flashdata('alert_danger', 'Something went wrong. Please try again later');
                }
            }
        }

        $view_data['default1'] = $this->mcommon->specific_row('pages_translation', array('page_id' => $id,'language_id'=>'302'));
        $view_data['default'] = $this->mcommon->specific_row('pages', array('id' => $id));
        
        $data = array(
            'title' => 'Edit Pages',
            'content' => $this->load->view('page/edit', $view_data, true),
        );
        $this->load->view('base/main_template', $data);

    }

    public function delete($id)
    {
        $delete = $this->mcommon->common_delete('m_disclaimer', array('id' => $id));
        return $delete;

    }

}
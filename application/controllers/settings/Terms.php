<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Terms extends MY_Controller
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
        $view_data['datatable'] = base_url() . 'settings/terms/datatable/';
        $data = array(
            'title' => 'Manage Terms & Condition',
            'content' => $this->load->view('settings/terms/show', $view_data, true),
        );
        $this->load->view('base/main_template', $data);
    }

    public function datatable()
    {
        $this->datatables->select('d.id as id,d.title,d.content')
            ->from('m_terms_condition as d')
            ->add_column('action', '<a class="btn btn-primary btn-sm" href="' . base_url() . 'settings/terms/edit/$1">EDIT</a> &nbsp; <a class="btn btn-danger btn-sm" href="javascript:void(0);" onclick="delete_item($1)">DELETE</a>', 'id');

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
                $insert = $this->db->insert('m_terms_condition', $insert_array);
                if ($insert > '0') {
                    $this->session->set_flashdata('alert_success', 'Terms&Condition added successfully!');
                } else {
                    $this->session->set_flashdata('alert_danger', 'Something went wrong. Please try again later');
                }
            }
        }
        $view_data[''] = "";
        $data = array(
            'title' => 'Add Terms&Condition',
            'content' => $this->load->view('settings/terms/add', $view_data, true),
        );
        $this->load->view('base/main_template', $data);

    }

    public function edit($id)
    {

        if (isset($_POST['submit'])) {
            $title = $this->input->post('title');
            $description = $this->input->post('description');
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
                $update = $this->mcommon->common_edit('m_terms_condition', $update_array, array('id' => $id));

                if ($update) {
                    $this->session->set_flashdata('alert_success', 'Terms&Condition updated successfully!');
                    redirect('settings/terms');

                } else {
                    $this->session->set_flashdata('alert_danger', 'Something went wrong. Please try again later');
                }
            }
        }

        $view_data['default'] = $this->mcommon->specific_row('m_terms_condition', array('id' => $id));
        $data = array(
            'title' => 'Edit Terms&Condition',
            'content' => $this->load->view('settings/terms/edit', $view_data, true),
        );
        $this->load->view('base/main_template', $data);

    }

    public function delete($id)
    {
        $delete = $this->mcommon->common_delete('m_terms_condition', array('id' => $id));
        return $delete;

    }

}
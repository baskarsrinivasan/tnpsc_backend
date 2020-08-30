<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Privacy extends MY_Controller
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
        $view_data['datatable'] = base_url() . 'settings/privacy/datatable/';
        $data = array(
            'title' => 'Manage Privacy',
            'content' => $this->load->view('settings/privacy/show', $view_data, true),
        );
        $this->load->view('base/main_template', $data);
    }

    public function datatable()
    {
        $this->datatables->select('d.id as id,d.title,d.content')
            ->from('m_privacy_policy as d')
            ->add_column('action', '<a class="btn btn-primary btn-sm" href="' . base_url() . 'settings/privacy/edit/$1">EDIT</a> &nbsp; <a class="btn btn-danger btn-sm" href="javascript:void(0);" onclick="delete_item($1)">DELETE</a>', 'id');

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
                $insert = $this->db->insert('m_privacy_policy', $insert_array);
                if ($insert > '0') {
                    $this->session->set_flashdata('alert_success', 'Privacy Policy added successfully!');
                } else {
                    $this->session->set_flashdata('alert_danger', 'Something went wrong. Please try again later');
                }
            }
        }
        $view_data[''] = "";
        $data = array(
            'title' => 'Add Privacy Policy',
            'content' => $this->load->view('settings/privacy/add', $view_data, true),
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
                $update = $this->mcommon->common_edit('m_privacy_policy', $update_array, array('id' => $id));

                if ($update) {
                    $this->session->set_flashdata('alert_success', 'Privacy Policy updated successfully!');
                    redirect('settings/privacy');

                } else {
                    $this->session->set_flashdata('alert_danger', 'Something went wrong. Please try again later');
                }
            }
        }

        $view_data['default'] = $this->mcommon->specific_row('m_privacy_policy', array('id' => $id));
        $data = array(
            'title' => 'Edit Privacy',
            'content' => $this->load->view('settings/privacy/edit', $view_data, true),
        );
        $this->load->view('base/main_template', $data);

    }

    public function delete($id)
    {
        $delete = $this->mcommon->common_delete('m_privacy_policy', array('id' => $id));
        return $delete;

    }

}
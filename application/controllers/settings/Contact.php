<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends MY_Controller
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
        $view_data['datatable'] = base_url() . 'settings/contact/datatable/';
        $data = array(
            'title' => 'Manage Contact',
            'content' => $this->load->view('settings/contact/show', $view_data, true),
        );
        $this->load->view('base/main_template', $data);
    }

    public function datatable()
    {
        $this->datatables->select('d.id as id,d.title,d.content')
            ->from('m_contact as d')
            ->add_column('action', '<a class="btn btn-primary btn-sm" href="' . base_url() . 'settings/contact/edit/$1">EDIT</a> &nbsp; <a class="btn btn-danger btn-sm" href="javascript:void(0);" onclick="delete_item($1)">DELETE</a>', 'id');

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
                $insert = $this->db->insert('m_contact', $insert_array);
                if ($insert > '0') {
                    $this->session->set_flashdata('alert_success', 'Contact added successfully!');
                } else {
                    $this->session->set_flashdata('alert_danger', 'Something went wrong. Please try again later');
                }
            }
        }
        $view_data[''] = "";
        $data = array(
            'title' => 'Add Contact',
            'content' => $this->load->view('settings/contact/add', $view_data, true),
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
                $update = $this->mcommon->common_edit('m_contact', $update_array, array('id' => $id));

                if ($update) {
                    $this->session->set_flashdata('alert_success', 'Contact updated successfully!');
                    redirect('settings/contact');

                } else {
                    $this->session->set_flashdata('alert_danger', 'Something went wrong. Please try again later');
                }
            }
        }

        $view_data['default'] = $this->mcommon->specific_row('m_contact', array('id' => $id));
        $data = array(
            'title' => 'Edit Contact',
            'content' => $this->load->view('settings/contact/edit', $view_data, true),
        );
        $this->load->view('base/main_template', $data);

    }

    public function delete($id)
    {
        $delete = $this->mcommon->common_delete('m_contact', array('id' => $id));
        return $delete;

    }

}
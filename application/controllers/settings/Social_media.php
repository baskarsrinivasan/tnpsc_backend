<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Social_media extends MY_Controller
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
        $view_data['datatable'] = base_url() . 'settings/social_media/datatable/';
        $data = array(
            'title' => 'Social Media',
            'content' => $this->load->view('settings/social_media/show', $view_data, true),
        );
        $this->load->view('base/main_template', $data);
    }

    public function datatable()
    {
        $this->datatables->select('*,sml_id as id');
        $this->datatables->from('social_media_link as a');

        $this->datatables->add_column('action', '<a class="btn btn-primary btn-sm" href="' . base_url() . 'settings/social_media/edit/$1"><i class="fas fa-edit"></i></a>&nbsp;<a class="btn btn-danger btn-sm" href="javascript:void(0);" onclick="delete_item($1)"> <i class="fa fa-trash"></i></a>&nbsp;
        &nbsp;&nbsp;
       ', 'id');

        echo $this->datatables->generate();
    }

    public function add()
    {

        $view_data = "";
        if (isset($_POST['submit'])) {
            //Receive Values
            $media_name = $this->input->post('media_name');
            $media_link = $this->input->post('media_link');

            //Set validation Rules
            $this->form_validation->set_rules('media_name', 'MEDIA NAME', 'required');
            $this->form_validation->set_rules('media_link', 'MEDIA LINK', 'required');
            //check is the validation returns no error
            if ($this->form_validation->run() == true) {

                //prepare insert array
                $insert_array = array(
                    'media_name' => $media_name,
                    'media_link' => $media_link,
                );
                //insert values in database
                $insert = $this->mcommon->common_insert('social_media_link', $insert_array);

                if ($insert > '0') {
                    $this->session->set_flashdata('alert_success', 'Social Media added successfully!');
                    redirect('settings/social_media');

                } else {
                    $this->session->set_flashdata('alert_danger', 'Something went wrong. Please try again later');
                }
            }
        }
        $data = array(
            'title' => 'Add Social Media',
            'content' => $this->load->view('settings/social_media/add', $view_data, true),
        );
        $this->load->view('base/main_template', $data);

    }

    public function edit($id)
    {
        if (isset($_POST['submit'])) {
            //Receive Values
            $media_name = $this->input->post('media_name');
            $media_link = $this->input->post('media_link');

            //Set validation Rules
            $this->form_validation->set_rules('media_name', 'MEDIA NAME', 'required');
            $this->form_validation->set_rules('media_link', 'MEDIA LINK', 'required');
            //check is the validation returns no error
            if ($this->form_validation->run() == true) {

                //prepare update array
                $update_array = array(
                    'media_name' => $media_name,
                    'media_link' => $media_link,
                );

                //insert values in database
                $update = $this->mcommon->common_edit('social_media_link', $update_array, array('sml_id' => $id));
                if ($update) {
                    $this->session->set_flashdata('alert_success', 'Social Media updated successfully!');
                    redirect('settings/social_media');

                } else {
                    $this->session->set_flashdata('alert_danger', 'Something went wrong. Please try again later');
                }
            }
        }

        $view_data['default'] = $this->mcommon->getSocialmedia($id);
        $data = array(
            'title' => 'Edit Social Media',
            'content' => $this->load->view('settings/social_media/edit', $view_data, true),
        );
        $this->load->view('base/main_template', $data);

    }

    public function delete($id)
    {
        $delete = $this->mcommon->common_delete('social_media_link', array('sml_id' => $id));
        return $delete;

    }

    public function change_status($id)
    {
        $current_status = $this->mcommon->specific_row_value('reviews', array('review_id' => $id), 'review_active');
        $change_status = ($current_status == 0) ? 1 : 0;
        $update = $this->mcommon->common_edit('reviews', array('review_active' => $change_status), array('review_id' => $id));

        $current_rev_status = $this->mcommon->specific_row_value('reviews_translation', array('revw_id' => $id), 'trans_review_active');
        $change_review_status = ($current_rev_status == 0) ? 1 : 0;
        $update = $this->mcommon->common_edit('reviews_translation', array('trans_review_active' => $change_review_status), array('revw_id' => $id));

        return $update;

    }

    public function view($id)
    {
        // $view_data['default'] = $this->mcommon->specific_row('m_song_types', array('s_id' => $id));
        $view_data['default'] = $this->mcommon->getAbout();

        $data = array(
            'title' => 'View About',
            'content' => $this->load->view('settings/about/view', $view_data, true),
        );
        $this->load->view('base/main_template', $data);
    }

}
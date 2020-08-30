<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Faq extends MY_Controller
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
        $view_data['datatable'] = base_url() . 'settings/faq/datatable/';
        $data = array(
            'title' => 'Faq Management',
            'content' => $this->load->view('settings/faq/show', $view_data, true),
        );
        $this->load->view('base/main_template', $data);
    }

    public function datatable()
    {
        $this->datatables->select('f.id as id,t.insurance_name,f.question,f.answer,DATE_FORMAT(f.created_date, "%d-%m-%Y") as date')
            ->from('m_faq as f')
            ->join('m_insurance_types as t', 't.id = f.insurance_id', 'left')
            ->add_column('action', '<a class="btn btn-primary btn-sm" href="' . base_url() . 'settings/faq/edit/$1">EDIT</a> &nbsp; <a class="btn btn-danger btn-sm" href="javascript:void(0);" onclick="delete_item($1)">DELETE</a>', 'id');

        echo $this->datatables->generate();
    }

    public function add()
    {
        if (isset($_POST['submit'])) {
            //Receive Values
            $insurance_type = $this->input->post('insurance_type');
            $question = $this->input->post('question');
            $question_trans = $this->input->post('question_trans');
            $answer = $this->input->post('answer');
            $answer_trans = $this->input->post('answer_trans');
            //Set validation Rules
            $this->form_validation->set_rules('insurance_type', 'Insurance Type', 'required');
            $this->form_validation->set_rules('question', 'Question', 'required');
            $this->form_validation->set_rules('answer', 'Answer', 'required');
            $this->form_validation->set_rules('answer_trans', 'Answer Translate', 'required');
            $this->form_validation->set_rules('question_trans', 'Question Translate', 'required');

            //check is the validation returns no error
            if ($this->form_validation->run() == true) {
                //prepare insert array
                   $insert_array= array(
                        'insurance_id' => $insurance_type,
                        'question' => $question,
                        'answer' => $answer,
                        'created_date' => date('Y-m-d H:i:s'),
                    );
                
                //insert values in database
                   $insert= $this->mcommon->common_insert('m_faq', $insert_array);

                
                
                    $insert_array1= array(
                        'language_id'=>'301',
                        'faq_id' => $insert,
                        'question' => $question,
                        'answer' => $answer,
                        
                    );
                
                //insert values in database

                $insert1 = $this->db->insert('m_faq_translation', $insert_array1);
                    $insert_array2= array(
                        'language_id'=>'302',
                        'faq_id' => $insert,
                        'question' => $question_trans,
                        'answer' => $answer_trans,
                        
                    );
                
                //insert values in database
                $insert = $this->db->insert('m_faq_translation', $insert_array2);
                
                
                if ($insert > '0') {
                    $this->session->set_flashdata('alert_success', 'FAQ added successfully!');
                } else {
                    $this->session->set_flashdata('alert_danger', 'Something went wrong. Please try again later');
                }
            }
        }
        $view_data['types'] = $this->mcommon->records_all('m_insurance_types',array('is_active' => '1'));
        $data = array(
            'title' => 'Add Faq',
            'content' => $this->load->view('settings/faq/add', $view_data, true),
        );
        $this->load->view('base/main_template', $data);

    }

    public function edit($id)
    {

        if (isset($_POST['submit'])) {
             $insurance_type = $this->input->post('insurance_type');
            $question = $this->input->post('question');
            $question_trans = $this->input->post('question_trans');
            $answer = $this->input->post('answer');
            $answer_trans = $this->input->post('answer_trans');
            //Set validation Rules
            $this->form_validation->set_rules('insurance_type', 'Insurance Type', 'required');
            $this->form_validation->set_rules('question', 'Question', 'required');
            $this->form_validation->set_rules('answer', 'Answer', 'required');
            $this->form_validation->set_rules('answer_trans', 'answer_trans', 'required');
            $this->form_validation->set_rules('question_trans', 'question_trans', 'required');

            //check is the validation returns no error
            if ($this->form_validation->run() == true) {
                //prepare update array
                $update_array = array(
                     'insurance_id' => $insurance_type,
                        'question' => $question,
                        'answer' => $answer,
                        'created_date' => date('Y-m-d H:i:s'),
                    
                );
                //insert values in database
                $update = $this->mcommon->common_edit('m_faq', $update_array, array('id' => $id));
                  $updatetrans_array1= array(
                        'language_id'=>'301',
                        'faq_id' => $id,
                        'question' => $question,
                        'answer' => $answer,
                        
                    );
                
                //insert values in database

               $update_english = $this->mcommon->common_edit('m_faq_translation', $updatetrans_array1,array('faq_id' => $id,'language_id' => 301));

                    $updatetrans_array2= array(
                        'language_id'=>'302',
                        'faq_id' => $id,
                        'question' => $question_trans,
                        'answer' => $answer_trans,
                        
                    );
                
                //insert values in database
                $update_english1 = $this->mcommon->common_edit('m_faq_translation', $updatetrans_array2,array('faq_id' => $id,'language_id' => 302));

                

                if ($update) {
                    $this->session->set_flashdata('alert_success', 'Faq updated successfully!');
                    redirect('settings/faq');

                } else {
                    $this->session->set_flashdata('alert_danger', 'Something went wrong. Please try again later');
                }
            }
        }

        $view_data['default'] = $this->mcommon->specific_row('m_faq', array('id' => $id));
        $view_data['default1'] = $this->mcommon->specific_row('m_faq_translation', array('faq_id' => $id,'language_id'=>'302'));
        
        $view_data['types'] = $this->mcommon->records_all('m_insurance_types',array('is_active' => '1'));
        $data = array(
            'title' => 'Edit Faq',
            'content' => $this->load->view('settings/faq/edit', $view_data, true),
        );
        $this->load->view('base/main_template', $data);

    }

    public function delete($id)
    {
        $delete = $this->mcommon->common_delete('m_faq', array('id' => $id));
        return $delete;

    }

}
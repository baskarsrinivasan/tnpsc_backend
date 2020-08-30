<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zone extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
		$this->load->library('form_validation');
		($this->verify_min_level(1))?'':redirect('login');
	}

	public function index()
	{
		$view_data['datatable']=base_url().'settings/zone/datatable/';
		$data = array(
			'title' => 'Zone Management',
			'content' => $this->load->view('settings/zone/show', $view_data, TRUE),
		);
		$this->load->view('base/main_template', $data);	
	}

	public function datatable()
    {
        $this->datatables->select('z.id,z.zone_name,z.modified_at,z.created_at')->from('set_zone as z');	
		$this->datatables->add_column('action', '<a class="btn btn-primary btn-sm" href="'.base_url().'settings/zone/edit/$1">EDIT</a> &nbsp; <a class="btn btn-danger btn-sm" href="javascript:void(0);" onclick="delete_item($1)">DELETE</a>', 'id');

        echo $this->datatables->generate();
    }


	public function add()
	{	
		$view_data='';
		if(isset($_POST['submit']))
		{
			//Receive Values
			$zone_name = $this->input->post('zone_name');

			//Set validation Rules 
			$this->form_validation->set_rules('zone_name', 'Zone Name', 'required');

			//check is the validation returns no error
            if ($this->form_validation->run() == TRUE)
            {
            	//prepare insert array
            	$insert_array = array('zone_name'=>$zone_name,'created_by'=>$this->auth_user_id,'updated_by'=>$this->auth_user_id);
            	//insert values in database
            	$insert = $this->mcommon->common_insert('set_zone',$insert_array);

            	if($insert > '0')
            	{
            		$this->session->set_flashdata('alert_success', 'Zone added successfully!');
            	}
            	else
            	{
            		$this->session->set_flashdata('alert_danger', 'Something went wrong. Please try again later');
            	}
            }
        }

		$data = array(
			'title' => 'Add Zone',
			'content' => $this->load->view('settings/zone/add', $view_data, TRUE),
		);
		$this->load->view('base/main_template', $data);
		
	}


	public function edit($id)
	{
		
		if(isset($_POST['submit']))
		{
			//Receive Values
			$zone_name = $this->input->post('zone_name');

			//Set validation Rules 
			$this->form_validation->set_rules('zone_name', 'Zone Name', 'required');

			//check is the validation returns no error
            if ($this->form_validation->run() == TRUE)
            {
            	//prepare update array
            	$update_array = array('zone_name'=>$zone_name,'updated_by'=>$this->auth_user_id);

            	//insert values in database
            	$update = $this->mcommon->common_edit('set_zone',$update_array,array('id'=>$id));

            	if($update)
            	{
            		$this->session->set_flashdata('alert_success', 'Zone updated successfully!');
            		redirect('settings/zone');

            	}
            	else
            	{
            		$this->session->set_flashdata('alert_danger', 'Something went wrong. Please try again later');
            	}
            }
        }

        $view_data['default']=$this->mcommon->specific_row('set_zone',array('id'=>$id));

		$data = array(
			'title' => 'Add Zone',
			'content' => $this->load->view('settings/zone/edit', $view_data, TRUE),
		);
		$this->load->view('base/main_template', $data);
		
	}


	public function delete($id)
	{
		$delete = $this->mcommon->common_delete('set_zone',array('id'=>$id));
		return $delete;
		
	}

}
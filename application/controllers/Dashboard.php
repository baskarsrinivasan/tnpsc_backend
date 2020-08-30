<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
	}

	public function index()
	{
		if( $this->verify_min_level(1))
		{
			/*$view_data='';
			$view_data["total_user"]=$this->mcommon->total_user();
			$view_data["total_orders"]=$this->mcommon->total_orders();
			$view_data["today_orders"]=$this->mcommon->today_orders();
			$view_data["total_transdata"]=$this->mcommon->total_transdata();
			$data = array(
				'title' => 'Dashboard',
				'content' => $this->load->view('pages/dashboard', $view_data, TRUE),
			);*/
			$this->load->view('base/dashboard_template');
		}
		else
		{
			redirect('login');
		}
	}
public function datatable($start='',$end='')
    {	
        /*$this->datatables->select('a.id,a.mobile,a.name');*/
        /*$this->datatables->select('CONCAT("<b><a style=text-transform:uppercase; target=_blank href='.base_url().'settings/doctor/view/",dr.id,">",dr.doctor_name,"</a></b><br>",dr.specialization,"<br><small>",d.department_name,"</small>") as doctor');
        $this->datatables->select('DATE_FORMAT(a.appointment_date, "<h6>%d %M %Y </h6><b class= text-success >%W</b>") as appointment');
        $this->datatables->select('CONCAT("#A",DATE_FORMAT(a.appointment_date, "%d%m%Y"),a.id) as appointment_no');*/
        $this->datatables->select('c.orderid as id,c.orderno,CONCAT(("<strong>"),(cu.firstname),(""),(cu.lastname),("</strong>"),(" <br/>"),(cu.email),("<br/>"),(cu.mobile)) AS name,t.applicantname,CONCAT(("AED"),(" "),(c.grandtotal)) AS grandtotal,c.receipt_no,c.orderdate')
            ->from('ordermain as c')
            ->join('orderdetails as t','c.orderid=t.orderid')
            ->join('customer as cu','cu.customerid=c.customerid');
      
        if($start!='' && $end!='')
        {
        	$this->db->where('c.orderdate >=', $start);
			$this->db->where('c.orderdate <=', $end);
        }
        $this->db->order_by('c.orderdate','asc');
		$this->datatables->add_column('action', '
			<a class="btn btn-primary btn-sm" href="#">
			SEND SMS
			</a> &nbsp;
			<a class="btn btn-primary btn-sm" href="#">
			SEND EMAIL
			</a> &nbsp;
			<a class="btn btn-danger btn-sm" href="#">
			CANCEL APPOINTMENT
			</a>

			', 'id');


        echo $this->datatables->generate();
    }
	public function test()
	{
		if( $this->verify_min_level(1))
		{
			$view_data='';
			$data = array(
				'title' => 'test',
				'content' => $this->load->view('pages/test', $view_data, TRUE),
			);
			$this->load->view('base/main_template', $data);
		}
		else
		{
			redirect('login');
		}
	}
}
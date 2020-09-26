<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Company_settings extends MY_Controller
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
        $restaurantid = $this->mcommon->specific_row_value('users', array('user_id' => $this->auth_user_id), 'company_id');

        $view_data['datatable'] = base_url() . 'company_settings/company_settings/datatable/';
        $data = array(
            'title' => 'Coupon',
            'content' => $this->load->view('company_settings/show', $view_data, true),
        );
        $this->load->view('base/main_template', $data);
    }

    public function datatable()
    {
        $this->datatables->select('c.id as id,c.page_title,IF(c.status=1,CONCAT("<span class=\"badge badge-success\">ACTIVE</span>"),CONCAT("<span class=\"badge badge-danger\">IN-ACTIVE</span>")) as status,c.page_desc,c.about_desc,c.meta_desc,c.meta_keyword')
            ->from('company_settings as c');
           
        // $this->datatables->where('c.restaurant_id',$restaurantid);

        $this->db->order_by("c.id", "desc");
        $this->datatables->add_column('action', '<a class="btn btn-primary btn-sm" href="' . base_url() . 'company_settings/company_settings/edit/$1"><i class="fas fa-edit"></i></a> &nbsp; <a class="btn btn-warning btn-sm" href="' . base_url() . 'company_settings/company_settings/view/$1" title="View"><i class="ti-eye"></i></a> &nbsp;  <a class="btn btn-info btn-sm" href="javascript:void(0);"
        onclick="update_status($1)" title="Change Status"><i class="fas fa-share"></i> Status</a>', 'id');

        echo $this->datatables->generate();
    }

    public function add()
    {

        $view_data = "";
        if (isset($_POST['submit'])) {
            //Receive Values
            // $restaurant = $this->input->post('restaurant');
            $coupon_name = $this->input->post('coupon_name');
            $highlights = $this->input->post('highlights');
            $condition = $this->input->post('condition');
            $expiry = $this->input->post('expiry');
            $price = $this->input->post('price');
            $points = $this->input->post('points');
            //Set validation Rules
            // $this->form_validation->set_rules('restaurant', 'Restaurant Name', 'required');
            $this->form_validation->set_rules('coupon_name', 'Coupon Name', 'required');
            $this->form_validation->set_rules('price', 'Price', 'required');
            $this->form_validation->set_rules('highlights', 'Highlights Name', 'required');
            $this->form_validation->set_rules('condition', 'Condition', 'required');
            $this->form_validation->set_rules('expiry', 'Expiry Date Name', 'required');
            $this->form_validation->set_rules('points', 'Points', 'required');
            //check is the validation returns no error
            $restaurantid = $this->mcommon->specific_row_value('users',array('user_id' => $this->auth_user_id),'company_id');
                // print_r($restaurantid);
                // exit();
            if ($this->form_validation->run() == true) {

                if ($_FILES['user_file']['name']) {
                    if (!is_dir('./attachments/coupons/')) {
                        mkdir('./attachments/coupons/', 0777, true);
                    }
                    $upload_path = './attachments/coupons/';
                    $upload_path_table = base_url() . 'attachments/coupons/';
                    $banner = $_FILES['user_file']['name'];
                    $expbanner = explode('.', $banner);
                    $bannerexptype = $expbanner[1];
                    $date = date('m/d/Yh:i:sa', time());
                    $rand = rand(10000, 99999);
                    $encname = $date . $rand;
                    $bannername = md5($encname) . '.' . $bannerexptype;
                    $bannerpath = $upload_path . $bannername;
                    move_uploaded_file($_FILES["user_file"]["tmp_name"], $bannerpath);
                    $cover_pic = $upload_path_table . $bannername;
                } else {
                    $cover_pic = "";
                }
                //prepare insert array
                $insert_array = array(
                                        'restaurant_id' => $restaurant,
                                        'coupon_name' => $coupon_name,
                                        'highlights' => $highlights,
                                        'coupon_condition' => $condition,
                                        'points' => $points,
                                        'expiry_date' => $expiry,
                                    );
                //insert values in database
                $insert = $this->mcommon->common_insert('coupon', $insert_array);
                $insert_array = array(
                                        'coupon_id' => $insert,
                                        'coupon_image' => $cover_pic,
                                        'coupon_pricing' => $price,
                                        // 'detail_coupon_id' => $condition,
                                        // 'expiry_date' => $expiry_date,
                                    );
                //insert values in database
                $insert = $this->mcommon->common_insert('coupon_details', $insert_array);
                if ($insert > '0') {
                    $this->session->set_flashdata('alert_success', 'Coupon added successfully!');
                    redirect('vendor/coupons/coupon','Refresh');

                } else {
                    $this->session->set_flashdata('alert_danger', 'Something went wrong. Please try again later');
                }
            }
        }
        $data = array(
            'title' => 'Add Coupon',
            'content' => $this->load->view('vendor/coupons/add', $view_data, true),
        );
        $this->load->view('vendor/base/main_template', $data);

    }

    public function edit($id)
    {
        if (isset($_POST['submit'])) {

            //Receive Values
            $page_title = $this->input->post('page_title');
            $page_desc = $this->input->post('page_desc');
            $about_desc = $this->input->post('about_desc');
            $meta_desc = $this->input->post('meta_desc');
            $meta_keyword = $this->input->post('meta_keyword');
          
            //Set validation Rules
            // $this->form_validation->set_rules('restaurant', 'Restaurant Name', 'required');
            $this->form_validation->set_rules('page_title', 'Coupon Name', 'required');
            $this->form_validation->set_rules('page_desc', 'page_desc', 'required');
            $this->form_validation->set_rules('about_desc', 'about_desc', 'required');
            $this->form_validation->set_rules('meta_desc', 'meta_desc', 'required');
            $this->form_validation->set_rules('meta_keyword', 'meta_keyword', 'required');
            
            // $restaurantid = $this->mcommon->specific_row_value('users',array('user_id' => $this->auth_user_id),'company_id');

            //check is the validation returns no error
            if ($this->form_validation->run() == true) {
                

                //prepare update array
                
                $update_array = array(
                    'page_title' => $page_title,
                    'page_desc' => $page_desc,
                    'about_desc' => $about_desc,
                    'meta_desc' => $meta_desc,
                    'meta_keyword' => $meta_keyword,
                    
                );

                //insert values in database
                $update = $this->mcommon->common_edit('company_settings', $update_array, array('id' => $id));
                //prepare update array
               

                if ($update) {
                    $this->session->set_flashdata('alert_success', 'company settings updated successfully!');
                    redirect('company_settings/company_settings', 'Refresh');

                } else {
                    $this->session->set_flashdata('alert_danger', 'Something went wrong. Please try again later');
                }
            }
        }

        $view_data['default'] = $this->mcommon->specific_row('company_settings', array('id' => $id));

        $data = array(
            'title' => 'Edit Coupon',
            'content' => $this->load->view('company_settings/edit', $view_data, true),
        );
        $this->load->view('base/main_template', $data);

    }

    public function delete($id)
    {
        $delete = $this->mcommon->common_delete('coupon', array('coupon_id' => $id));
        $delete = $this->mcommon->common_delete('coupon_details', array('detail_coupon_id' => $id));
        $delete = $this->mcommon->common_delete('coupon_translation', array('tr_coupon' => $id));
        return $delete;

    }

    public function change_status($id)
    {
        $current_status = $this->mcommon->specific_row_value('company_settings', array('id' => $id), 'status');
        $change_status = ($current_status == 1) ? 0 : 1;
        $update = $this->mcommon->common_edit('company_settings', array('status' => $change_status), array('id' => $id));

       

        return $update;
    }

    public function view($id)
    {
        // $view_data['default'] = $this->mcommon->region($id);
        $view_data['default'] = $this->mcommon->specific_row('company_settings', array('id' => $id));
        // print_r($view_data['default']);
        // exit();
        $data = array(
            'title' => 'View Coupon',
            'content' => $this->load->view('company_settings/view', $view_data, true),
        );
        $this->load->view('base/main_template', $data);
    }

}
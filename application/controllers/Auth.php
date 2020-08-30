<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->lang->load("app", "english");
	}

	/**
	 * This login method only serves to redirect a user to a
	 * location once they have successfully logged in. It does
	 * not attempt to confirm that the user has permission to
	 * be on the page they are being redirected to.
	 */
	public function home()
	{
		if($this->is_logged_in())
		{
			switch ($this->auth_level) {
				case '9':
					redirect('superadmin/dashboard');
					break;
				case '8':
					redirect('seller/dashboard');
					break;
				case '7':
					redirect('branch/dashboard');
					break;
				case '6':
					redirect('delivery/dashboard');
					break;
				default:
					$this->logout();
					break;
			}
		}
		else
		{
			//echo 'landed here';
			redirect('login');
		}
	}
	public function login() {
		if ($this->session->userdata('logged_in')) 
		{
			redirect('dashboard');
		}

		//date_default_timezone_set($this->dbvars->timezone);
		// Method should not be directly accessible
		if ($this->uri->uri_string() == 'auth/login') {
			show_404();
		}

		if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
			$this->require_min_level(1);
		}

		$this->setup_login_form();

		$view_data = '';
		$data = array(
			'title' => $this->lang->line('login_page_title'),
			'content' => $this->load->view('auth/login_form', $view_data, TRUE),
		);
		$this->load->view('base/login_template', $data);
	}
	public function forgetpassword() {

		if ($this->session->userdata('logged_in')) 
		{
			redirect('dashboard');
		}

		//date_default_timezone_set($this->dbvars->timezone);
		// Method should not be directly accessible
		if ($this->uri->uri_string() == 'auth/login') {
			show_404();
		}

		if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
			$this->require_min_level(1);
		}

		$this->setup_login_form();

		$view_data = '';
		$data = array(
			'title' => $this->lang->line('login_page_title'),
			'content' => $this->load->view('auth/forgetpassword', $view_data, TRUE),
		);
		$this->load->view('base/login_template', $data);
	}
	public function forgotpassword_process()
    {
        $email=$this->input->post('login_string');
        $pass=$this->input->post('login_pass');

      $password=md5($pass);

        $this->db->select("*");
        $this->db->from("users");
        $this->db->where("email",$email);
        $result=$this->db->get()->result();
       if($result)
       {

       foreach($result as $row)
       {
$user_id=$row->user_id;
       }
       $data=array('passwd'=>$password);
       $this->db->where('user_id',$user_id);
       $this->db->update('users',$data);
     


            $this->load->library('email');

            $config['protocol']    = 'smtp';
            $config['smtp_host']    = 'smtp-relay.sendinblue.com';
            $config['smtp_port']    = '587';
            $config['smtp_timeout'] = '7';
            $config['smtp_user']    = 'farmvalliblr@gmail.com';
            $config['smtp_pass']    = 'aKTZWwvYEI43b89G';
            $config['charset']    = 'utf-8';
            $config['newline']    = "\r\n";
            $config['mailtype'] = 'html'; // or html
            $config['validation'] = TRUE; // bool whether to validate email or not      
            
            $this->email->initialize($config);
            
       $cust_id = implode(',',array_column($result, 'user_id'));
       $useremail = implode(',',array_column($result, 'email'));


  $user_data['passwd']=$pass;
            $user_data['username']=$useremail;
            $user_id=$cust_id;

            $msg=$this->load->view('auth/email_forgot_pass',$user_data,true);

            $this->email->from('farmvalliblr@gmail.com', 'Anandaguru Constructions');
            $this->email->to($email); 
            $this->email->subject('Password Recovery');
            $this->email->message($msg);
            
            //Notification Starts//
            /*$username=$user_data['username'];
            $body_message="Dear $username,please check your email for password recovery";

            $push=array(
            'id'=>$user_id,
            'body'=>$body_message,
            'title'=>"Password Recovery",
            );
            $push_result=$this->send_push($push,$user_id);
            $notification = array(
                'user_id'=>$user_id,
                'title'=>"Password Recovery",
                'notification'=>$body_message,
                'response'=>$push_result,
                
            );*/




        if($this->email->send()){
               echo "<script>
			alert('Password Send Your email');
			window.history.go(-1);</script>";
            }else{
                echo "<script>
			alert('email not send');
			window.history.go(-1);</script>";
            }
       }
       else
       {
         echo "<script>
			alert('invalid email id');
			window.history.go(-1);</script>";;
       }
        

    }
     function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
public function login_process() {

           $e=$this->input->post('login_string');
			$p=$this->input->post('login_pass');
			$pa=md5($p);
	
			$query=$this->db->query("select * from users where (username='$e' or email='$e') and passwd='$pa'");
		if($query->num_rows()==1)
		{
			$row=$query->row();
			
				$data = array( 
				'user_id'      =>$row->user_id,
                'first_name'  => $row->first_name,
                'username'    => $row->username,
                'email'       => $row->email,
                'passwd'      => $row->password,
                'mobile'      => $row->mobile,
                'auth_level'  => $row->auth_level,
                'logged_in'   => TRUE
);  

			$this->session->set_userdata($data);
								
			redirect('Dashboard');

		}
		else{
			$this->session->set_flashdata('login-error','* Invaild Username and Password');
			redirect('login');
		}
}

	// --------------------------------------------------------------

	/**
	 * Log out
	 */
	public function logout() {

		$this->session->unset_userdata('logged_in');
		$this->authentication->logout();

		// Set redirect protocol
		$redirect_protocol = USE_SSL ? 'https' : NULL;

		redirect(site_url(LOGIN_PAGE . '?logout=1', $redirect_protocol));
	}

	// --------------------------------------------------------------

	/**
	 * User recovery form
	 */
	public function recover() {
		// Load resources

		$view_data = '';
		/// If IP or posted email is on hold, display message
		if ($on_hold = $this->authentication->current_hold_status(TRUE)) {
			$view_data['disabled'] = 1;
		} else {
			// If the form post looks good
			if ($this->tokens->match && $this->input->post('email')) {
				if ($user_data = $this->recovery_model->get_recovery_data($this->input->post('email'))) {
					// Check if user is banned
					if ($user_data->banned == '1') {
						// Log an error if banned
						$this->authentication->log_error($this->input->post('email', TRUE));

						// Show special message for banned user
						$view_data['banned'] = 1;
					} else {
						/**
						 * Use the authentication libraries salt generator for a random string
						 * that will be hashed and stored as the password recovery key.
						 * Method is called 4 times for a 88 character string, and then
						 * trimmed to 72 characters
						 */
						$recovery_code = substr($this->authentication->random_salt()
							. $this->authentication->random_salt()
							. $this->authentication->random_salt()
							. $this->authentication->random_salt(), 0, 72);

						// Update user record with recovery code and time
						$this->recovery_model->update_user_raw_data(
							$user_data->user_id,
							[
								'passwd_recovery_code' => $this->authentication->hash_passwd($recovery_code),
								'passwd_recovery_date' => date('Y-m-d H:i:s'),
							]
						);

						// Set the link protocol
						$link_protocol = USE_SSL ? 'https' : NULL;

						// Set URI of link
						$link_uri = 'auth/recovery_verification/' . $user_data->user_id . '/' . $recovery_code;

						$view_data['special_link'] = anchor(
							site_url($link_uri, $link_protocol)
						);

						$body = array(
							'greeting' => 'Hello,',
							'content' => '
														<div class="alert alert-success">
															<strong>
																Congratulations, you have created an account recovery link.
															</strong><br>
															You recently made a request to reset your Password. Please click the link below to complete the process. if link is not enabled, please copy and paste it in your browser.
															</p>

															<p>' . anchor(
								site_url($link_uri, $link_protocol),
								site_url($link_uri, $link_protocol),
								'target ="_blank"'
							) . '</p>
														</div>
													',
							'thanks_text' => 'Thanks &amp; Regards, <br /> ' . $this->dbvars->app_name . ' Team<br />',
						);

						$email_array = array(
							'to' => $this->input->post('email'),
							'subject' => $this->dbvars->app_name . ' - Password change request',
							'body' => $body);

						$this->smtp_mail->send_with_template($email_array);
						$view_data['confirmation'] = 1;
					}
				}

				// There was no match, log an error, and display a message
				else {
					// Log the error
					$this->authentication->log_error($this->input->post('email', TRUE));

					$view_data['no_match'] = 1;
				}
			}
		}

		$data = array(
			'title' => $this->lang->line('recover_page_title'),
			'content' => $this->load->view('auth/recover_form', $view_data, TRUE),
		);
		$this->load->view('base/login_template', $data);
	}

	// --------------------------------------------------------------

	/**
	 * Verification of a user by email for recovery
	 *
	 * @param  int     the user ID
	 * @param  string  the passwd recovery code
	 */
	public function recovery_verification($user_id = '', $recovery_code = '') {
		/// If IP is on hold, display message
		if ($on_hold = $this->authentication->current_hold_status(TRUE)) {
			$view_data['disabled'] = 1;
		} else {
			// Load resources
			$this->load->model('examples/examples_model');

			if (
				/**
				 * Make sure that $user_id is a number and less
				 * than or equal to 10 characters long
				 */
				is_numeric($user_id) && strlen($user_id) <= 10 &&

				/**
				 * Make sure that $recovery code is exactly 72 characters long
				 */
				strlen($recovery_code) == 72 &&

				/**
				 * Try to get a hashed password recovery
				 * code and user salt for the user.
				 */
				$recovery_data = $this->examples_model->get_recovery_verification_data($user_id)) {
				/**
				 * Check that the recovery code from the
				 * email matches the hashed recovery code.
				 */
				if ($recovery_data->passwd_recovery_code == $this->authentication->check_passwd($recovery_data->passwd_recovery_code, $recovery_code)) {
					$view_data['user_id'] = $user_id;
					$view_data['username'] = $recovery_data->username;
					$view_data['recovery_code'] = $recovery_data->passwd_recovery_code;
				}

				// Link is bad so show message
				else {
					$view_data['recovery_error'] = 1;

					// Log an error
					$this->authentication->log_error('');
				}
			}

			// Link is bad so show message
			else {
				$view_data['recovery_error'] = 1;

				// Log an error
				$this->authentication->log_error('');
			}

			/**
			 * If form submission is attempting to change password
			 */
			if ($this->tokens->match) {
				$this->examples_model->recovery_password_change();
			}
		}

		echo $this->load->view('examples/page_header', '', TRUE);

		//echo $this->load->view( 'examples/choose_password_form', $view_data, TRUE );

		echo $this->load->view('examples/page_footer', '', TRUE);

		$data = array(
			'title' => '',
			'content' => $this->load->view('examples/choose_password_form', $view_data, TRUE),
		);
		$this->load->view('base/login_template', $data);
	}

	public function create_user()
	{
		// Customize this array for your user
		$user_data = [
			'username'   => 'superadmin',
			'passwd'     => 'Welcome@123',
			'email'      => 'info@cobonat.ae',
			'auth_level' => '9', // 9 if you want to login @ examples/index.
		];

		$this->is_logged_in();

		

		// Load resources
		$this->load->helper('auth');
		$this->load->model('examples/examples_model');
		$this->load->model('examples/validation_callables');
		$this->load->library('form_validation');

		$this->form_validation->set_data( $user_data );

		$validation_rules = [
			[
				'field' => 'username',
				'label' => 'username',
				'rules' => 'max_length[12]|is_unique[' . db_table('user_table') . '.username]',
				'errors' => [
					'is_unique' => 'Username already in use.'
				]
			],
			[
				'field' => 'passwd',
				'label' => 'passwd',
				'rules' => [
					'trim',
					'required',
					[ 
						'_check_password_strength', 
						[ $this->validation_callables, '_check_password_strength' ] 
					]
				],
				'errors' => [
					'required' => 'The password field is required.'
				]
			],
			[
				'field'  => 'email',
				'label'  => 'email',
				'rules'  => 'trim|required|valid_email|is_unique[' . db_table('user_table') . '.email]',
				'errors' => [
					'is_unique' => 'Email address already in use.'
				]
			],
			[
				'field' => 'auth_level',
				'label' => 'auth_level',
				'rules' => 'required|integer|in_list[1,6,9]'
			]
		];

		$this->form_validation->set_rules( $validation_rules );

		if( $this->form_validation->run() )
		{
			$user_data['passwd']     = $this->authentication->hash_passwd($user_data['passwd']);
			$user_data['user_id']    = $this->examples_model->get_unused_id();
			$user_data['created_at'] = date('Y-m-d H:i:s');

			// If username is not used, it must be entered into the record as NULL
			if( empty( $user_data['username'] ) )
			{
				$user_data['username'] = NULL;
			}

			$this->db->set($user_data)
				->insert(db_table('user_table'));

			if( $this->db->affected_rows() == 1 )
				echo '<h1>Congratulations</h1>' . '<p>User ' . $user_data['username'] . ' was created.</p>';
		}
		else
		{
			echo '<h1>User Creation Error(s)</h1>' . validation_errors();
		}

		
	}
}

/* End of file Auth.php */
/* Location: .//Users/ganeshananthan/Sites/letsfame/app/controllers/Auth.php */
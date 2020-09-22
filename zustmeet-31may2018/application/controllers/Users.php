<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    function __construct()
    {
        // Initialization of class
        parent::__construct();

        // load the model
        $this->load->model('user/users_model');
    }
    public function index()
	{
	    $this->IsAlreadyLogged();
	    $data['message'] = ($this->session->flashdata('message'))? $this->session->flashdata('message') :'';
	    $this->load->view('user/header.php');
		$this->load->view('user/login.php', $data);
		$this->load->view('user/footer.php');
		
		
	}
	
	public function confirm($hash=''){
	    if($hash=='') {
	        redirect(base_url());
	    } else {
	        if($this->users_model->confirm($hash)){
	            redirect('users/login');
	        }
	    }
	}
	
	public function set_like_status(){
	    echo $this->users_model->set_like_status();
	}
	
	public function bookappointment(){
	    echo $this->users_model->set_appointment();
	} 
	
	public function setfilter(){
	    $data = array(
	       'user_gender'   => $this->input->post('gender_filter'),
	       'user_age'      => $this->input->post('user_age_filter'),
	       'user_intrests' => $this->input->post('user_intrests'),
	       'user_distance' => $this->input->post('user_radius_filter')
	    );
	    $this->session->set_userdata("filters", $data);
	    redirect('users/userhome');
	}
	
	public function get_all_users() {
	    echo $this->users_model->get_all_users();
	}
	public function forgot($status=-2)
	{
	    if($status==-1){
	        $message = '<div class="isa_error"><i class="fa fa-times-circle"></i>Email id Not Exist, Please register.</div>';
	    } else if($status==-3){
	        $message = '<div class="isa_warning"><i class="fa fa-times-circle"></i>Email Required to recover password.</div>';
	    }else if($status==-2){
	        $message = '';
	    } else {
	        $message = '<div class="isa_success"><i class="fa fa-times-circle"></i>Your password sent to your registered mail.</div>';
	    }
	    $data['message'] = $message;
	    $this->load->view('user/header.php');
		$this->load->view('user/forgot.php', $data);
		$this->load->view('user/footer.php');
	}
	
	public function passwordrequest() {
	    $validate = 0;
	    if(
	        ($this->input->post('requestval')==NULL)
	     ) {
	      $validate=-3; 
	    }
	    if($validate==0) $this->forgot($this->users_model->sendpassword());
	    else $this->forgot($validate);
	    
	}
	
	public function validateuser() {
	    $this->IsAlreadyLogged();
	    if($this->users_model->checkuser()){
	      $data = array(
	       'user_gender'   => 'both',
	       'user_age'      => '18,35',
	       'user_distance' => '10',
	       'user_intrests' => 'all'
	      );
	     $this->session->set_userdata("filters", $data);
	        redirect('users/userhome');
	    } else {
	          $message = '<div class="isa_error"><i class="fa fa-times-circle"></i> The email address you have entered doesn\'t match any account.<br /> Click on Signup for an account!</div>';
	          $this->session->set_flashdata('message', $message);
	          redirect(base_url());
	    }
	}
	
	public function updateprofile(){ 
	    $data['intrests'] = array();
	    if($this->session->userdata['user_info']['is_pic_uploaded']==1){
	        $intrests = $this->users_model->user_intrests($this->session->userdata['user_info']['user_id']);
	        foreach($intrests as $intrest) {
	            array_push($data['intrests'], $intrest['user_intrest']);
	        }
	    }
	    $data['user_info'] = $this->users_model->user_info($this->session->userdata['user_info']['user_id']);
	    $this->load->view('user/user_header.php');
		$this->load->view('user/update_profile.php',$data);
		$this->load->view('user/user_footer.php');
	}
	
	public function viewprofile($id) {
	    $this->IsLogged();
	    $data['user_info'] = $this->users_model->user_info($id);
	    $this->load->view('user/user_header.php');
		$this->load->view('user/view_profile.php', $data);
		$this->load->view('user/user_footer.php');
	}
	
	public function userhome(){
	    $this->IsLogged();
	 if(!$this->users_model->profile_update_check()) {
	    $data['user_info'] = $this->users_model->user_info($this->session->userdata['user_info']['user_id']);
	    $data['intrests'] = array();
	    if($this->session->userdata['user_info']['is_pic_uploaded']==1){
	        $intrests = $this->users_model->user_intrests($this->session->userdata['user_info']['user_id']);
	        foreach($intrests as $intrest) {
	            array_push($data['intrests'], $intrest['user_intrest']);
	        }
	    }
	    $this->load->view('user/user_header.php');
		$this->load->view('user/update_profile.php',$data);
		$this->load->view('user/user_footer.php');
	 } else {
	    $this->load->view('user/user_header.php');
		$this->load->view('user/home.php');
		$this->load->view('user/user_footer.php');
	 }
	}
	
	public function login($message='')
	{
	    $this->IsAlreadyLogged();
	    $data['message'] = $message;
	    $this->load->view('user/header.php');
		$this->load->view('user/login.php', $data);
		$this->load->view('user/footer.php');
	}
	
	public function profildetails() {
	    $this->users_model->profildetailsupdate();
	    redirect('users/userhome');
	}
	
	public function changepassword($message='') {
	    $this->IsLogged();
	    $data['message'] = $message;
	    $this->load->view('user/user_header.php');
		$this->load->view('user/change_password.php', $data);
		$this->load->view('user/user_footer.php');
	    
	}
	
	public function userliked(){
	    $this->IsLogged();
	    $data['user_liked'] = $this->users_model->user_liked();
	    $this->load->view('user/user_header.php');
		$this->load->view('user/user_liked.php', $data);
		$this->load->view('user/user_footer.php');
	}
	
	
	public function updatepassword() {
	   if($this->users_model->checkcurrentpassword()){ 
	       $this->users_model->update_new_password();
	       $message = '<div class="isa_success"><i class="fa fa-times-circle"></i>Your new password succefully updated.</div>';
	   } else {
	       $message = '<div class="isa_warning"><i class="fa fa-times-circle"></i>Current Password Wrong.</div>';
	   }
	   
	   $this->changepassword($message);
	    
	}
	
	
	public function register($status=-2)
	{
	    if($status==-1){
	        $message = '<div class="isa_error"><i class="fa fa-times-circle"></i>Email id Already Exist, Please try with other one.</div>';
	    } else if($status==-2){
	        $message = '';
	    } else if($status==-3){
	        $message = '<div class="isa_warning"><i class="fa fa-times-circle"></i>All field values are required to register.</div>';
	    } else {
	        $message = '<div class="isa_success"><i class="fa fa-times-circle"></i>Thanks for registering, You are ready to find met.</div>';
	    }
	    $data['message'] = $message;
	    $this->load->view('user/header.php');
		$this->load->view('user/register.php', $data);
		$this->load->view('user/footer.php');
	}
	
	public function store()
	{
	    $validate = 0;
	    if(
	        ($this->input->post('user_name')==NULL)
	        || ($this->input->post('user_password')==NULL)
	        || ($this->input->post('user_email')==NULL)
	        || ($this->input->post('user_phone')==NULL)
	        || ($this->input->post('user_age')==NULL)
	        || ($this->input->post('user_gender')==NULL)
	     ) {
	      $validate=-3; 
	    }
	    if($validate==0) $this->register($this->users_model->insert());
	    else $this->register($validate);
	}
	
	function IsLogged()
    {
        if (!$this->session->has_userdata('user_info'))
        {
            redirect('users/login');
        }
    }

    function IsAlreadyLogged()
    {
        if ($this->session->has_userdata('user_info'))
        {
            redirect('users/userhome');
        }
    }
	
	function logout()
    {
        $user_data = $this->session->all_userdata();
            foreach ($user_data as $key => $value) {
                if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                    $this->session->unset_userdata($key);
                }
            }
        $this->session->sess_destroy();
        redirect(base_url());
    }
	
	
}

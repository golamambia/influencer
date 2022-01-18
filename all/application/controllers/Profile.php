<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('apanel/Model_users');
        $this->load->model('User_model');
        //****************************backtrace prevent*** START HERE*************************
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->library('form_validation');
        $this->load->model('General_model');
        $this->load->library("PhpMailerLib");
        $this->load->library('session');
        $this->load->helper('url');
        if($this->session->userdata('log_check')!=1)
            {
                redirect('register/login', 'refresh');
            }
      
    }

	public function index()
	{	$id=$this->session->userdata('front_sess')['userid'];
		$data['user_info']=$this->General_model->show_data_id('user_table',$id,'id','get','');
		$data['title']='TLB || Profile';
		$this->load->view('header');
		$this->load->view('profile',$data);
		$this->load->view('footer');
	}
	public function Update()
	{	
		$data['country_list']=$this->General_model->show_data_id('country','','','get','');
		$id=$this->session->userdata('front_sess')['userid'];
		$data['user_info']=$this->General_model->show_data_id('user_table',$id,'id','get','');
		$data['title']='TLB || Profile';
		$this->load->view('header');
		$this->load->view('update_profile',$data);
		$this->load->view('footer');
	}
	public function Update_post()
    {
    	$id=$this->session->userdata('front_sess')['userid'];
	$data['country_list']=$this->General_model->show_data_id('country','','','get','');
	$data['user_info']=$this->General_model->show_data_id('user_table',$id,'id','get','');
		$data['title']='TLB || Profile';
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        
        if ($this->form_validation->run() == FALSE) 
        {
            //$this->session->set_flashdata('error', 'Data  save failed');
        //    $this->load->view('header');
        // $this->load->view('register',$data);
        // $this->load->view('footer');
           $this->Update();

        }else{
            
        if(!empty($_FILES['profile_pic']['name'])){
$new_name = time().$_FILES["profile_pic"]['name'];
            $config = array(
                'upload_path' => "uploads/",
                'upload_url' => base_url() . "uploads/",
                'allowed_types' => "jpg|png|jpeg",
                'file_name'=>$new_name
            );

            $this->load->library('upload', $config);
            $this->upload->do_upload("profile_pic");
            //$datalist['img'] = $this->upload->data();
            $_POST['user_photo'] =$new_name;
            $this->session->set_userdata('user_photo', $new_name);

}else{

$_POST['user_photo'] = $data['user_info'][0]->user_photo;
}


        	$query= $this->General_model->show_data_id('user_table',$id,'id','update',$this->input->post());
    if($query){

        $this->session->set_flashdata('message', 'Data successfully updated');
       redirect('profile/update');
       }else{
        $this->session->set_flashdata('error', 'Sorry your update failed');
        redirect('profile/update');
       } 
    
}
}



}

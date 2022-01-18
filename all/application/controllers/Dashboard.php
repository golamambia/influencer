<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->database();
        
        $this->load->model('User_model');
        //****************************backtrace prevent*** START HERE*************************
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->library('form_validation');
        $this->load->model('General_model');
        $this->load->library("PhpMailerLib");
		$this->load->model('Live_datamodel');
        $this->load->library('session');
        $this->load->helper('url');
        if($this->session->userdata('infllog_check')!=1)
            {
                redirect('register/login', 'refresh');
            }
      
    }
	public function index()
	{
		$id=$this->session->userdata('infl_sess')['userid'];
        $data['user_info']=$this->General_model->show_data_id('user_table',$id,'id','get','');
        // $id=$this->session->userdata('infl_sess')['userid'];
        // $data['user_info']=$this->General_model->show_data_id('user_table',$id,'id','get','');
        
		// $data['title']="Influencer || Profile";
		// $this->load->view('header');
		// $this->load->view('dashboard',$data);
		// $this->load->view('footer');
		
		$this->subscribe();
		// if($data['user_info'][0]->subscribe_pack>0){
			// $this->subscribe();
		// }else{
			// $this->profile();
		// }
		
	}
	
	public function profile()
	{
        $id=$this->session->userdata('infl_sess')['userid'];
        $data['user_info']=$this->General_model->show_data_id('user_table',$id,'id','get','');
        
		$data['title']="Influencer || Profile";
		$this->load->view('header');
		$this->load->view('dashboard',$data);
		$this->load->view('footer');
	}
	public function change_password()
    {  
	$id=$this->session->userdata('infl_sess')['userid'];
        $data['user_info']=$this->General_model->show_data_id('user_table',$id,'id','get','');
        $data['title']='Influencer || Change-Password';
        $this->load->view('header');
        $this->load->view('update_password',$data);
        $this->load->view('footer');
    }
	public function do_change_pass()
    {

        $this->form_validation->set_rules('new_password', 'Password', 'required');

        $this->form_validation->set_rules('confirm_password','Confirm Password','required|matches[new_password]');



        if ($this->form_validation->run() == FALSE) 
        {

            $this->session->set_flashdata('error', 'Password  update failed');

            redirect('dashboard/change_password'); 



        }else{

            $user_id = $this->session->userdata('infl_sess')['userid'];

            $email = $this->session->userdata('infl_sess')['email'];  

            $datalist = array( 

                'pass'      => base64_encode($this->input->post('confirm_password'))

            );

            $query= $this->General_model->show_data_id('user_table',$user_id,'id','update',$datalist);

            if($query){


//---------------send mail ----------------//


//---------------send mail ----------------//


                $this->session->set_flashdata('message', 'Password successfully updated');

                redirect('dashboard/change_password');

            }else{

               $this->session->set_flashdata('error', 'Password  update failed');

               redirect('dashboard/change_password'); 

            }

       }  

    }
	
	public function buy_package()
	{
        $id=$this->session->userdata('infl_sess')['userid'];
        $data['user_info']=$this->General_model->show_data_id('user_table',$id,'id','get','');
		$data['pack_list']=$this->General_model->show_data_id('pricing_table','','','get','');
		
		if($data['user_info'][0]->subscribe_pack!=0 && $data['user_info'][0]->customer_strip!=''){
			
			 redirect('dashboard/subscribe');
		}
        
		$data['title']="Influencer || Package";
		$this->load->view('header');
		$this->load->view('buy_pack',$data);
		$this->load->view('footer');
	}
	public function upgrade_plan()
	{
        $id=$this->session->userdata('infl_sess')['userid'];
        $data['user_info']=$this->General_model->show_data_id('user_table',$id,'id','get','');
		$data['pack_list']=$this->General_model->show_data_id('extra_plan','','','get','');
		
		// if($data['user_info'][0]->subscribe_pack!=0 && $data['user_info'][0]->customer_strip!=''){
			
			 // redirect('dashboard/subscribe');
		// }
        
		$data['title']="Influencer || Upgrade Package";
		$this->load->view('header');
		$this->load->view('upgrade_pack',$data);
		$this->load->view('footer');
	}
public function upgrade_plan_list()
    {
        if(!$this->session->userdata('infl_sess')['subscribe_pack']>0){
            redirect('dashboard/subscribe');
        }

        $id=$this->session->userdata('infl_sess')['userid'];
        $data['pack_list']=$this->Live_datamodel->upgrade_plan_list($id);
    $data['title']="Influencer || Upgrade Package";
        $this->load->view('header');
        $this->load->view('upgrade_history',$data);
        $this->load->view('footer');
    }

public function thankyou()
    { 

 $id=base64_decode($this->input->get('user',true));
$tid=$this->input->get('tid',true);
$cus_strip=$this->input->get('uid',true);  
$data['user_info']=$this->General_model->show_data_id('user_table',$id,'id','get','');
         $data['pack_info']=$this->Live_datamodel->get_data($id);
	if($id==$data['user_info'][0]->id && $data['user_info'][0]->customer_strip==$cus_strip && $tid!=''){
		$session_data = array(
					'name'=>$data['user_info'][0]->name,
					'email'=>$data['user_info'][0]->email,
					'userid'=>$data['user_info'][0]->id,
					'customer_strip'=>$data['user_info'][0]->customer_strip,
					'subscribe_pack'=>$data['user_info'][0]->subscribe_pack,
					'user_photo'=>$data['user_info'][0]->user_photo
					
				);
			$this->session->set_userdata('infl_sess', $session_data);
	}else{
redirect('dashboard/subscribe');
	}
        
        $data['title']="influencer";
        $this->load->view('header',$data);
        $this->load->view('dashboard_thankyou');
        $this->load->view('footer');
    }
	
	public function upgrade_success()
    { 

 $id=base64_decode($this->input->get('user',true));
$tid=$this->input->get('tid',true);

$data['user_info']=$this->General_model->show_data_id('user_table',$id,'id','get','');
         $data['pack_info']=$this->Live_datamodel->get_data_upgrade($id);
	if($id!=$data['user_info'][0]->id  && $tid==''){
		redirect('dashboard/subscribe');
	}
        $data['title']="influencer";
        $this->load->view('header',$data);
        $this->load->view('upgrade_thankyou');
        $this->load->view('footer');
    }
	
	
	
	
public function Update_post()
    {
        $id=$this->session->userdata('infl_sess')['userid'];
    
    $data['user_info']=$this->General_model->show_data_id('user_table',$id,'id','get','');
        $data['title']='TLB || Profile';
        $this->form_validation->set_rules('name', 'Name', 'required');
        
        $this->form_validation->set_rules('phone', 'Phone', 'required');
       
        
        
        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Data  save failed');
        //    $this->load->view('header');
        // $this->load->view('register',$data);
        // $this->load->view('footer');
           //$this->Update();
		   redirect('dashboard/profile');

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
			 // echo '<pre>';
     // print_R($_FILES);
	 // exit();
            $_POST['user_photo'] =$new_name;
            $this->session->set_userdata('user_photo', $new_name);

}else{

$_POST['user_photo'] = $data['user_info'][0]->user_photo;
}


            $query= $this->General_model->show_data_id('user_table',$id,'id','update',$this->input->post());
    if($query){

        $this->session->set_flashdata('message', 'Data successfully updated');
       redirect('dashboard/profile');
       }else{
        $this->session->set_flashdata('error', 'Sorry your update failed');
        redirect('dashboard/profile');
       } 
    
}
}
		public function subscribe(){
			$id=$this->session->userdata('infl_sess')['userid'];
			
        $data['user_info']=$this->General_model->show_data_id('user_table',$id,'id','get','');
        $data['pack_info']=$this->Live_datamodel->get_data($id);
		
		// if($data['user_info'][0]->subscribe_pack==0){
			// redirect('dashboard/profile', 'refresh');
		// }
	if($this->session->userdata('infl_sess')['subscribe_pack']>0 && $data['user_info'][0]->plan_id=='' && $data['user_info'][0]->customer_strip==''
 && $data['user_info'][0]->subscription_id==''){
		$session_data = array(
					'name'=>$data['user_info'][0]->name,
					'email'=>$data['user_info'][0]->email,
					'userid'=>$data['user_info'][0]->id,
					'customer_strip'=>$data['user_info'][0]->customer_strip,
					'subscribe_pack'=>$data['user_info'][0]->subscribe_pack,
					'user_photo'=>$data['user_info'][0]->user_photo
					
				);
			$this->session->set_userdata('infl_sess', $session_data);
	}
		
		$data['title']="Influencer || Pack";
		$this->load->view('header');
		$this->load->view('subscribe',$data);
		$this->load->view('footer');	
		}
		
		public function failed()
    {   
	$tid=base64_decode($this->input->get('tid',true));
        if($tid!='failed'){
		redirect('dashboard/subscribe/');
		}
        $data['title']="influencer";
        $this->load->view('header',$data);
        $this->load->view('failed');
        $this->load->view('footer');
    }
		
		
	public function get_sub(){

         $id=base64_decode($this->input->post('subs'));
		if($id>0){
         $result=$this->General_model->show_data_id('pricing_table',$id,'pid','get','');
		 echo $result[0]->pamount;
		}
    }
	public function get_upgrade(){

         $id=base64_decode($this->input->post('subs'));
		if($id>0){
         $result=$this->General_model->show_data_id('extra_plan',$id,'pid','get','');
		 echo $result[0]->pamount;
		}
    }
	public function logout()
    {
        $this->session->sess_destroy();
        redirect('register/login');
    }
}

<?php
ob_start();
class Register extends CI_Controller {
    
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
        $this->load->library('session');
        $this->load->helper('url');
		// session_start();
        if($this->session->userdata('infllog_check')==1)
        {
            redirect('dashboard', 'refresh');
        }
      error_reporting(0);
    }

	public function index()
	{   
        $data['price_table']=$this->General_model->show_data_id('pricing_table','','','get','');
		$data['pid']=base64_decode($this->input->get('reg',true));
		$data['price_get']=$this->General_model->show_data_id('pricing_table',$data['pid'],'pid','get','');
		$data['title']="Fluencer";
		$this->load->view('header',$data);
		$this->load->view('register');
		$this->load->view('footer');
	}
	
	
    public function login()
    {   
	$customer_strip=$this->input->get('uid',true);
	$chargeid=$this->input->get('tid',true);
	if($customer_strip!='' && $chargeid!=''){
        $data['result_strip']=$this->General_model->show_data_id('user_table',$customer_strip,'customer_strip','get','');
		$data['result_striptxn']=$this->General_model->show_data_id('transactions',$chargeid,'charge_id','get','');
	}
        $data['title']="Fluencer";
        $this->load->view('header',$data);
        $this->load->view('login');
        $this->load->view('footer');
    }
    public function login_validation(){
        $this->form_validation->set_rules('user_name','User Id','required');
        $this->form_validation->set_rules('password','Password','required');
        if($this->form_validation->run()==FALSE){
            
            $this->login();
            //redirect('register/login');

        }else{
            $data=array('email'=>$this->input->post('user_name'),'pass'=>$this->input->post('password') 

        );
            $result = $this->User_model->login($data);
          
            if($result=='st_not'){
                $this->session->set_flashdata('error','Please contact administrator');
                redirect('register/login');
            }else if($result=='not'){
                $this->session->set_flashdata('error','Invalid Username or Password!!!!');
                redirect('register/login');
            }else{
                redirect('dashboard');
            }
        }


     }
    public function forgotpassword()
    {   
        
        $data['title']="influencer";
        $this->load->view('header',$data);
        $this->load->view('forgot_password');
        $this->load->view('footer');
    }
	public function thankyou()
    { 
$this->load->model('Live_datamodel');
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
$this->session->set_userdata('infllog_check','1');
	}else{
redirect('register/login');
	}
        
        $data['title']="influencer";
        $this->load->view('header',$data);
        $this->load->view('thankyou');
        $this->load->view('footer');
    }
public function success()
    { 

 $id=base64_decode($this->input->get('user',true));
$tid=base64_decode($this->input->get('tid',true));
 
$data['user_info']=$this->General_model->show_data_id('user_table',$id,'id','get','');
        
	if($id==$data['user_info'][0]->id && $tid=='success'){
		$session_data = array(
					'name'=>$data['user_info'][0]->name,
					'email'=>$data['user_info'][0]->email,
					'userid'=>$data['user_info'][0]->id,
					'customer_strip'=>$data['user_info'][0]->customer_strip,
					'subscribe_pack'=>$data['user_info'][0]->subscribe_pack,
					'user_photo'=>$data['user_info'][0]->user_photo
					
				);
			$this->session->set_userdata('infl_sess', $session_data);
$this->session->set_userdata('infllog_check','1');
	}else{
redirect('register/login');
	}
        
        $data['title']="influencer";
        $this->load->view('header',$data);
        $this->load->view('success');
        $this->load->view('footer');
    }
	public function failed()
    {   
	$tid=base64_decode($this->input->get('tid',true));
        if($tid!='failed'){
		redirect('register/login');
		}
        $data['title']="influencer";
        $this->load->view('header',$data);
        $this->load->view('failed');
        $this->load->view('footer');
    }
 public function register_post()
    {
        
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('subscribe', 'subscribe', 'required');
        
        $this->form_validation->set_rules('confirm_password','Confirm Password','required|matches[password]');
        
        
        if ($this->form_validation->run() == FALSE) 
        {
            //$this->session->set_flashdata('error', 'Data  save failed');
           $this->load->view('header');
        $this->load->view('register');
        $this->load->view('footer');
            //redirect('register'); 
        }else{
            $email=$this->input->post('email');
             
        $RowCount= $this->General_model->RowCount('user_table','email',$email);
        
        
        if($RowCount>0){
            $this->session->set_flashdata('error', 'Email already exist!');

       $this->load->view('header');
       $this->load->view('register');
       $this->load->view('footer');
        }

        else{
           
            
            $_POST['entry_date']=date('Y-m-d');
      
        $_POST['pass']=base64_encode($this->input->post('password'));
        
        $_POST['status']='Active';
		 $_POST['subscribe_pack']=0;
		 $_POST['renew_date']=date('Y-m-d', strtotime(' +1 months'));
       
    $query= $this->General_model->show_data_id('user_table','','','insert',$this->input->post());
    if($query>0){
        
    $this->session->set_flashdata('message', 'Thankyou for Registration.');
    // $log       = base_url(). "register/login";
    // $mail = $this->phpmailerlib->load();
    // $subject   = "Registration Successful with us";
               
    //             $mail_body = '<html><body>';
    //             $mail_body .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
    //             $mail_body .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . $this->input->post('name') . "</td></tr>";
                               
    //             $mail_body .= "<tr><td><strong>Username:</strong> </td><td>" . $this->input->post('email') . "</td></tr>";
    //             $mail_body .= "<tr ><td><strong>Password:</strong> </td><td>" . $this->input->post('password') . "</td></tr>";
    //             $mail_body .= "<tr><td><strong>Click here for login:</strong> </td><td>" . $log . "</td></tr>";
    //             $mail_body .= "</table>";
    //             $mail_body .= "</body></html>";
    //             $mail_body .= "<p>We appreciate your association. </p><p>Thank You,</p><p>Influencer</p><p>PS: This is an auto generated mail, Please do not reply to this.</p>";
    //             //$name=$_POST["name"];
                
    //             $mail->IsSMTP();
    //             $mail->Host     = "cp-46.webhostbox.net";
    //             $mail->SMTPAuth = true;
    //             $mail->Username = "sendmail@webtechnomind.co.in";
    //             $mail->Password = "ZM-(XPt2ie!z";
    //             $mail->From     = "sendmail@webtechnomind.co.in";
    //             $mail->FromName = "Registration Successful - " . $this->input->post('name');
                
    //             //$mail->AddAddress('wtm.golam@gmail.com');
    //             $mail->AddAddress($this->input->post('email'));
    //             $mail->WordWrap = 5;
    //             $mail->IsHTML(true);
    //             $mail->Subject = $subject;
    //             $mail->Body    = $mail_body;
    //             $mail->AltBody = "This is the body in plain text for non-HTML mail clients";
    //             $mail->Send();
       redirect('register/success?tid='.base64_encode('success').'&user='.base64_encode($query)); 
       }else{
        $this->session->set_flashdata('error', 'Sorry your registration failed');
        redirect('register/failed?tid='.base64_encode('failed'));
       } 
        } 
        } 
    }
	public function register_instagram()
	{ 
		$user_code = $_GET['code'];
		if(isset($user_code)){
			$url = 'https://api.instagram.com/oauth/access_token';
			$instagram_parameters = array(
				'client_id' => '641446483363398',
				'client_secret' => 'a6944b3444494ab55e8792ef7918f4ec',
				'grant_type' => 'authorization_code',
				'redirect_uri' => 'https://influencertable.com/register/register_instagram',
				'code' => $user_code
			);
			
			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $instagram_parameters);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
			$response = json_decode(curl_exec($curl), true);
			curl_close($curl);
			
			$response['access_token'];
			//var_dump($response);
			
			if($response['access_token']){
				$access_token = $response['access_token'];
				$user_id = $response['user_id'];
				$url = 'https://graph.instagram.com/'.$user_id.'?fields=id,username&access_token='.$access_token;	
				$ch = curl_init();		
				curl_setopt($ch, CURLOPT_URL, $url);		
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);	
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, TRUE);
				$data = json_decode(curl_exec($ch), true);
				curl_close($ch);
				//var_dump($data);
				//echo 'Hi, '.$data['username'].'<br/>Your ID: '.$data['id'];
				//exit();
		$instagram_id=$data['id'];
             
        $RowCount= $this->General_model->RowCount('user_table','instagram_id',$instagram_id);
        
        
        if($RowCount>0){
           $data['user_info']=$this->General_model->show_data_id('user_table',$instagram_id,'instagram_id','get','');
        
	
		$session_data = array(
					'name'=>$data['user_info'][0]->name,
					'email'=>$data['user_info'][0]->email,
					'userid'=>$data['user_info'][0]->id,
					'customer_strip'=>$data['user_info'][0]->customer_strip,
					'subscribe_pack'=>$data['user_info'][0]->subscribe_pack,
					'user_photo'=>$data['user_info'][0]->user_photo
					
				);
			$this->session->set_userdata('infl_sess', $session_data);
$this->session->set_userdata('infllog_check','1');
			redirect('home');
        }

        else{
           
            
            $_POST['entry_date']=date('Y-m-d');
      
        //$_POST['pass']=base64_encode($this->input->post('password'));
         $_POST['instagram_id']=$instagram_id;
			$_POST['name']=$data['username'];
        $_POST['status']='Active';
		 $_POST['subscribe_pack']=0;
		 $_POST['renew_date']=date('Y-m-d', strtotime(' +1 months'));
       
    $query= $this->General_model->show_data_id('user_table','','','insert',$this->input->post());
    if($query>0){
        
    $this->session->set_flashdata('message', 'Thankyou for Registration.');
    // $log       = base_url(). "register/login";
    // $mail = $this->phpmailerlib->load();
    // $subject   = "Registration Successful with us";
               
    //             $mail_body = '<html><body>';
    //             $mail_body .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
    //             $mail_body .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . $this->input->post('name') . "</td></tr>";
                               
    //             $mail_body .= "<tr><td><strong>Username:</strong> </td><td>" . $this->input->post('email') . "</td></tr>";
    //             $mail_body .= "<tr ><td><strong>Password:</strong> </td><td>" . $this->input->post('password') . "</td></tr>";
    //             $mail_body .= "<tr><td><strong>Click here for login:</strong> </td><td>" . $log . "</td></tr>";
    //             $mail_body .= "</table>";
    //             $mail_body .= "</body></html>";
    //             $mail_body .= "<p>We appreciate your association. </p><p>Thank You,</p><p>Influencer</p><p>PS: This is an auto generated mail, Please do not reply to this.</p>";
    //             //$name=$_POST["name"];
                
    //             $mail->IsSMTP();
    //             $mail->Host     = "cp-46.webhostbox.net";
    //             $mail->SMTPAuth = true;
    //             $mail->Username = "sendmail@webtechnomind.co.in";
    //             $mail->Password = "ZM-(XPt2ie!z";
    //             $mail->From     = "sendmail@webtechnomind.co.in";
    //             $mail->FromName = "Registration Successful - " . $this->input->post('name');
                
    //             //$mail->AddAddress('wtm.golam@gmail.com');
    //             $mail->AddAddress($this->input->post('email'));
    //             $mail->WordWrap = 5;
    //             $mail->IsHTML(true);
    //             $mail->Subject = $subject;
    //             $mail->Body    = $mail_body;
    //             $mail->AltBody = "This is the body in plain text for non-HTML mail clients";
    //             $mail->Send();
       redirect('register/success?tid='.base64_encode('success').'&user='.base64_encode($query)); 
       }else{
        $this->session->set_flashdata('error', 'Sorry your registration failed');
        redirect('register/failed?tid='.base64_encode('failed'));
       } 
        } 
				
			}else{
				$this->session->set_flashdata('error', 'Sorry something went wrong');
				redirect('register/login'); 
			}
		}
		else{
			redirect('register/login');
		}
	}
	
	
	
    public function GetEmail(){

        $email=$this->input->post('email');
        echo $result=$this->General_model->RowCount('user_table','email',$email);
    }
	public function get_sub(){

         $id=base64_decode($this->input->post('subs'));
		if($id>0){
         $result=$this->General_model->show_data_id('pricing_table',$id,'pid','get','');
		 echo $result[0]->pamount;
		}
    }

	public function change_password(){
        error_reporting(0);
        $this->form_validation->set_rules('user_name','User Id / Email','required');
        if ($this->form_validation->run() == FALSE) 
        {
           $data['title']="Password Recover";
         $this->load->view('header',$data);
        $this->load->view('forgot_password');
        $this->load->view('footer');
        }
    else{
         $rand=rand(0,9999999);;
        $email=$this->input->post('user_name');
        $dataarray=array(
             'pass'=>base64_encode($rand)
    );
        $RowCount= $this->General_model->RowCount('user_table','email',$email);
        if($RowCount>0){
        	$query= $this->General_model->show_data_id('user_table',$email,'email','update',$dataarray);
    if($query){
           $this->session->set_flashdata('message', 'Your password successfully reset');
    $log       = base_url(). "register/login";
    // $mail = $this->phpmailerlib->load();
    // $subject   = "Password Successful Reset";
               
                // $mail_body = '<html><body>';
                // $mail_body .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
                
                // $mail_body .= "<tr><td><strong>Username:</strong> </td><td>" . $this->input->post('user_name') . "</td></tr>";
                // $mail_body .= "<tr><td><strong>Your password :</strong> </td><td>" . $rand . "</td></tr>";
                //$mail_body .= "<tr ><td><strong>Password:</strong> </td><td>" . $this->input->post('password') . "</td></tr>";
                // $mail_body .= "<tr><td><strong>Click here for login:</strong> </td><td>" . $log . "</td></tr>";
                // $mail_body .= "</table>";
                // $mail_body .= "</body></html>";
                // $mail_body .= "<p>We appreciate your association. </p><p>Thank You,</p><p>The Local Browse</p><p>PS: This is an auto generated mail, Please do not reply to this.</p>";
                //$name=$_POST["name"];
                
                // $mail->IsSMTP();
                // $mail->Host     = "cp-46.webhostbox.net";
                // $mail->SMTPAuth = true;
                // $mail->Username = "sendmail@webtechnomind.co.in";
                // $mail->Password = "ZM-(XPt2ie!z";
                // $mail->From     = "sendmail@webtechnomind.co.in";
                // $mail->FromName = "Password Recover Successful ";
                // $mail->AddAddress('wtm.golam@gmail.com');
                //$mail->AddAddress($this->input->post('user_name'));
                // $mail->WordWrap = 5;
                // $mail->IsHTML(true);
                // $mail->Subject = $subject;
                // $mail->Body    = $mail_body;
                // $mail->AltBody = "This is the body in plain text for non-HTML mail clients";
                // $mail->Send();
       redirect('register/login');
       }else{
        $this->session->set_flashdata('rserror', 'Sorry something went wrong');
        redirect('register/forgotpassword'); 
       }
    }else{
       $this->session->set_flashdata('rserror', 'Sorry email not exist!');
        redirect('register/forgotpassword'); 
    }
    }
        
    }
	
	

}


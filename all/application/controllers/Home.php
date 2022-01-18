<?php
ob_start();
class Home extends CI_Controller {
    
     function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('apanel/Model_users');
        //****************************backtrace prevent*** START HERE*************************
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->library('form_validation');
        $this->load->model('General_model');
        $this->load->model('Live_datamodel');
        $this->load->library('session');
        $this->load->helper('url');
        // if(!$this->session->userdata('is_logged_in')==1)
        // {
        //     redirect('apanel', 'refresh');
        // }
      error_reporting(0);
    }

	public function index()
	{   
        $this->result();
	}
	
	
    public function result()
    { 
 $pack=$this->session->userdata('infl_sess')['subscribe_pack'];	
	error_reporting(0);
	if($this->session->userdata('infl_sess')['userid']){
		
		$method = $this->input->get();
	$get_count= count($method);
		$uid=$this->session->userdata('infl_sess')['userid'];
		 $result=$this->General_model->show_data_id('user_table',$uid,'id','get','');
		 $pk_chk= $result[0]->subscribe_pack;
		 if($pk_chk>0){
		 $pricing_table=$this->General_model->show_data_id('pricing_table',$result[0]->subscribe_pack,'pid','get','');
		 
		 $act_srch=$pricing_table[0]->psearch;
		 }else{
			 $act_srch=5;
		 }
			 
		 $get_uid=$result[0]->id;
		  $get_uid_count=$result[0]->search_count;
		 if($get_uid_count<$act_srch){
		 if($get_count>0){
			  $search_count=($get_uid_count)+1;
			$datalist = array( 
                'search_count'      => $search_count
               
            );
			 $this->General_model->show_data_id('user_table',$get_uid,'id','update',$datalist);
			 
		 }
		 $this->session->set_userdata('search_msg', '');
		 }else{
			 if($get_count>0){
			 $this->session->set_userdata('search_msg', 'You have completed your search limit');
			redirect('/', 'refresh');
			 }
		 }
		 
		 if($pack>0){
			 $show_result=10;
		 }else{
			$show_result=30; 
		 }
		 
		
	}else{
		$show_result=30;
	}
	
	
	$con=$this->input->get('country',true);
	$con_join='';
	for($i=0;$i<count($con);$i++){
		$con_join.="'".$con[$i]."',";
	}
	$con_cat=$this->input->get('category',true);
	$cat_join='';
	for($i=0;$i<count($con_cat);$i++){
		$cat_join.="'".$con_cat[$i]."',";
	}
	
	$con_city=$this->input->get('city',true);
	$city_join='';
	for($i=0;$i<count($con_city);$i++){
		$city_join.="'".$con_city[$i]."',";
	}
	
	
	
       $search['platform']=$this->input->get('platform',true);
	   
       $search['username']=$this->input->get('username',true);
       $search['follower_from']=$this->input->get('follower_from',true);
       $search['follower_to']=$this->input->get('follower_to',true);
       $search['following_from']=$this->input->get('following_from',true);
       $search['follower_to']=$this->input->get('follower_to',true);
	   $search['like_from']=$this->input->get('like_from',true);
       $search['like_to']=$this->input->get('like_to',true);
	   $search['comment_from']=$this->input->get('comment_from',true);
       $search['comment_to']=$this->input->get('comment_to',true);
       $search['category']=rtrim($cat_join,',');
       $search['country']=rtrim($con_join,',');
       $search['city']=rtrim($city_join,',');
       $search['verified']=$this->input->get('verified',true);
       $search['email']=$this->input->get('email',true);
       $search['gender']=$this->input->get('gender',true);
	   $search['audience_interest']=$this->input->get('audience_interest',true);
      //print_r($this->session->userdata('search'));
	  $data['srch_result_count']=countResult('datatable',$search);
	  $this->session->set_userdata('search',$search);
	   $this->session->set_userdata('show_result',$show_result);
         $data['get_data']= $this->Live_datamodel->show_data_id('datatable',$search,$show_result);
		
        //  $data['user']=$user;
		$data['title']="Influencer";
		$this->load->view('header',$data);
		$this->load->view('index');
		$this->load->view('footer');
    }

public function result1()
	{
		  $page_number =$_POST["page"]+1;
        $position = (($page_number-1) * 10);
		 
		   $search=$this->session->userdata('search');
		 //exit();
        $show_result=$this->session->userdata('show_result');
		
      
       if(empty($search)){
		   $data['test1']=1;
           $data['get_data']=array();
       }else{
           
       $data['test11']=11;
        //$data['search_data']=$this->Search_model->ad_data_list2($data['module'],$data['sub_module'],$position);
		$data['get_data']= $this->Live_datamodel->show_data_id2('datatable',$search,$show_result,$position);
		
}

 		$this->load->view('result_test',$data);

	}
	

	public function logout()
    {
        $this->session->sess_destroy();
        //redirect('main/login');
    }
	public function export_data(){
		if($this->session->userdata('infl_sess')['userid']){
		$search_data=$this->input->post('export_id');
		$tags = explode(',' , $search_data);
$num_tags = count($tags);
		error_reporting(0);
	if($this->session->userdata('infl_sess')['userid']){
		//$method = $this->input->get();
	//$get_count= count($method);
		$uid=$this->session->userdata('infl_sess')['userid'];
		 $result=$this->General_model->show_data_id('user_table',$uid,'id','get','');
		 $pk_chk= $result[0]->subscribe_pack;
		 $user_dataid=$result[0]->dataid_count;
		 if($pk_chk>0){
		 $pricing_table=$this->General_model->show_data_id('pricing_table',$result[0]->subscribe_pack,'pid','get','');
		 
		 $act_srch=$pricing_table[0]->pexport;
		 $ptable_dataid=$pricing_table[0]->pdataid;
		 }

		 $left_dataid=$ptable_dataid-$user_dataid;
			 
		 $get_uid=$result[0]->id;
		  $get_uid_count=$result[0]->export_count;
		 if($get_uid_count<$act_srch){
		 	if($left_dataid>=$num_tags){

		 if($search_data>0){
			  $search_count=($get_uid_count)+1;
			  $search_dataid_count=($user_dataid)+$num_tags;
			$datalist = array( 
                'export_count'      => $search_count,
                 'dataid_count'      => $search_dataid_count
               
            );
			 $this->General_model->show_data_id('user_table',$get_uid,'id','update',$datalist);
			 
		 }
		 $this->session->set_userdata('export_msg', '');
		 $this->session->set_userdata('dataid_msg', ''); 
		 }else{
			$this->session->set_userdata('dataid_msg', 'Please check your export profile limit in dashboard');
			redirect('/', 'refresh');
		}

		}


		 else{
			 if($search_data>0){
			 $this->session->set_userdata('export_msg', 'You have completed your export limit');
			redirect('/', 'refresh');
			 }
		 }
		 
		 
		$show_result=5;
	}else{
		$show_result=30;
	}
		
		
		
		//$this->load->model("excel_export_model");
		$this->load->library("excel");
		$object = new PHPExcel();
		

		$object->setActiveSheetIndex(0);

		$table_columns = array("Slno", "Name","User name","verified", "gender", "profile_picture_url", "user_id","post_count",
		"follower_count","following_count","email","contact_number","profile_url","country","city","platform","category","tags","price",
		"member_level","age","avg_like_post","avg_cmt_post","avg_view_post","audience_interest");

		$column = 0;

		foreach($table_columns as $field)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
		}

		$employee_data = $this->Live_datamodel->show_data_id_excel('datatable',$search_data);

		$excel_row = 2;
		$i=1;
		if($search_data>0){
		foreach($employee_data as $row)
		{
			$originalDate =date('Y-m-d');
      
                $newDate1 =date("d-m-Y",strtotime($originalDate));
			$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $i);
			$object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->user_full_name);
			$object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->user_name);
			$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->verified);
			$object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->gender);
			$object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->profile_picture_url);
			$object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->user_id);
			$object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->post_count);
			$object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->follower_count);
			$object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->following_count);
			$object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->email_id);
			$object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->contact_number);
			$object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row->profile_url);
			$object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row->country);
			$object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $row->city);
			$object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $row->platform);
			$object->getActiveSheet()->setCellValueByColumnAndRow(16, $excel_row, $row->category);
			$object->getActiveSheet()->setCellValueByColumnAndRow(17, $excel_row, $row->tags);
			$object->getActiveSheet()->setCellValueByColumnAndRow(18, $excel_row, $row->price);
			$object->getActiveSheet()->setCellValueByColumnAndRow(19, $excel_row, $row->member_level);
			$object->getActiveSheet()->setCellValueByColumnAndRow(20, $excel_row, $row->age);
			$object->getActiveSheet()->setCellValueByColumnAndRow(21, $excel_row, $row->avg_like_post);
			$object->getActiveSheet()->setCellValueByColumnAndRow(22, $excel_row, $row->avg_cmt_post);
			$object->getActiveSheet()->setCellValueByColumnAndRow(23, $excel_row, $row->avg_view_post);
			$object->getActiveSheet()->setCellValueByColumnAndRow(24, $excel_row, $row->audience_interest);					
			$excel_row++;
			$i++;
		}
		}

		$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Export Data.xls"');
		//$object_writer->save('php://output');
		
		if($object_writer->save('php://output')){
			 $this->session->set_userdata('export_msg', 'You have completed your export limit');
			
			 }
		
	}
	else{
		redirect('register/login');
	}
	}
	
	public function get_aside_data(){
		//$data = array();
 	$data=$this->input->post('post_data');
 	$id=trim(substr($data, 4));
 	$result=$this->General_model->show_data_id('datatable',$id,'id','get','');
 	//echo $data['get_data'][0]->id;
//echo $result[0]->id;
 	//print_r($data['result']); 
 	//$data['get_data']=$result;
 	if($result[0]->id>0){
 		
		   try{

$url = 'https://www.instagram.com/'.$result[0]->user_name.'/?__a=1'; 
 		$data_json = file_get_contents($url); 
		$characters = json_decode($data_json);
		//echo 1;
		   $this->load->view('json_result',compact('characters','result'));

} catch(Exception $e){

echo"wrong";
}
 	}else{
 		echo"wrong";
		
	}
 	}

}


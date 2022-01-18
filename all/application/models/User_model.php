<?php
class User_model extends CI_Model{

		function __construct() 
		{
		    parent::__construct();
		}
	//========================== LOGIN CHECK =========================
	function login($data)
	{
		
		// $ren_date='"'.date("Y-m-d", strtotime(" +1 months")).'"';
				
				// $cur_date=date('Y-m-d');
				// $this->db->query('update user_table set search_count=0,export_count=0,renew_date='.$ren_date.' where id='.$result->id.'');
				// echo $this->db->last_query();
        $condition="email ="."'".$data['email']."' and pass ="."'". base64_encode($data['pass']) ."'";
        
		$this->db->select('*');
		$this->db->from('user_table');
		$this->db->where($condition);
		//$this -> db -> where('status',1);
		$this->db->limit(1);
		$query =$this->db->get();
        if($query->num_rows()==1){
        	//return 'yes';
        	$result=$query->row();
        	
        	  if($result->status=='Inactive'){
        	 	return 'st_not';
        	 }else{
        	 	$session_data = array(
					'name'=>$result->name,
					'email'=>$result->email,
					'userid'=>$result->id,
					'customer_strip'=>$result->customer_strip,
					'subscribe_pack'=>$result->subscribe_pack,
					'user_photo'=>$result->user_photo
					
				);
				$ren_date='"'.date('Y-m-d', strtotime(' +1 months')).'"';
				
				$cur_date=date('Y-m-d');
				if($result->renew_date==$cur_date){
					$this->db->query('update user_table set search_count=0,export_count=0,renew_date='.$ren_date.' where id='.$result->id.'');
					
				}
				
				
        	 	$this->session->set_userdata('infllog_check','1');
        	 	//$this->session->set_userdata('user_photo', $result->user_photo);
			$this->session->set_userdata('infl_sess', $session_data);
			//$_SESSION['dem']=$session_data;
        	 	return $result;
        	 }
        	
        }else{
            return 'not'; 
        }
		
	 } 
	//===================== LOGIN CHECK ============================== 

	
}
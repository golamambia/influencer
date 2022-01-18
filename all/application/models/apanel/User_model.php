<?php 
class User_model extends CI_Model{
	
	function __construct() 
	{
        parent::__construct();
    }   

   public function show_data_id($table_name,$packtype,$start_date=NULL,$end_date=NULL){
			
   		$where='';
   		if($packtype =='free'){
   			$where.=' and subscribe_pack=0';
   		}
   		if($packtype =='paid'){
   			$where.=' and subscribe_pack!=0';
   		}
   		if($start_date !='' && $end_date !=''){
   			$where.=' and entry_date between "'.$start_date.'" and "'.$end_date.'"';
   		}


				$query =$this->db->query('select * from '.$table_name.' where 1=1 '.$where.'');
			
				
			$result = $query->result();
			//$result = $this->db->last_query();
			return $result;
		
	
    }

	public function upgrade_user_list(){
		$query = $this->db->query('select DISTINCT tu.customer_id,ut.id,ut.name from transactions_upgrade tu inner join user_table ut on ut.id=tu.customer_id ORDER by ut.name ASC');
		$result = $query->result();
			//$result = $this->db->last_query();
			return $result;
	}
	public function upgrade_user_addon($start_date=NULL,$end_date=NULL){
		$where='';
		if($start_date !='' && $end_date !=''){
   			$where.=' WHERE tu.created_at between "'.$start_date.'" and "'.$end_date.'"';
   		}
		$query = $this->db->query('select  tu.customer_id,tu.created_at,ut.id,ut.name,ut.email,ut.phone from transactions_upgrade tu inner join user_table ut on ut.id=tu.customer_id '.$where.' GROUP by tu.customer_id ORDER by tu.id desc');
		// $query = $this->db->query('select DISTINCT tu.customer_id,ut.id,ut.name,ut.email,ut.phone from transactions_upgrade tu inner join user_table ut on ut.id=tu.customer_id ORDER by ut.name ASC');
		$result = $query->result();
			//$result = $this->db->last_query();
			return $result;
	}

	public function upgrade_user($userid){
		$query = $this->db->query('select * from transactions_upgrade tu inner join user_table ut on ut.id=tu.customer_id INNER join extra_plan ep on ep.pid=tu.subscriber_pack where tu.customer_id='.$userid.' order by tu.id desc');
		$result = $query->result();
			//$result = $this->db->last_query();
			return $result;

	}

	

}

	?>
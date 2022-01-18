<?php
class Live_datamodel extends CI_Model{

		function __construct() 
		{
		    parent::__construct();
		}
	//========================== LOGIN CHECK =========================
	function show_data_id($table,$search=NULL,$show_result=NULL)
	{
        //$condition="email ="."'".$data['email']."' and pass ="."'". base64_encode($data['pass']) ."'";
        $where='';
        if($search['username']!=''){
          
           $where.=' and user_name="'.$search['username'].'"';
           
        }
        if($search['follower_from']!='' && $search['follower_to']!=''){
             $where.=" and follower_count BETWEEN ".$search['follower_from']." and ".$search['follower_to']." ";
        }
       
        if($search['following_from']!='' && $search['following_to']!=''){
              //$where.=" and following_count";
              $where.=" and following_count BETWEEN ".$search['following_from']." and ".$search['following_to']." ";
        }
        if($search['like_from']!='' && $search['like_to']!=''){
             $where.=" and avg_like_post BETWEEN ".$search['like_from']." and ".$search['like_to']." ";
        }
		if($search['comment_from']!='' && $search['comment_to']!=''){
             $where.=" and avg_cmt_post BETWEEN ".$search['comment_from']." and ".$search['comment_to']." ";
        }
        if($search['category']!=''){
            $where.=' and category in ('.$search['category'].')';
        }
        if($search['country']!=''){
             $where.=' and country in ('.$search['country'].')';
        }
        if($search['city']!=''){
             $where.=' and city in ('.$search['city'].')';
        }
        if($search['verified']=='yes'){
             $where.=' and verified="TRUE"';
        }
        if($search['verified']=='no'){
             $where.=' and verified="FALSE"';
        }
         if($search['email']=='yes'){
             $where.=' and email_id!=""';
        }
        if($search['email']=='no'){
             $where.=' and email_id=""';
        }
        if($search['gender']!=''){
             $where.=' and gender="'.$search['gender'].'"';
        }
		if($search['platform']!=''){
             $where.=' and platform="'.$search['platform'].'"';
        }
		if($search['audience_interest']!=''){
             $where.=' and audience_interest="'.$search['audience_interest'].'"';
        }
        
        
        $query =$this->db->query("select * from ".$table." where id!='' ".$where." limit 0,".$show_result." ");
//         $this->db->select('*');
// 		$this->db->from($table);
// 		//$this->db->where($condition);
// 		$this->db->limit(10);
// 		$query =$this->db->get();
		//$result =$this->db->last_query(); 
		$result = $query->result();
        return $result;
		
	 } 
	//===================== LOGIN CHECK ============================== 
	
	function show_data_id_excel($table,$search=NULL)
	{
		if($search!=0){
		 $where=' id in ('.$search.')';
		 $query =$this->db->query("select * from ".$table." where ".$where." ");

		$result = $query->result();
        return $result;
		}
	}
	
	function show_data_id2($table,$search=NULL,$show_result=NULL,$position=NULL)
	{
        //$condition="email ="."'".$data['email']."' and pass ="."'". base64_encode($data['pass']) ."'";
        $where='';
        if($search['username']!=''){
          
           $where.=' and user_name="'.$search['username'].'"';
           
        }
        if($search['follower_from']!='' && $search['follower_to']!=''){
             $where.=" and follower_count BETWEEN ".$search['follower_from']." and ".$search['follower_to']." ";
        }
       
        if($search['following_from']!='' && $search['following_to']!=''){
              //$where.=" and following_count";
              $where.=" and following_count BETWEEN ".$search['following_from']." and ".$search['following_to']." ";
        }
        if($search['like_from']!='' && $search['like_to']!=''){
             $where.=" and avg_like_post BETWEEN ".$search['like_from']." and ".$search['like_to']." ";
        }
		if($search['comment_from']!='' && $search['comment_to']!=''){
             $where.=" and avg_cmt_post BETWEEN ".$search['comment_from']." and ".$search['comment_to']." ";
        }
        if($search['category']!=''){
            $where.=' and category in ('.$search['category'].')';
        }
        if($search['country']!=''){
             $where.=' and country in ('.$search['country'].')';
        }
        if($search['city']!=''){
             $where.=' and city in ('.$search['city'].')';
        }
        if($search['verified']=='yes'){
             $where.=' and verified="TRUE"';
        }
        if($search['verified']=='no'){
             $where.=' and verified="FALSE"';
        }
         if($search['email']=='yes'){
             $where.=' and email_id!=""';
        }
        if($search['email']=='no'){
             $where.=' and email_id=""';
        }
        if($search['gender']!=''){
             $where.=' and gender="'.$search['gender'].'"';
        }
		if($search['platform']!=''){
             $where.=' and platform="'.$search['platform'].'"';
        }
		if($search['audience_interest']!=''){
             $where.=' and audience_interest="'.$search['audience_interest'].'"';
        }
        
        
        $query =$this->db->query("select * from ".$table." where id!='' ".$where." LIMIT ".$position.", 10 ");
//         $this->db->select('*');
// 		$this->db->from($table);
// 		//$this->db->where($condition);
// 		$this->db->limit(10);
// 		$query =$this->db->get();
		$result = $query->result();
		//$ff=$this->db->last_query(); 
        return $result;
		
	 } 
	public function get_data($id)
{
    $this->db->select('* ,u.status as ustatus,u.id as userid');
    $this->db->from('user_table u'); 
    $this->db->join('transactions t', 't.customer_id=u.customer_strip', 'inner');
    $this->db->join('pricing_table p', 'p.pid=u.subscribe_pack', 'inner');
    $this->db->where('u.id',$id);
         
    $query = $this->db->get();
//$ff=$this->db->last_query();	
   if($query->num_rows() != 0)
    {
        return $query->result();
    }
    else
    {
        return false;
    }
}

public function get_data_upgrade($id)
{
    $this->db->select('* ,u.status as ustatus,u.id as userid');
    $this->db->from('user_table u'); 
    $this->db->join('transactions_upgrade t', 't.customer_id=u.id', 'inner');
    $this->db->join('extra_plan p', 'p.pid=t.subscriber_pack', 'inner');
    $this->db->where('u.id',$id);
         
    $query = $this->db->get();
//$ff=$this->db->last_query();	
   if($query->num_rows() != 0)
    {
        return $query->result();
    }
    else
    {
        return false;
    }
}

        public function upgrade_plan_list($userid)
        {
            $query = $this->db->query('select * from transactions_upgrade tu inner join user_table ut on ut.id=tu.customer_id INNER join extra_plan ep on ep.pid=tu.subscriber_pack where tu.customer_id='.$userid.' order by tu.id desc');
        $result = $query->result();
            //$result = $this->db->last_query();
            return $result;
        }

}
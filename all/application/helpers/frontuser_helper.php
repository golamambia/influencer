<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('getCountry')){
   function getCountry(){
       $ci =& get_instance();
      $ci->load->library('session');
      $user=$ci->session->userdata('front_sess')['userid'];
        $ci->load->database();
      
         
    // $ci->db->select('*');
    // $ci->db->from('datatable');
    //$ci->db->where('user_id',$user);
    
    $query = $ci->db->query("select distinct name as country from  country_tbl where name!='' order by name asc");
    $row = $query->result();
    return $row;
     
   }
    
}

if ( ! function_exists('getCity')){
   function getCity(){
       $ci =& get_instance();
      $ci->load->library('session');
      $user=$ci->session->userdata('front_sess')['userid'];
        $ci->load->database();
      
    $query = $ci->db->query("select distinct city from  datatable where city!='' order by city asc");
    $row = $query->result();
    return $row;
    
   }
  }

if ( ! function_exists('getCategory')){
   function getCategory(){
       $ci =& get_instance();
      $ci->load->library('session');
      $user=$ci->session->userdata('front_sess')['userid'];
        $ci->load->database();
      
    $query = $ci->db->query("select distinct category from  datatable where category!='' order by category asc");
    $row = $query->result();
    return $row;
    
   }
  }

if ( ! function_exists('countResult')){
    function countResult($table,$search=NULL){
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
        $ci =& get_instance();
         $ci->load->library('session');
      
        $ci->load->database();
      
       $query = $ci->db->query("select * from ".$table." where id!='' ".$where." ");
    $row = $query->num_rows();
    return $row;

}
    
}
if ( ! function_exists('getUserType')){
   function getUserType($id){
       $ci =& get_instance();
      
  
        $ci->load->database();
      
     
    $query = $ci->db->query("select * from pricing_table  where pid=".$id."  ");
    $row = $query->result();
	$name=$row[0]->ptitle;
    return $name;
     
   }
    
}
if ( ! function_exists('getUserDetails')){
   function getUserDetails($id){
       $ci =& get_instance();
      
  
        $ci->load->database();
      
     $ci->db->select('* ,u.status as ustatus');
    $ci->db->from('user_table u'); 
    $ci->db->join('transactions t', 't.customer_id=u.customer_strip', 'inner');
    $ci->db->join('pricing_table p', 'p.pid=u.subscribe_pack', 'inner');
    $ci->db->where('u.id',$id);
    
	 $query = $ci->db->get();
    $row = $query->result();
	
    return $row;
     
   }
    
}



if ( ! function_exists('getUserAmount')){
   function getUserAmount($id=NULL){
	   if($id!=''){
       $ci =& get_instance();
      
  
        $ci->load->database();
      
     
    $query = $ci->db->query("select * from transactions  where customer_id='".$id."'  ");
    $row = $query->result();
	$name=$row[0]->amount;
    return $name;
     
   }else{
	   return 0; 
   }
    
}
}



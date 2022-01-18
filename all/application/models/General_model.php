<?php 
class General_model extends CI_Model{
	
	function __construct() 
	{
        parent::__construct();
    }   

   public function show_data_id($table_name,$id,$fieldname,$action,$data,$orderby=NULL,$orderbyCol=NULL){
		if($action=='get'){
			if(($id !='') && ($fieldname!='')&& ($data=='')){
				$this->db->select ('*'); 
				$this->db->from($table_name);
				$this->db->where($fieldname,$id);
			}else{
				$this->db->select ('*'); 
				$this->db->from($table_name);
			}
			if($orderby && $orderbyCol){
				$this->db->order_by($orderby, $orderbyCol);
			}
			
			$query = $this->db->get();
			$result = $query->result();
			
			return $result;
		}
	if($action=='insert'){
		$data['entry_date']=date('Y-m-d');
		$value=formData($table_name,$data);
		$return = $this->db->insert($table_name, $value);
		if ((bool) $return === TRUE) {
			return $this->db->insert_id();
		}else {
			return $return;
		}  
		    
	}
	if($action=='update'){
		$value=formData($table_name,$data);
		$this->db->where($fieldname, $id);
		$return=$this->db->update($table_name, $value);
		return $return;
	}
	if($action=='delete'){
		$this->db->where($fieldname, $id);
		$return=$this->db->delete($table_name);
		return $return;
	}
    }
    
public function show_data_id_join($table_name1,$table1_id,$table_name2,$table2_id,$where_fieldname,$where_id){
		
			if(($where_id !='') && ($where_fieldname!='')){
				$this->db->select ('*'); 
				$this->db->from($table_name1);
				$this->db->join($table_name2, $table_name2.'.'.$table2_id.' = '.$table_name1.'.'.$table1_id);
				$this->db->where($where_fieldname,$where_id);
			}else{
				$this->db->select ('*'); 
				$this->db->from($table_name1);
				$this->db->join($table_name2, $table_name2.'.'.$table2_id.' = '.$table_name1.'.'.$table1_id);
			}
			$query = $this->db->get();
			$result = $query->result();
			return $result;
		

    }
   public function getAllData($table_name,$primary_key,$wheredata,$limit,$start)
   {
		if(@$limit!='' || @$start!='')
		{
			$this->db->order_by('id', 'DESC');
			$this->db->limit($limit, $start);
		}
		$this->db->select ('*'); 
		$this->db->from($table_name);
		if($primary_key=='' && $wheredata=='')
		{
			$where='1=1';
		}
		else
		{
			$this->db->where($primary_key,$wheredata);
		}
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	
	}

	public function RowCount($table_name,$fieldname,$value)
	{
		if($fieldname!=''){
			$this->db->where($fieldname,$value);
    	$result = $this->db->get($table_name)->num_rows();
    	return $result;
		}else{
			return $this->db->count_all($table_name);
		}
		
	}

	public function RowCountPaid($table_name)
	{
	
		$this->db->where('subscribe_pack != ',0);
    	$result = $this->db->get($table_name)->num_rows();
    	
		
		// $this->db->where($fieldname,$value);
		//$pa// idQuery = $this->db->query("select * from ".$table_name." where subscribe_pack != 0 ");
//     	$result = $this->db->get()->num_rows();
    	return $result;
		
	}
	
	public function RowCountFree($table_name)
	{
	
		$this->db->where('subscribe_pack = ',0);
    	$result = $this->db->get($table_name)->num_rows();
    	
    	return $result;
		
	}


	public function fetch_products($limit, $start)
	{
		$this->db->limit($limit, $start);
		$query = $this->db->get("product");
		
		if ($query->num_rows() > 0) 
		{
           foreach ($query->result() as $row) 
           {
               $data[] = $row;
           }
           return $data;
        }
           return false;
	}

	function search($name)
	{
		$query = $this->db->query("SELECT * FROM product WHERE product_name LIKE ('$name%')");
	    return $query->result();
	}

	function alldistnict($table_name,$primary_key,$wheredata,$limit,$start)
	{
		if(@$limit!='' || @$start!='')
		{
			$this->db->limit($limit, $start);
		}
		$this->db->distinct();
		$this->db->select ($primary_key); 
		$this->db->from($table_name);
		
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function insertdata($data = array())
	{
		$insert = $this->db->insert_batch('product_multi_image',$data);
		return $insert?TRUE:FALSE;
	}
	
	

}
?>

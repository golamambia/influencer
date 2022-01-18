<?php
ob_start();
class Event extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->database();
        //****************************backtrace prevent*** START HERE*************************
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->library('form_validation');
        $this->load->model('General_model');
        $this->load->helper('url');
        $this->load->helper('string');
        $this->load->helper("file");
        if(!$this->session->userdata('is_logged_in')==1)
        {
            redirect('apanel', 'refresh');
        }

        //Admin Access
        
    }

	public function index()
	{
		$query=$this->General_model->show_data_id('event_master','','','get','');
        
        $data['datatable']=$query;
        $data['title']="User || List";
		$this->load->view('apanel/header',$data);
		$this->load->view('apanel/eventlist');
		$this->load->view('apanel/footer');
	}

	
	

	//========================= Edit Admin =================================
	public function edit($id)
	{
		$query=$this->General_model->show_data_id('event_master',$id,'id','get','');
        $data['result']=$query;
        $data['multiimage']=$this->General_model->show_data_id('event_master_images',$id,'event_id','get','');  

       //print_r($query);
		$data['title']="User || Edit";
        $this->load->view('apanel/header',$data);
        $this->load->view('apanel/eventEdit');
        $this->load->view('apanel/footer');
	}
    public function edit_post($id)
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('event_start_date', 'event', 'required');
        $this->form_validation->set_rules('event_end_date', 'event', 'required');

        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Data  update failed');
          redirect('apanel/event/edit/'.$id); 

        }else{

if(!empty($_FILES['img']['name'])){
$new_name = time().$_FILES["img"]['name'];
            $config = array(
                'upload_path' => "uploads/",
                'upload_url' => base_url() . "uploads/",
                'allowed_types' => "gif|jpg|png|jpeg|mp3",
                'file_name'=>$new_name
            );

            $this->load->library('upload', $config);
            $this->upload->do_upload("img");
            //$datalist['img'] = $this->upload->data();

}else{

$new_name = $this->input->post('image_hid');
}

            $datalist = array( 
                'name'      => $this->input->post('name'),
                'location'      => $this->input->post('location'),
                'description'      => $this->input->post('description'),
                'event_start_date'     => $this->input->post('event_start_date'),
                'event_end_date'   => $this->input->post('event_end_date'),
                'start_time'     => $this->input->post('start_time'),
                'end_time'   => $this->input->post('end_time'),
                'img'   => $new_name,
                 'entry_date'   =>date('Y-m-d')
                //'status'        => $this->input->post('status'),
            );
            
        
        $query= $this->General_model->show_data_id('event_master',$id,'id','update',$datalist);
    $this->session->set_flashdata('message', 'Data successfully updated');

            $filename = $_FILES['upload_img']['name'];
        $file_tmp = $_FILES['upload_img']['tmp_name'];
        $filetype = $_FILES['upload_img']['type'];
        $filesize = $_FILES['upload_img']['size'];


        if($query==true){

        for($i=0; $i<count($file_tmp); $i++){
            
        if(!empty($file_tmp[$i])){

        $_FILES['file']['name']     = $_FILES['upload_img']['name'][$i];
        $_FILES['file']['type']     = $_FILES['upload_img']['type'][$i];
        $_FILES['file']['tmp_name'] = $_FILES['upload_img']['tmp_name'][$i];
        $_FILES['file']['error']     = $_FILES['upload_img']['error'][$i];
        $_FILES['file']['size']     = $_FILES['upload_img']['size'][$i];



        $arr=getimagesize($file_tmp[$i]);
        $userfile_extn = end(explode(".", strtolower($filename[$i])));
        if(($userfile_extn =="jpeg"||$userfile_extn =="jpg" || $userfile_extn =="png" || $userfile_extn =="gif")){
        $tmp_name = $file_tmp[$i];
        $name = time()."_".$filename[$i];
        //move_uploaded_file($tmp_name,"http://localhost/new_ciadmin/uploads/".$name);
        $config = array(
                'upload_path' => "uploads/",
                'upload_url' => base_url() . "uploads/",
                'allowed_types' => "gif|jpg|png|jpeg|mp3",
                'file_name'=>$name
            );

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('file');
        $image_nm = $name;

        $datalist2 = array( 
                        'event_id'      => $id,
                        'image'   => $image_nm,
                        
                    );
        //$db->insertDataArray(DTABLE_EVENT_IMG,$_POST);
        $this->General_model->show_data_id('event_master_images','','','insert',$datalist2);
        }else{

        $msg="Picture's must be .jpeg/.jpg/.png/.gif please check extension";
         $this->session->set_flashdata('error_msg', $msg);
        }
        }
        else{
        $msg="Please select some images...";
        $this->session->set_flashdata('error_msg', $msg);
        }
        }
        }

       redirect('apanel/event/edit/'.$id); 
        }
         
    }

public function create()
    {
        
       
        $data['title']="User || Registration";
        $this->load->view('apanel/header',$data);
        $this->load->view('apanel/eventCreate');
        $this->load->view('apanel/footer');
    }
    public function create_post()
    {

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('event_start_date', 'event', 'required');
        $this->form_validation->set_rules('event_end_date', 'event', 'required');

        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Data  save failed');
           redirect('apanel/event/create'); 

        }else{
           
    $new_name = time().$_FILES["img"]['name'];
            $config = array(
                'upload_path' => "uploads/",
                'upload_url' => base_url() . "uploads/",
                'allowed_types' => "gif|jpg|png|jpeg|mp3",
                'file_name'=>$new_name
            );

            $this->load->library('upload', $config);
            $this->upload->do_upload("img");
            //$datalist['img'] = $this->upload->data();

            $datalist = array( 
                'name'      => $this->input->post('name'),
                'location'      => $this->input->post('location'),
                'description'      => $this->input->post('description'),
                'event_start_date'     => $this->input->post('event_start_date'),
                'event_end_date'   => $this->input->post('event_end_date'),
                'event_start_date'     => $this->input->post('event_start_date'),
                'event_end_date'   => $this->input->post('event_end_date'),
                'img'   => $new_name,
                 'entry_date'   =>date('Y-m-d')
                //'status'        => $this->input->post('status'),
            );
            
        
        $query= $this->General_model->show_data_id('event_master','','','insert',$datalist);
    $this->session->set_flashdata('message', 'Data successfully Saved');
    $filename = $_FILES['upload']['name'];
$file_tmp = $_FILES['upload']['tmp_name'];
$filetype = $_FILES['upload']['type'];
$filesize = $_FILES['upload']['size'];
if(!empty($query)){

for($i=0; $i<count($file_tmp); $i++){

    $_FILES['file']['name']     = $_FILES['upload']['name'][$i];
        $_FILES['file']['type']     = $_FILES['upload']['type'][$i];
        $_FILES['file']['tmp_name'] = $_FILES['upload']['tmp_name'][$i];
        $_FILES['file']['error']     = $_FILES['upload']['error'][$i];
        $_FILES['file']['size']     = $_FILES['upload']['size'][$i];

if(!empty($file_tmp[$i])){
$arr=getimagesize($file_tmp[$i]);
$userfile_extn = end(explode(".", strtolower($filename[$i])));
if(($userfile_extn =="jpeg"||$userfile_extn =="jpg" || $userfile_extn =="png" || $userfile_extn =="gif")){
$tmp_name = $file_tmp[$i];
$name = time()."_".$filename[$i];
//$new_name = time().$_FILES["img"]['name'];
            $config = array(
                'upload_path' => "uploads/",
                'upload_url' => base_url() . "uploads/",
                'allowed_types' => "gif|jpg|png|jpeg|mp3",
                'file_name'=>$name
            );

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('file');
//move_uploaded_file($tmp_name, base_url() . "uploads/".$name);
$image_nm = $name;

$datalist2 = array( 
                'event_id'      => $query,
                'image'   => $image_nm,
                
            );
//$db->insertDataArray(DTABLE_EVENT_IMG,$_POST);
$this->General_model->show_data_id('event_master_images','','','insert',$datalist2);
}else{

$msg="Picture's must be .jpeg/.jpg/.png/.gif please check extension";
 $this->session->set_flashdata('error_msg', $msg);
}
}
else{
$msg="Please select some images...";
$this->session->set_flashdata('error_msg', $msg);
}
}
}
       redirect('apanel/event/create'); 
       
        } 
    }
	//========================= End Edit Admin =================================

	public function get_useremail(){
        //echo $email;
        $email=$this->input->post('email');
       echo $query= $this->General_model->RowCount('user_table','email',$email);
    }

	//========================= Delete Admin =================================
    public function delete($id)
     { 
	    $query=$this->General_model->show_data_id('event_master',$id,'id','delete','');

	    if ($query) 
	    {   
		    //$data1['admin_image']=base_url().'uploads/admin/'.$query[0]->admin_image;
		    //@unlink(str_replace(base_url(),'',$query[0]->admin_image));
            $this->session->set_flashdata('message', 'Data successfully Deleted');
	    }else{
            $this->session->set_flashdata('error', 'Data delete failed');
        }

        redirect('apanel/event');
	
	 }
    //=========================End Delete Admin ================================= 



     //========================= Insert Admin =================================

    public function get_multiimage()
    {
        $event_id=$_POST['val2'];
         $id=$_POST['val'];
        $img=$this->General_model->show_data_id('event_master_images',$id,'id','get','');  
       $path=base_url()."uploads/".$img[0]->image;
        $query=$this->General_model->show_data_id('event_master_images',$id,'id','delete','');
       
       
    if ($query) 
        {   
            if (file_exists($path)){
         unlink("uploads/".$img[0]->image);
     }
        $data['multiimage']=$this->General_model->show_data_id('event_master_images',$event_id,'event_id','get','');  
        echo $tt= $this->load->view('apanel/get_multiimage',$data,true);
    }
        
    
    //========================= End Insert Admin =================================
}

//=====================================event category============================//
public function category()
    {
         $data['datatable']=$this->General_model->show_data_id('event_category','','','get','');
       
        $data['title']="Event || Category";
        $this->load->view('apanel/header',$data);
        $this->load->view('apanel/event_category');
        $this->load->view('apanel/footer');
    }

        public function subcategory()
    {
         $data['datatable']=$this->General_model->show_data_id_join('event_subcategory','categoryid','event_category','id','','');
       $data['category']=$this->General_model->show_data_id('event_category','','','get','');
       
        $data['title']="Event || Sub-category";
        $this->load->view('apanel/header',$data);
        $this->load->view('apanel/event_subcategory');
        $this->load->view('apanel/footer');
    }

public function category_post()
    {

        $this->form_validation->set_rules('name', 'Name', 'required');
       
        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Data  save failed');
           redirect('apanel/event/create'); 
            
        }else{
            $_POST['entry_date']=date('Y-m-d');
        $query= $this->General_model->show_data_id('event_category','','','insert',$_POST);
    $this->session->set_flashdata('message', 'Data successfully Saved');
    
    redirect('apanel/event/category'); 
       
        } 
    }
    public function sub_catpost()
    {

        $this->form_validation->set_rules('subname', 'Name', 'required');
       $this->form_validation->set_rules('categoryid', 'categoryid', 'required');
        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Data  save failed');
           redirect('apanel/event/subcategory'); 
            //echo 0;
        }else{
            $_POST['entry_date']=date('Y-m-d');
        $query= $this->General_model->show_data_id('event_subcategory','','','insert',$_POST);
    $this->session->set_flashdata('message', 'Data successfully Saved');
    
    redirect('apanel/event/subcategory'); 
       //echo 1;
        } 
    }
    public function category_edit($id)
    {
   

        $this->form_validation->set_rules('name', 'Name', 'required');
       
        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Data  update failed');
           redirect('apanel/event/category'); 
           
        }else{
            //$id=$this->input->post('id');
            $datalist = array( 
                'name'      => $this->input->post('name')
                
                
            );
        $query= $this->General_model->show_data_id('event_category',$id,'id','update',$datalist);
    $this->session->set_flashdata('message', 'Data successfully Updated');
    
    redirect('apanel/event/category'); 
       
        } 
    }

    public function subcategory_edit($id)
    {
   //$data['category']=$this->General_model->show_data_id('event_category','','','get','');


        $this->form_validation->set_rules('subname', 'Name', 'required');
        $this->form_validation->set_rules('categoryid', 'category', 'required');
        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Data  update failed');
           redirect('apanel/event/subcategory'); 
           
        }else{
            
            $datalist = array( 
                'subname'      => $this->input->post('subname'),
                 'categoryid'  => $this->input->post('categoryid')
                
                
            );
            //print_r($datalist);
            //exit();
        $query= $this->General_model->show_data_id('event_subcategory',$id,'sid','update',$datalist);
    $this->session->set_flashdata('message', 'Data successfully Updated');
    
    redirect('apanel/event/subcategory'); 
       
        } 
    }

     public function cat_delete($id)
     { 
        $query=$this->General_model->show_data_id('event_category',$id,'id','delete','');

        if ($query) 
        {   
            //$data1['admin_image']=base_url().'uploads/admin/'.$query[0]->admin_image;
            //@unlink(str_replace(base_url(),'',$query[0]->admin_image));
            $this->session->set_flashdata('message', 'Data successfully Deleted');
        }else{
            $this->session->set_flashdata('error', 'Data delete failed');
        }

        redirect('apanel/event/category');
    
     }
public function subcat_delete($id)
     { 
        $query=$this->General_model->show_data_id('event_subcategory',$id,'sid','delete','');

        if ($query) 
        {   
            //$data1['admin_image']=base_url().'uploads/admin/'.$query[0]->admin_image;
            //@unlink(str_replace(base_url(),'',$query[0]->admin_image));
            $this->session->set_flashdata('message', 'Data successfully Deleted');
        }else{
            $this->session->set_flashdata('error', 'Data delete failed');
        }

        redirect('apanel/event/subcategory');
    
     }

}

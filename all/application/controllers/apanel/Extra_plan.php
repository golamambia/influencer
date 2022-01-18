<?php
ob_start();
class Extra_plan extends CI_Controller {

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
		$this->create();
	}

	
//=====================================event category============================//
public function create()
    {
         $data['datatable']=$this->General_model->show_data_id('extra_plan','','','get','');
       
        $data['title']="Extra || Plan";
        $this->load->view('apanel/header',$data);
        $this->load->view('apanel/plan_price');
        $this->load->view('apanel/footer');
    }

       
public function create_post()
    {

        $this->form_validation->set_rules('ptitle', 'title', 'required');
        $this->form_validation->set_rules('pamount', 'amount', 'required');
        $this->form_validation->set_rules('pexport', 'export', 'required');
        $this->form_validation->set_rules('psearch', 'search', 'required');
       
        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Data  save failed');
           redirect('apanel/extra_plan/'); 
            
        }else{
            $_POST['entry_date']=date('Y-m-d');
        $query= $this->General_model->show_data_id('extra_plan','','','insert',$this->input->post());
    $this->session->set_flashdata('message', 'Data successfully Saved');
    
    redirect('apanel/extra_plan/'); 
       
        } 
    }
   
    public function pricing_edit($id)
    {
   

        $this->form_validation->set_rules('ptitle', 'title', 'required');
        $this->form_validation->set_rules('pamount', 'amount', 'required');
        $this->form_validation->set_rules('pexport', 'export', 'required');
        $this->form_validation->set_rules('psearch', 'search', 'required');
       
        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Data  update failed');
           redirect('apanel/extra_plan/'); 
           
        }else{
            //$id=$this->input->post('id');
            $datalist = array( 
                'name'      => $this->input->post('name')
                
                
            );
        $query= $this->General_model->show_data_id('extra_plan',$id,'pid','update',$this->input->post());
    $this->session->set_flashdata('message', 'Data successfully Updated');
    
    redirect('apanel/extra_plan/'); 
       
        } 
    }

    
     public function delete($id)
     { 
        $query=$this->General_model->show_data_id('extra_plan',$id,'pid','delete','');

        if ($query) 
        {   
            //$data1['admin_image']=base_url().'uploads/admin/'.$query[0]->admin_image;
            //@unlink(str_replace(base_url(),'',$query[0]->admin_image));
            $this->session->set_flashdata('message', 'Data successfully Deleted');
        }else{
            $this->session->set_flashdata('error', 'Data delete failed');
        }

        redirect('apanel/extra_plan/');
    
     }

}

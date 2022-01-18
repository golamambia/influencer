<?php
ob_start();
class Pricing extends CI_Controller {
    
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
        $this->load->library('session');
        $this->load->helper('url');
        // if(!$this->session->userdata('is_logged_in')==1)
        // {
        //     redirect('apanel', 'refresh');
        // }
      
    }

	public function index()
	{   
        $data['datatable']=$this->General_model->show_data_id('pricing_table','','','get','');
		$data['title']="Influencer";
		$this->load->view('header',$data);
		$this->load->view('pricing_table');
		$this->load->view('footer');
	}
   



}


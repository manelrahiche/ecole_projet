<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Guest extends CI_Controller
{
    
    
	function __construct()
	{
		parent::__construct();
		$this->load->database();
        $this->load->library('session');
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    
    /***default functin, redirects to login page if no admin logged in yet***/
    public function index()
    {
        redirect(base_url() . 'index.php?guest/guest_view', 'refresh');
    }
    function parent()
    {
       
            $data['name']        			= $this->input->post('name');
            $data['email']       			= $this->input->post('email');
            $mot_de_passe = $this->input->post('password');
            $mot_de_passe_hache = hash('sha256', $mot_de_passe); 
            $data['password']    			=  $mot_de_passe_hache;
            $data['phone']       			= $this->input->post('phone');
            $data['address']     			= $this->input->post('address');
            $data['profession']  			= $this->input->post('profession');


            $this->db->where('email', $data['email']);
            $query = $this->db->get('parent');
        
            if ($query->num_rows() > 0) {
             $this->session->set_flashdata('error_message' ,'Parent existes déja');
             redirect(base_url() . 'index.php?login/add_parent', 'refresh');
          } else {
            
            $this->db->insert('parent', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            $this->email_model->account_opening_email('parent', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
            redirect(base_url() . 'index.php?login/', 'refresh');
          }
      
      //  $page_data['page_title'] 	= 'Parents';
        //$page_data['page_name']  = 'parent';
        //$this->load->view('backend/index', $page_data);
    }
}
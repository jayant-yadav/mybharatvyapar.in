<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->home();
	}
	
	public function home()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['title']='login';
		$data['page-header']='form helpers in ci';
		$this->form_validation->set_rules('email','E-mail','required|valid_email');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run()==false)
		{
		echo validation_errors();
		$this->load->view('form.php',$data);
		}
		else
		{
			$data['email']=$this->input->post('email');
			$data['password']=$this->input->post('password');
			$data['url']=$this->input->post('url');
			$this->load->view('view_form_helper',$data);
		}
		
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
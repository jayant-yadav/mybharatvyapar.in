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
/*	public function index()
	{
		$this->load->view('welcome_message');
	}*/
    
    public function index()
	{	//$this->load->view('register_user',$data);
        $this->load->helper("form");
        $this->load->helper("url");
        $this->load->library("form_validation");
        $this->load->view('index.html');
//		$this->register_user();
      
	}
    
    public function prereg()
    {
          $emailid = $_POST["email"];
        $phoneno = $_POST["tel"];
        $data = array("emailid" => $emailid,
                      "phoneno" => $phoneno);
        //print_r($_POST);
//            echo 'sdf'.$emailid;
        $this->load->model("model_user");
        $this->model_user->preData($data);
        $this->load->view("signup.html");
    }
	
	public function register_user()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fname','First Name','required|min_length[3]|max_length[45]|xss_clean');
		$this->form_validation->set_rules('lname','Last Name','required|min_length[3]|max_length[45]|xss_clean');
		$this->form_validation->set_rules('email','E-mail','required|valid_email|xss_clean|is_unique[users.emailid]');
		$this->form_validation->set_rules('password','Password','required|xss_clean|');
		$this->form_validation->set_rules('phno','phone-no','required|min_length[10]|xss_clean');
		$this->form_validation->set_rules('gender','Gender','required');	
		$this->form_validation->set_rules('vendor','Vendor','required');
		if($this->form_validation->run()==false)
		{
			echo validation_errors();
			$this->load->view('register_user');
		}
		else
		{
			$this->load->model('model_user');
			$this->model_user->enterData();
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

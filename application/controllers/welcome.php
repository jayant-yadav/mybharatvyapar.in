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
    
    //public $comment_id;
    
    public function index()
	{	//$this->load->view('register_user',$data);
        $this->load->helper("form");
        $this->load->helper("url");
        $this->load->library("form_validation");
        
        
        $this->load->library('session');
        $data['logged_in']=$this->session->userdata('logged_in');
        
        $this->load->view('index',$data);
//		$this->register_user();
      
	}
    
    
    
    public function prereg()
    {
          /*$emailid = $_POST["email"];
        $phoneno = $_POST["tel"];
        $data = array("emailid" => $emailid,
                      "phoneno" => $phoneno);*/
        //print_r($_POST);
//            echo 'sdf'.$emailid;
        /*$this->load->model("model_user");
        $this->model_user->preData($data);*/
        $this->load->view("signup.html");
    }
    
    public function search()
    {
        //$query=$_POST["search"];
       /* if(isset($_POST["search"]))
        {
            $query=$_POST["search"];
            $this->load->model("model_user");
            $this->model_user->search($query);
        }*/
        
            $this->load->model("model_user");
            $this->model_user->search($_POST["query"]);
      
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
			$this->load->view('signup.html');
		}
		else
		{
			$this->load->model('model_user');
			$this->model_user->enterData();
		}
	}
    
    public function login()
    {
        $this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');
        
        
        $this->form_validation->set_rules('loginemail','E-mail','required|valid_email|xss_clean');
		$this->form_validation->set_rules('loginpassword','Password','required|xss_clean');

		if($this->form_validation->run()==false)
		{
		echo validation_errors();
            $data['logged_in']=0;
		$this->load->view('index',$data);
		}
		else
		{
			$this->load->model('model_user');
			$result=$this->model_user->verifyLogin();
			if($result==0)
			{    
                $data['logged_in']=0;
				echo 'wrong userid/password';
				$this->load->view('index',$data);
			}
			else
			{    
				$this->load->helper('html');
                //echo 'loggedin';
				//echo heading('Welcome!',2);
				//$row=$query->row();
				//echo $row->emailid;
                $data['logged_in']=1;
				$this->load->view('index',$data); //// TODO change login to logout!!!!!!!
                
               
			}
			
			
		}
		

    }
    
    public function logout()
    {
        $data['logged_in']=0;
        $this->load->library('session');
        $this->session->sess_destroy();
        //$this->index();
        $this->load->view('index',$data);
        //$this->load->view("index");
    }
    
    public function user()
    {
        $this->load->view("index"); 
        
    }
    
    
    public function map()
    {
        $this->load->view("placesearch.php");
    }
    
    public function subscribe()
    {
        $this->load->view("subscribe");
    }
    
    
    public function shop_profile()
    {
        $data['shopid'] = $_POST["shopid"];
        $this->load->model('model_user');
        $var=$this->model_user->getdata($data['shopid']);
//        print_r($var);
    //    print_r ($var[0]);
        $data=$var[0];
        $this->load->view("shop_profile",$data);
        
    }
    
    public function addtofav()
    {
        $id= $this->input->post('fav');
        //echo $id;
        $this->load->library('session');
        if($this->session->userdata('logged_in'))
        {
            //call model
            $this->load->model('model_user');
            $this->model_user->addtofav($id);
        }
        else 
        {
            //plz log in
            echo "please log in";
        }
    }
    
    public function comments()
    {
        $this->load->library('session');
            $data['emailid']=$this->session->userdata('emailid');
        
        $id=$this->input->post('com'); 
        //$this->comment_id=$id;
        $this->db->empty_table('c_table');
        $q = "INSERT INTO c_table (id) VALUES ('$id')";
        $r = mysql_query($q);
    
            $this->load->view("comments",$data);
        //$this->load->view("comments");
    }
    
    
    public function post_comment()
    {
        $q='select * from c_table';
        $r=mysql_query($q);
        //if(mysql_num_rows($r)==1)
            $row=mysql_fetch_assoc($r);
            $id=$row['id'];
        
        $comment_body = mysql_real_escape_string($_POST['comment_body']);
        $parent_id = mysql_real_escape_string($_POST['parent_id']);
        $this->load->library('session');
        $author=$this->session->userdata('emailid');
        $q = "INSERT INTO threaded_comments (author, comment, parent_id, shop_id) VALUES ('$author', '$comment_body', '$parent_id', '$id')";
        $r = mysql_query($q);
        if(mysql_affected_rows()==1) {
            
             $this->load->library('session');
            $data['emailid']=$this->session->userdata('emailid');
            $this->load->view("comments",$data);
        }
        else {
            echo "Comment cannot be posted. Please try again.";
        }
        
    }
    
    
    public function following()
    {
        
    }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
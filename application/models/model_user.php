<?php
class Model_user extends CI_Model{

function _construct()
{
	parent::_construct();
}
    function preData($data)
    {
//        $this->load->helper('form');
        $this->load->database();
        $this->db->insert("users",$data);

    }
    
    function search($query)
    {
          //echo "sdfsdfdsf";
        if(isset($_POST["query"]))
        {   
             $this->load->database();
            //$this->db->distinct();
        $found=$this->db->get_where("shops",array("shop_name =" =>$_POST['query'], "city ="=> "Noida"))->result();
            //echo $found;
            //$out=array_unique($found);
        if(empty($found)){
                //if user is not present we are printing no
                //echo "No";
            //$this->db->distinct();
                    $found1=$this->db->get_where("shops",array("type =" =>$_POST['query'], "city ="=> "Noida"))->result();
           /* foreach ($found as $row)
{
   echo "yes!!";
   echo $row->name;
   echo $row->body;
}*/
            //$out=array_unique($found);
            if(empty($found1)){
                        echo "0";        

                }
                else{
                    //if present then we are doing this
//                    echo $found1;
                    echo json_encode($found1);   
                }
            }
            else{
                //if present then we are doing this
               // echo $found;
                echo json_encode($found);   
//                foreach($found as $row)
//                {
//                    
//                }
            }
        }
        else echo "not set";
//        print_r($found);
    }

function enterData()
{	
	$this->load->helper('form');
	$this->load->database();
	
	$fname=$this->input->post('fname');
	
	$lname=$this->input->post('lname');
	$gender=$this->input->post('gender');
	$emailid=$this->input->post('email');	
	$password=$this->input->post('password');
	$password=md5($password);
	$phno=$this->input->post('phno');
	$vendor=$this->input->post('vendor');
    echo $vendor;
	$dob=$this->input->post('dob');
    echo $dob;
	
	$sql="INSERT INTO users(emailid,fname,lname,gender,password,phoneno,vendor) VALUES (".$this->db->escape($emailid).",".$this->db->escape($fname).",".$this->db->escape($lname).",
	".$this->db->escape($gender).",".$this->db->escape($password).",".$this->db->escape($phno).",".$this->db->escape($vendor).")";
	
	$result=$this->db->query($sql);
	
}
    
    function getdata($data)
    {
        $this->load->database();
        $found1=$this->db->get_where("shops",array("id =" =>$data))->result();
        //print_r($found1);
        return $found1;
    }
    
    
public function verifyLogin()
{
    
    $this->load->helper('form');
	$this->load->database();
	$emailid=$this->input->post('loginemail');	
	$password=$this->input->post('loginpassword');
	$password=md5($password);
	
	$sql="SELECT emailid,fname,lname from users WHERE emailid='{$emailid}' AND password='{$password}'";
	
	$query=$this->db->query($sql);
	if($query->num_rows()==1)
	{
		$row=$query->row();
		$session_data=array(
				'emailid'=>$row->emailid,
				'fname'=>$row->fname,
				'lname'=>$row->lname);
		$this->set_session($session_data);
		return 1;
	}
	else
	return 0;
    
}
    

    
public function set_session($session_data)
{
    $this->load->library('session');
	$sess_data=array( 
			'emailid'=>$session_data['emailid'],
			'fname'=>$session_data['fname'],
			'lname'=>$session_data['lname'],
			'logged_in'=>1);
			
	$this->session->set_userdata($sess_data);		
}
    
    
    public function addtofav($id)
    {
         $this->load->library('session');
        $emailid=$this->session->userdata('emailid');
         $this->load->database();
        $data['user_id']=$emailid;
        $data['shop_id']=$id;
        $this->db->insert("favourites",$data);
        
    }
    
    
    
   /* function vendor(){
        $this->load->database
    }*/
}
?>
<?php
class Model_user extends CI_Model{

function _construct()
{
	parent::_construct();
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
	
	$sql="INSERT INTO users(emailid,fname,lname,gender,password,phoneno) VALUES (".$this->db->escape($emailid).",".$this->db->escape($fname).",".$this->db->escape($lname).",
	".$this->db->escape($gender).",".$this->db->escape($password).",".$this->db->escape($phno).")";
	
	$result=$this->db->query($sql);
	
}
}
?>
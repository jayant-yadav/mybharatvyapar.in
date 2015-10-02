<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 *
 *
 * Login
 *
 *
 * @package		AEFI
 * @subpackage          controllers
 * @author  jayant yadav
 *
 *
 *
 */

class User extends CI_Controller {
    
    function index(){
        
    }
    
    function login_view()
        {
        $this->load->view('login');
    }

    //this is where we are hitting for login credential which is checking if the user exits into our database
    function do_login()
        {
        if(isset($_POST['username']))
            {
            //fetching user from databse
            $users=$this->db->get_where("users",array("username ="=>$_POST['username'],"password ="=>$_POST['password']))->result();
            //checking weather the result contains any user or not
            if(empty($users)){
                //if user is not present we are printing no
                echo "No";
            }
            else{
                //if present then we are doing this
                echo "loggedIn";
            }
        }
    }
    
}
?>

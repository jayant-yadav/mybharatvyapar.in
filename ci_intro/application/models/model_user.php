<?php

class Model_user extends CI_Model{
	function _construct()
	{
		parent::_construct();
	}
	function getFoodNames()
	{
		$query = $this->db->query('SELECT food from food');
		if($query->num_rows()>0)
		return $query->result();
		else
		return NULL;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<?php
$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
if(isset($email)&&isset($password)){
	echo validation_errors();
	echo 'form valid';
}
else
{
	echo validation_errors();
	$this->load->view('form');
}

?>



</body>
</html>
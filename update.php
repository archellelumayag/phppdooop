<?php
include 'code.php';

if(isset($_POST['update_button']))
{
	$data['edit_id'] = $_POST['update_id'];
	$data['edit_name'] = $_POST['update_name'];
	$data['edit_email'] = $_POST['update_email'];
	$data['edit_phone'] = $_POST['update_phone'];
	$data['edit_course'] = $_POST['update_course'];


	$code = new Code();
		
	$update = $code->updateStudents($data);		
	
}

?>
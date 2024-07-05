<?php

require 'code.php';
	//gikuha ang if nga gi para sa delete sa home.php
	$delete_id = $_POST['studentdelete_id'];
	
	$code = new Code();
	
	$delete = $code->deleteStudents($delete_id);
	//use echo if ang i return kay html. tapos use echo json encode if ang i return kay mga array mga div, object.
	echo $delete;

?>
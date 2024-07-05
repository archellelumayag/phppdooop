<?php

require_once 'code.php';

$update_id = $_POST['studentupdate_id'];

$code = new Code();

$student = $code->editStudents($update_id);

if(!empty($student))
{
?>

	<form id="edit_form" method="post" class="form-horizontal">
					
		<div class="form-group">
			<label class="col-sm-3 control-label">Name</label>
			<div class="col-sm-6">
			<input type="text" class="form-control" id="edit_name" value="<?php echo $student['name']; ?>" placeholder="Enter name" />
			</div>
		</div>
				
		<div class="form-group">
			<label class="col-sm-3 control-label">Email</label>
			<div class="col-sm-6">
			<input type="text" class="form-control" id="edit_email" value="<?php echo $student['email']; ?> " placeholder="Enter email" />
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label">Phone</label>
			<div class="col-sm-6">
			<input type="text" class="form-control" id="edit_phone" value="<?php echo $student['phone']; ?>" placeholder="Enter phone" />
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label">Course</label>
			<div class="col-sm-6">
			<input type="text" class="form-control" id="edit_course" value="<?php echo $student['course']; ?>" placeholder="Enter course" />
			</div>
		</div>
		
		<input type="hidden" id="edit_id" value="<?php echo $student['id']; ?>">
				
	</form>
	
<?php
}

?>
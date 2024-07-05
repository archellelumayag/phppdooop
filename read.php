<?php

include 'code.php';
?>

<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Course</th>
			<th>Action</th>
		</tr>  							
	</thead>
	<tbody>
<?php

	$testObj = new Code();
	$rows = $testObj->viewStudents();
										
	if(!empty($rows)){

		foreach($rows as $student){
		
			?>
			<tr>
				<td><?php echo $student['id']; ?></td>
				<td><?php echo $student['name']; ?></td>
				<td><?php echo $student['email']; ?></td>
				<td><?php echo $student['phone']; ?></td>
				<td><?php echo $student['course']; ?></td>
				<td>                                              	

				<a id="edit" value="<?php echo $student['id']; ?>" class="btn btn-primary" data-bs-toggle = "modal" data-bs-target = "#updateModal">Edit</a>

				<a id="delete" value="<?php echo $student['id']; ?>" class="btn btn-danger">Delete</a>
</td>
			</tr>
			<?php
		}
	}
			?>
	</tbody>
</table>

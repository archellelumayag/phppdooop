<?php

// session_start();
include 'code.php';

// if(isset($_SESSION["email"])){  

// } else {  
//       header("location:index.php");  
//     }  
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="styles/style.css">


	<title></title>
</head>
<body>

<div id="message-insert" class="success-message position-absolute">
	<div class=" d-flex justify-content-between">
		<label for="">Student Added Successfully</label>
		<button type="button" id="close-insert-btn" class="btn-close"></button>
	</div>
</div>

<div class="wrapper">
	<div class="container">
		<div class="col-lg-12">
			<div class="text-center display-6"> Student Information System</div>
			<button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
				Add Student
			</button>
            <a href="logout.php" class="btn btn-danger float-end mb-2" name="logout">Logout</a>
        </div>
	</div>
</div>
	<div class="modal fade" id="updateModal">
	 	<div class="modal-dialog">
			<div class="modal-content">
		 	<div class="modal-header">
				<h4 class="modal-title">Update student record</h4>
		 	</div>
			<div class="modal-body">
				<div id="update_data"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
			</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form id="insert_form" method="post" class="form-horizontal w-100">	
					<div class="modal-body">			
						<input type="text" class="form-control w-100 mb-3" id="txt_name" placeholder="Enter name" required />
						<input type="email" class="form-control w-100 mb-3" id="txt_email" placeholder="Enter email" required/>
						<input type="password" class="form-control w-100 mb-3" id="txt_password" placeholder="Enter password" required />
						<input type="text" class="form-control w-100 mb-3" id="txt_phone" placeholder="Enter phone" required />
						<input type="text" class="form-control w-100 mb-3" id="txt_course" placeholder="Enter course" required />			
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
						<button type="submit" id="btn_create" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="wrapper">
	<div class="container">
		<div class="col-lg-12">
			
			<div class="col-lg-12">
				<div id="message" class="col-lg-4"></div>
				<div id="fetch"></div>
			</div>
			
		</div>
	</div>	
	</div>

	<script>

		$(document).ready(function(){
			$("#message-insert").hide();
			console.log('asdasdasd')

			$(document).on('submit','#insert_form',function(e){
				
				e.preventDefault();
				
				var name = $('#txt_name').val();
				var email = $('#txt_email').val();
				var password = $('#txt_password').val();
				var phone = $('#txt_phone').val();
				var course = $('#txt_course').val();
				var create = $('#btn_create').val();
				
				$.ajax({
					url: 'create.php',
					type: 'post',
					data: 
						{
							studentName:name, 
							studentEmail:email, 
							studentPassword:password,
							studentPhone:phone,
							studentCourse:course,
							insertbutton:create
						},
					success: function(response){
						fetch();
						$('#message').html(response);
						console.log('sdfsdf');
						console.log('display');
						$("#message-insert").show();

						$("#close-insert-btn").click(function(){
							$("#message-insert").hide();
						})
					},
				});
				
				$('#insert_form')[0].reset();
			});

			function fetch(){
				
				$.ajax({
					url: 'read.php',
					type: 'post',
					success: function(response){
						$('#fetch').html(response);
					}
				});
			}

			fetch();

			$(document).on('click','#delete', function(e){
						
				e.preventDefault();
					
					var delete_id = $(this).attr('value');
					$.ajax({
						url: 'delete.php',
						type: 'post',
						data:{
							studentdelete_id : delete_id
						},
						
						dataType: 'html',

						success: function(response){
							                 
						},

					});  

					$(this).parent().parent().remove();
			});

			$(document).on('click','#edit', function(e){
				
				e.preventDefault();
				
				var update_id = $(this).attr('value');
				$.ajax({
					url: 'edit.php',
					type: 'post',
					data: {
							studentupdate_id:update_id
					},

					success: function(response){

						$('#update_data').html(response);
					}
				});
			});

			$(document).on('click','#add-student', function(e){
				
				e.preventDefault();
				console.log('clicked');
				
				// var update_id = $(this).attr('value');
				// alert(update_id);
				$.ajax({
					url: 'add.php',
					type: 'post',
					data: {
							// studentupdate_id:update_id
					},

					success: function(response){

						$('#add_data').html(response);
					}
				});
			});

			$(document).on('click','#btn_update',function(e){
				
				e.preventDefault();
				
				var name = $('#edit_name').val();
				var email = $('#edit_email').val();
				var phone = $('#edit_phone').val();
				var course = $('#edit_course').val();
				var edit_id = $('#edit_id').val();
				var update_btn = $('#btn_update').val();
				
				$.ajax({
					url: 'update.php',
					type: 'post',
					data: 
						{
						update_name:name, 
						update_email:email,
						update_phone:phone,
						update_course:course, 

						update_id:edit_id,
						update_button:update_btn
						},
					success: function(response){
						fetch();
						$('#message').html(response);
					}
				});
				
			});
		})

		

	</script>

</body>
</html>
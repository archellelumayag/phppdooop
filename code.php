<?php

class db{

	private $host = "localhost";
	private $user = "root";
	private $pwd = "";
	private $dbName = "blog";
	
	protected function connect(){

		$dsn  = 'mysql:host='. $this->host . ';dbname=' . $this->dbName; 

		$pdo = new PDO($dsn, $this->user, $this->pwd);
    	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    	return $pdo;
	}
}

class Code extends db 
{

	public function addStudents()
		{	

			$salt = random_bytes(8);
    		$salt = bin2hex($salt);
			$name = $_POST['studentName'];
			$email = $_POST['studentEmail'];
			$password = $_POST['studentPassword'];
			$hashed = hash_pbkdf2("sha512", $password, $salt, 1000);
			$hashed = password_hash($hashed, PASSWORD_DEFAULT);
			$phone = $_POST['studentPhone'];
			$course = $_POST['studentCourse'];
						
			$insert_stmt = $this->connect()->prepare('INSERT INTO students (name, email, password, salt, phone, course) 
				VALUES(:name, :email, :password, :salt, :phone, :course)');
			
			$insert_stmt->bindParam(':name',$name);
			$insert_stmt->bindParam(':email',$email);
			$insert_stmt->bindParam(':password',$hashed);
			$insert_stmt->bindParam(':salt',$salt);
			$insert_stmt->bindParam(':phone',$phone);
			$insert_stmt->bindParam(':course',$course);
						
			if($insert_stmt->execute()) {

				// echo `<script>console.log('test')</script>`;
				// echo '
				// 	<div class="alert alert-success d-flex justify-content-between position-absolute">
				// 		Student inserted successfully
				// 		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				// 	</div>';
			} else {

				echo '
					<div class="alert alert-danger">
						Failed to add student
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>';
			}		
	}

	public function viewStudents()
	{
		$sql = "SELECT * FROM students";
		$stmt = $this->connect()->query($sql);
		$stmt->execute();
		$data = $stmt->fetchAll();

		return $data;
	}

	public function deleteStudents($delete_id)
	{
		$delete_stmt = $this->connect()->prepare('DELETE FROM students WHERE id = :id');
		$delete_stmt->bindParam(':id',$delete_id);
         
        if ($delete_stmt->execute()) 
        {
            return '
            	<div class="alert alert-success">
             		Student deleted successfully
                 	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';

        } else {

            return '
            	<div class="alert alert-danger">
            		Failed to delete student
                	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>' ;
        }

    }
    
    public function editStudents($update_id){

    	$data = null;

			$edit_stmt = $this->connect()->prepare('SELECT * FROM students WHERE id = :id');
			$edit_stmt->bindParam(':id',$update_id);
			
			$edit_stmt->execute();
			
			$data = $edit_stmt->fetch(); 
			
			return $data; 		
    }

    public function updateStudents($data)
		{
			$update_stmt = $this->connect()->prepare(
				'UPDATE students SET name=:name, email=:email, phone=:phone, course=:course WHERE id=:id LIMIT 1');
			$update_stmt->bindParam(':id',$data['edit_id']);
			$update_stmt->bindParam(':name',$data['edit_name']);
			$update_stmt->bindParam(':email',$data['edit_email']);
			$update_stmt->bindParam(':phone',$data['edit_phone']);
			$update_stmt->bindParam(':course',$data['edit_course']);
			
						
			if($update_stmt->execute())
			{
				echo '	
					<div class="alert alert-success d-flex justify-content-between">
						Student updated successfully
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>  
					<script> $("#updateModal").modal("hide"); </script> ';					  
			}
			else
			{
				echo '
					<div class="alert alert-danger">
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						<strong> fail to update data </strong>
					</div>' ;
			}
		}

}

?>
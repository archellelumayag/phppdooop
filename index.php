<?php
 session_start();
//if the the credentials are correct the user will be sent to home.php page
if (isset($_SESSION['email'])) {
	header('Location: home.php');
}
  ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="styles/style.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<style> @import url('https://fonts.googleapis.com/css2?family=Anton&family=Kanit:wght@300&family=Lobster&family=Montserrat:wght@400;700&family=Secular+One&display=swap'); </style>
	 
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js "></script>

</head>
<body>
	
	<div class="container-fluid ">
		<div class="login-container d-flex justify-content-center align-items-center">
			<form method="POST">			
				<div class="form row">	
					<div class="left col-sm-3 d-flex justify-content-center align-items-center">		
						<div class="w-100">
							<h2 class="text-center mb-4">Welcome back</h2>
							<input class="textfield form-control w-100 mb-3" id="email" type="text" name="email" placeholder="Email" required>
							<input class="textfield form-control w-100 mb-3" id="password" type="password" name="password" placeholder="Password">
							<button class="loginbtn w-100 btn btn-primary mb-3" type="submit" id="btnsubmit" name="login" >Login</button>		
						</div>		
					</div>
					<div class="right col-sm-3 d-none d-xl-block">
						<img class="imagebg" src="images\mulogo.png">
					</div>
				</div>
			</form>
		</div>
	</div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
<script type="text/javascript" src="js/script.js"></script>
</html>

<?php

 $host = "localhost";  
 $username = "root";  
 $password = "";  
 $database = "blog";  
 $message = "";  

 try  
 {  	
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      
      if(isset($_POST["login"])){  
           if(empty($_POST["email"]) || empty($_POST["password"])){  
                $message = '<label>All fields are required</label>';  

           }else{  
	                $query = "SELECT * FROM students WHERE email = :email";  
	                $statement = $connect->prepare($query);           
	                $statement->execute(array('email' => $_POST["email"]));  

					$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	
					$count = count($result);

					if (!empty($result) ){
						echo '<pre>',print_r($result),'</pre>' ;
						
						$password_result = $result[0]['password'];
						$salt_result = $result[0]['salt'];

						$post_hashed = hash_pbkdf2("sha512", $_POST['password'], $salt_result, 1000);
						// $password_hashed = hash_pbkdf2("sha512", $_POST['password'], $salt_result, 5000);
						$hashed = password_verify( $post_hashed,$password_result);	

						if ($hashed){

							if($count > 0){  
								
								$_SESSION["email"] = $_POST["email"];  
								header("location:home.php");  

							}else{  

									$message = '<label>Wrong Data</label>';  
							}  
								
						}else{
								$_SESSION['message'] = "Wrong Password";	
								header("location:index.php"); 
							}
					
					}else{
							$_SESSION['message'] = "Invalid Email";
							header("location:index.php"); 

					}                      
           }  
      }  
}catch (PDOException $error) { 

      $message = $error->getMessage();  
} 

?>


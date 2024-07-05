

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	  <link rel="stylesheet" type="text/css" href="style.css">
	  <link rel="preconnect" href="https://fonts.googleapis.com">
	  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Lobster&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
	  <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	  <link href="https://fonts.googleapis.com/css2?family=Anton&family=Lobster&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
	  <style> @import url('https://fonts.googleapis.com/css2?family=Anton&family=Kanit:wght@300&family=Lobster&family=Montserrat:wght@400;700&family=Secular+One&display=swap'); </style>
	  <style> @import url('https://fonts.googleapis.com/css2?family=Anton&family=Kanit:wght@300&family=Lobster&family=Montserrat:wght@400;700&family=Secular+One&display=swap'); </style>
</head>
<body>

	<div class="container">
		<form action="process.php" method="POST">
		<div class="form row">	
			

			<div class="col-sm-3"></div>

			<div class="left col-sm-3">
				<center>
				<h2>Welcome back</h2>
				<button class="gbtn"><span> <img src="googleimg.png" class="googleimg"> </span>Sign in with Google</button>
				<h3>or login with email</h3>
				<input class="textfield" id="email" type="text" name="email" placeholder="Email"><br>
				<input class="textfield" id="password" type="password" name="password" placeholder="Password"><br>
				<button class="loginbtn" type="submit" id="btnsubmit" name="login">REGISTER</button><br>
				<input type="checkbox"> <label>Keep me logged in</label>
				<label style="text-decoration: underline;">Forgot password</label><br>			

			</div>
			<div class="right col-sm-3">
				<center>
				<img class="imagebg" src="clipart.png">
				</center>
			</div>
			<div class="col-sm-3"></div>
		</div>
		</form>
	</div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>



<?php

session_start();

if (isset($_SESSION['login']) == 'yes') { //not logged in

    //redirect to homepage
    header("Location: contactpage.php");
    exit(); // NOT DIE

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign in</title>
	<link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/8643/8643765.png">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
</head>
<body>
<style>
	body{
		background-image:url('images/login.svg');
		background-repeat:no-repeat;
		background-size: cover;
		font-family: Courier, monospace;
	}
</style>	




<div class="container">
<br> <br><br><br> <br><br><br>


<div class="row justify-content-center">
<div class="col-md-5">
<div class="card">
<header class="card-header" style="background-color:#6c63ff; color:white">
	<h4 class="card-title mt-2"><b>Sign in</b></h4>
</header>
<article class="card-body">

<form action='functions.php' method='post'>
	
	<div class="form-group">
		<label>Email address</label>
		<input  required type="email" class="form-control" name= 'email' placeholder="">
	</div> 

	<div class="form-row">
		<div class="col form-group">
			<label>Password</label>   
		  	<input required type="password" name= 'password' class="form-control" placeholder="" onkeyup='passConfirm();' id="Password">
		</div> 
	
	</div> 
	
<br>
<br>
    <div class="form-group">
		<center>
		<button type="submit" class="btn btn-primary " id='submitbutton' name='login' style="background-color:#6c63ff; color:white"> Submit  </button> <br>
		
        <a href ='register.php'><span><small>Create new account</small></span></a>
		</center>
   
    </div> 
</form>


</body>
</html>










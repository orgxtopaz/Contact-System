<?php
session_start();

if (!isset($_SESSION['login']) == 'yes') { //not logged in

    //redirect to homepage
    header("Location: login.php");
    exit(); // NOT DIE

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Contact</title>
	<link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/8643/8643765.png">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
</head>
<body>
	<style>
			body{
				background-image:url('images/contact.svg');
				background-repeat:no-repeat;
				background-size: cover;
				font-family: Courier, monospace;
			}
	</style>





<div class="container">
<br>  
<hr>
<div style='text-align: right; margin-left:-10px'>
<a  style='margin-left:10px'>Add Contact</a>
<a href ='contactpage.php' style='margin-left:10px'>Contacts</a>
<a href ='Logout.php'style='margin-left:10px'>Logout</a>
</div>
<div class="row justify-content-center">
<div class="col-md-6">
<div class="card">
<header class="card-header">
	<h4 class="card-title mt-2"><b>Add Contact</b></h4>
</header>
<article class="card-body">

<form action='functions.php' method='post'>
	<div class="form-row">
		<div class="col form-group">
			<label>Name</label>   
		  	<input required type="text" name= 'name' class="form-control" placeholder="">
		</div> 
	
	</div> 
    <div class="form-row">
		<div class="col form-group">
			<label>Company</label>   
		  	<input type="text" name= 'company' class="form-control" placeholder="">
		</div> 
	
	</div> 
    <div class="form-row">
		<div class="col form-group">
			<label>Phone</label>   
		  	<input type="number" name= 'phone' class="form-control" placeholder="">
		</div> 
	
	</div> 
    <div class="form-row">
		<div class="col form-group">
			<label>Email</label>   
		  	<input type="text" name= 'email' class="form-control" placeholder="">
		</div> 
	
	</div> 
   
	


<br>
<br>
    <div class="form-group">
		<center>
		<button type="submit" class="btn btn-primary " id='submitbutton' name='addContact' style="background-color:#6c63ff; color:white"> Submit  </button><br>
		</center>
   
    </div>   
</form>
</article> 
</div>
</div>

</div>


</div> 


<br><br>

<script>


var passConfirm = function() {

   if (document.getElementById("Password").value == "" && document.getElementById("ConfirmPassword").value =='') {

		document.getElementById("submitbutton").disabled=false;

		document.getElementById("Message").style.color = "";
		document.getElementById("Message").innerHTML = "";
	}

  else if (document.getElementById("Password").value == document.getElementById("ConfirmPassword").value) {

	document.getElementById("submitbutton").disabled=false;

    document.getElementById("Message").style.color = "";
    document.getElementById("Message").innerHTML = ""
  } 

  

  else {

	document.getElementById("submitbutton").disabled=true;

    document.getElementById("Message").style.color = "Red";
    document.getElementById("Message").innerHTML = "Password does not match!"
  }
}
</script>
</body>
</html>










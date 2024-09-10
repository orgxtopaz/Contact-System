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
    
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/8643/8643765.png">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact</title>
</head>
<body>
	<style>
			body{
				background-image:url('images/home.svg');
				background-repeat:no-repeat;
				background-size: cover;
				font-family: Courier, monospace;
			}
	</style>
    


<?php
              include 'connection.php';

               if(isset($_GET['update_contact'])){

                $contactID = $_GET['update_contact'];


           
              $sql = "SELECT * FROM `contacts` WHERE contactID = '$contactID'";
              $result = $conn->query($sql);
              $count = 1;
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

 ?>
	    
<div class="container">
<br>  
<hr>
<div style='text-align: right; margin-left:-10px'>
<a href ='addContact.php' style='margin-left:10px'>Add Contact</a>
<a href ='contactpage.php' style='margin-left:10px'>Contacts</a>
<a href ='Logout.php'style='margin-left:10px'>Logout</a>
</div>

<div class="row justify-content-center">
<div class="col-md-6">
<div class="card">
<header class="card-header">
	<h4 class="card-title mt-2"><b>Edit Contact</b></h4>
</header>
<article class="card-body">

<form action='functions.php' method='post'>
	<div class="form-row">
		<div class="col form-group">
			<label>Name</label>   
		  	<input type="text" name= 'name' class="form-control" value = <?php echo $row ['name'] ?> placeholder="">
		</div> 
	
	</div> 
    <div class="form-row">
		<div class="col form-group">
			<label>Company</label>   
		  	<input type="text" name= 'company' class="form-control" value = <?php echo $row ['company'] ?> placeholder="">
		</div> 
	
	</div> 
    <div class="form-row">
		<div class="col form-group">
			<label>Phone</label>   
		  	<input type="number" name= 'phone' class="form-control" value = <?php echo $row ['phone'] ?> placeholder="">
		</div> 
	
	</div> 
    <div class="form-row">
		<div class="col form-group">
			<label>Email</label>   
		  	<input type="text" name= 'email' class="form-control" value = <?php echo $row ['email'] ?> placeholder="">
		</div> 
	
	</div> 
    
    <input type="hidden" class="form-control" name= 'contactID' value = <?php echo $row ['contactID'] ?> >

	

<br>
<br>
    <div class="form-group">
		<center>
        <button type="submit" class="btn " name='update_contact' style="background-color:#6c63ff; color:white"> Submit  </button>

		</center>
   
    </div>  
</form>
</article>
</div>
</div>

</div>


</div> 


              <?php } ?>
              <?php } ?>
              <?php } ?>

</body>
</html>
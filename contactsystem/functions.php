

<?php

session_start();

/// DATABASE CONNECTION
include 'connection.php';


// REGISTER USER
if (isset($_POST['register'])) {


        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $Cpassword = $_POST['Cpassword'];

         if ($email !="" || $password !=""){
              //PASSWORD ENCRYPTED

        $hash = password_hash($password,PASSWORD_DEFAULT); 
      

        //CHECK IF PASSWORD MATCH / DOUBLE VALIDATION

        if($password == $Cpassword) {


            // CHECK IF EMAIL EXIST

            $query = mysqli_query($conn, "SELECT email from users where email = '$email'"); //Search for the email from the users database 
            $count = mysqli_num_rows($query); //get the number of rows that contain the email address. 
            
            if ($count > 0) { 

                echo '<html lang="en">
                <head>
                    <meta charset="utf-8" />
                    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title></title>
                    <link href="https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700" rel="stylesheet" type="text/css">
                    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/8643/8643765.png">
                    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                    <link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
                    <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
                    <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
                </head>
                <body>
                    <style>
                        body {
                            background-image: url("images/warning.svg");
                            background-repeat: no-repeat;
                            background-size: cover;
                            font-family: Courier, monospace;
                        }
                    </style>
                    <header class="site-header" id="header">
                        <h4 class="site-header__title" data-lead-id="site-header-title" style="font-size:29px">Email Already Exist!</h4>
                    </header>
                    <br>
                    <div class="main-content">
                        <div class="form-group">
                            <a href="register.php"><button type="submit" class="btn" style="background-color:#6c63ff; color:white" name="register">Go back</button></a>
                        </div>    
                    </div>
                </body>
                </html>';
               
                
                   
            } else{

            //Email does not exist in the DB 

            $sql = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$hash')";

            $result = $conn->query($sql);

            if ($result == TRUE) {

                $_SESSION["login"] = 'yes';
                $_SESSION["userID"] = $email;

              
                echo '<html lang="en">
                <head>
                    <meta charset="utf-8" />
                    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title></title>
                    <link href="https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700" rel="stylesheet" type="text/css">
                    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/8643/8643765.png">
                    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                    <link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
                    <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
                    <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
                </head>
                <body>
                    <style>
                        body {
                            background-image: url("images/welcome.svg");
                            background-repeat: no-repeat;
                            background-size: cover;
                            font-family: Courier, monospace;
                        }
                    </style>
                    <header class="site-header" id="header">
                        <h4 class="site-header__title" data-lead-id="site-header-title" style="font-size:30px">Thank you for registering!</h4>
                    </header>
                    <div class="main-content">
                        <br>
                        <div class="form-group">
                            <a href="contactpage.php"><button type="submit" class="btn" style="background-color:#6c63ff; color:white" name="register">Continue</button></a>
                        </div>
                    </div>
                </body>
                </html>';
               
                




            }
            else{
                echo "Error:'. $sql . '<br>" . $conn->error;
            }


            }

        


            }

        // IF PASSWORD DOES NOT MATCH
        else{
          
            echo '<html lang="en">
            <head>
                <meta charset="utf-8" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title></title>
                <link href="https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700" rel="stylesheet" type="text/css">
                <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/8643/8643765.png">
                <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
                <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
                <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
            </head>
            <body>
            <style>
              body {
                background-image: url("images/warning.svg");
                background-repeat: no-repeat;
                background-size: cover;
                font-family: Courier, monospace;
                }
            </style>
              
                <header class="site-header" id="header">
                    <h4 class="site-header__title" data-lead-id="site-header-title" style="font-size:40px">Password does not Match!</h4>
                </header>
                <br>
                <div class="main-content">
                    <div class="form-group">
                        <a href="register.php"><button type="submit" class="btn" style="background-color:#6c63ff; color:white" name="register">Go back</button></a>
                    </div>     
                </div>
            </body>
            </html>';
         
            
        }

        }else{
            echo "Error - Must provide valid email and password";
         }

      

} 


        

//// LOGIN
else if (isset($_POST['login'])) {


   
    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM `users` WHERE email = '$email' ";
    $result = $conn->query($sql);
    $count = 1;
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        


        $verify = password_verify($password, $row ['password']); 

        if ($verify) { 
            $_SESSION["login"] = 'yes';
            $_SESSION["userID"] = $row ['email'];
            header('Location: contactpage.php');
          } else { 
            echo '<html lang="en">
            <head>
                <meta charset="utf-8" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title></title>
                <link href="https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700" rel="stylesheet" type="text/css">
                <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/8643/8643765.png">
                <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
                <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
                <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
            </head>
            <body>
                <style>
                    body {
                        background-image: url("images/warning.svg");
                        background-repeat: no-repeat;
                        background-size: cover;
                        font-family: Courier, monospace;
                    }
                </style>
                <header class="site-header" id="header">
                    <h4 class="site-header__title" data-lead-id="site-header-title" style="font-size:28px">Incorrect Password!</h4>
                </header>
                <br>
                <div class="main-content">
                    <div class="form-group">
                        <a href="login.php"><button type="submit" class="btn" style="background-color:#6c63ff; color:white" name="register">Go back</button></a>
                    </div>    
                </div>
            </body>
            </html>';
          } 
      }}

    
    
    else{

echo '<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/8643/8643765.png">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
    <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
    <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
</head>
<body>
    <style>
        body {
            background-image: url("images/warning.svg");
            background-repeat: no-repeat;
            background-size: cover;
            font-family: Courier, monospace;
        }
    </style>
    <header class="site-header" id="header">
        <h4 class="site-header__title" data-lead-id="site-header-title" style="font-size:29px">User does not Exist!</h4>
    </header>
    <br>
    <div class="main-content">
        <div class="form-group">
            <a href="login.php"><button type="submit" class="btn" style="background-color:#6c63ff; color:white" name="register">Go back</button></a>
        </div>    
    </div>
</body>
</html>';


        

    }


}

    



// ADD CONTACT


else if (isset($_POST['addContact'])) {


    $name = $_POST['name'];
    $company = $_POST['company'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $userID= $_SESSION["userID"];



        $nameallow = mysqli_real_escape_string($conn,$name);

        $sql = "INSERT INTO contacts (name,company,phone,email,userID) VALUES ('$nameallow','$company','$phone','$email','$userID')";

        $result = $conn->query($sql);

        if ($result == TRUE) {

         
            header('Location: contactpage.php');




        }
        else{
            echo "Error:'. $sql . '<br>" . $conn->error;
        }

 
     
 
 


}

// UPDATE CONTACT

else if(isset($_POST['update_contact'])){

 
    $name = $_POST['name'];
    $company = $_POST['company'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $contactID = $_POST['contactID'];

 
     
     $sql = "UPDATE contacts SET name='".$name."',company='".$company."',phone='".$phone."',email='".$email."' WHERE contactID=".$contactID;

      
    $result = $conn->query($sql);
    
    if ($result == TRUE) {
        header('Location: contactpage.php');
    } else {
        echo "Error:'. $sql . '<br>" . $conn->error;
    }
    $conn->close();


}


// DELETE CONTACT

if(isset($_GET['delete_contact'])){

    $contactID = $_GET['delete_contact'];

    $sql = "DELETE FROM contacts WHERE contactID = $contactID";

      
    $result = $conn->query($sql);
    
    if ($result == TRUE) {
        header('Location: contactpage.php');
    } else {
        echo "Error:'. $sql . '<br>" . $conn->error;
    }
    $conn->close();

}




?>


<?php
// Start the session
session_start();
include "dbconfig.php";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];


    $sql = "Select * from user_request where email='$email'"; 
    
    $result = mysqli_query($conn, $sql); 
    
    $num = mysqli_num_rows($result); 
    
    if($num == 0) { 
        if(($password == $cpassword)) { 
    
            $hash = password_hash($password, PASSWORD_DEFAULT); 
            $sql="INSERT INTO user_request(name,email,password,date) VALUES('$name','$email','$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql); 
            $error[]='We will connect with you if you accepted!'; //problem
           /* header('location:signup.php');*/
    
             
        }  
        else {  
          $error[]="password not matched!";  
        }       
    } 
    
   if($num>0)  
   { 
    $error[]= "you already give the request, please wait until accept you!";  
   }  
    

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="css/login&signup.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
	<!--<img class="wave" src="photo/b.jpg"> -->

    
	<div class="container">
		<div class="img">
			<img src="photo/av1.svg">
		</div>

    
		<div class="login-content">

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<img src="photo/av.svg">
        <br>
				<!-- <h2 class="title">Welcome</h2> -->
        <?php

if(isset($error)){
    foreach($error as $error){
    echo '<span class="error-msg">'.$error.'</span>';
};
};
?>
        

       

    <div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		
                              <input type="text" id="name" name="name" placeholder="Enter your name" required>
           		   </div>
           		</div>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-envelope"></i>
           		   </div>
           		   <div class="div">
           		   		
                              <input type="email" id="email" name="email" placeholder="Enter your email" required>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	
           		    	<input type="password" id="password" name="password" placeholder="Enter your password" required>
            	   </div>

            	</div>

              <div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	
           		    	<input type="password" id="cpassword" name="cpassword" placeholder="ReEnter your password" required>
            	   </div>
                 
            	</div>
<br>
            	<input type="submit" class="btn" value="Sign Up">
             <p>You have an account? <a href="login.php"> Log In</a> </p>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>

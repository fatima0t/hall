<?php
// Start the session
session_start();
include "dbconfig.php";
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $email = $_POST["email"];
    $password = $_POST["password"];
    $admin = 'fatimamuntaser0@gmail.com';
    // Encrypt the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $select = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $stored_password = $row['password'];
        // Verify the password
        if (password_verify($password, $stored_password) && $email == $admin) {
            header("Location: admin_page.php");
        } else if (password_verify($password, $stored_password) && $email != $admin) {
            header("Location: HallType.php");
        } else {
            $errors[] = "Invalid email or password.";
        }
    } else {
        $errors[] = "Invalid email or password.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="login&signup.css">
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
				<!-- <h2 class="title">Welcome</h2> -->
                <?php if (!empty($errors)) { ?>
        <div style="color: red;">
            <?php foreach ($errors as $error) { echo $error . "<br>"; } ?>
        </div>
    <?php } ?>
<?php
   if (isset($_SESSION['logout_success'])) {
    echo "<div style='color: green;'>You have been logged out successfully.</div>";
    unset($_SESSION['logout_success']);
}
?>
                <div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
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
            	<a href=resetpassword.php>Forgot Password?</a>
            	<input type="submit" class="btn" value="Login">
				<p>You don't have an account? <a href="signup.php"> Sign Up</a> </p>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>

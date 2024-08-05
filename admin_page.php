<?php
session_start();
include "dbconfig.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    

    $sql = "INSERT INTO users (name, email, password) 
            VALUES ('$name', '$email', '$password')";

    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Document</title>
    <!--<link rel="stylesheet" type="text/css" href="admin_page.css">--> 
    <style> 
    
    body {
        font-family: Electrolize;
       /* background-image: URL( 'photo/background13.svg');*/
       background-image: URL( 'photo/background 8.png');
    /*background-image: URL( 'photo/background6.jpg');*/
    background-repeat: no-repeat;
    background-size: cover;
    background-color: #fff;
    color: #000000; /* font color */
  }

  
  
  

    th, td, tr, th, tbody, thead{
    border: 3px solid green;
  }

   table {
    width: 100%;
    text-align: center;
    
  }

  img {
    float: left;
    margin-right: 10px;
  }

  .container input[type="submit"] {
      background-color: #CE121D;
      color: #fff;
      cursor: pointer;
    }

    .container input[type="submit"]:hover {
    /* color: #000000;*/
  
      background-color: #d37979;
    }
    a {
  text-decoration: none;
  font-family: Electrolize;
  color: #000000;
}

    .btn {
    display: inline-block;
    font-weight: 400;
    color: #000000;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-color: #007bff;
    border: 2.5px solid #007bff;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.btn:hover {
    
    background-color: #dadde0;
    border-color: #0062cc;
    color: #000000;
}

.btn-primary {
    color: #000000;
    background-color: #00e990;
    border-color: #000000;
}

.btn-primary:hover {
    color: #000000;
    background-color: #D9D9D9;
    border-color: #0062cc;
} 

.custom-link {
    color: #000000;
    background-color: #00e990;
    border-color: #0062cc;
}


        </style>
</head>
<body>

    
<div class="container">
    
    <?php
    

    if (isset($_SESSION['error_message'])) {
        echo "<div class='error-container'>";
        echo "<h2>Oops! User already exist.</h2>";
        
        echo "</div>";

        // Clear the error message from the session
        unset($_SESSION['error_message']);
    }
    ?>
    <?php
    

    if (isset($_SESSION['error_message1'])) {
        echo "<div class='error-container'>";
        echo "<h2>New user created successfully.</h2>";
        
        echo "</div>";

        // Clear the error message from the session
        unset($_SESSION['error_message1']);
    }
    ?>
<table class="table">
            <thead>
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
           
                <tr>
                    
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM user_request WHERE `a/r`=1 ";
                $result = $conn->query($sql);

                if ($result === false) {
                    // Handle the query error
                    echo "Error executing the query: " . $conn->error;
                } else {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['password']; ?></td>
                                
                                <td>
                                    <button class="btn btn-primary">
                                    <a href="add_by_admin.php?email=<?php echo $row['email']; ?>&name=<?php echo $row['name']; ?>&password=<?php echo $row['password']; ?>" >Accept</a> <button class="btn btn-primary">
                                    <a href="delete_admin.php?removeid=<?php echo $row['id']; ?>" >Reject</a>
                                    </button>
                                </td>
                                
                                    
                                
                            </tr>
                            
                            <?php
                        }
                    } else {
                       /* echo "No records found.";*/
                    }
                }
                ?>

                
            </tbody>
        </table>
        <a href="logout.php"  class="custom-link">Logout</a>
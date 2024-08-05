<?php
// Include the database configuration file
include "dbconfig.php";

// Start the session
session_start();

// Check if the required parameters are set in the URL
if (isset($_GET['email'], $_GET['name'], $_GET['password'])) {
    $email = $_GET["email"];

    // Check if the email already exists in the user table
    $sql_check = "SELECT * FROM user WHERE email = '$email'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        // If the email already exists, set an error message and redirect to the admin page
        $_SESSION['error_message'] = "Error: " . $sql . "<br>" . $conn->error;
        header("Location: admin_page.php");
        exit();
    } else {
        // Get the name and password from the form
        $name = $_GET['name'];
        $password = $_GET['password'];

        // Prepare the SQL query to insert the data
        $sql = "INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            // If the insertion is successful, check if there's a row in the user_request table with the same email
            // and update the 'a/r' column to '0'
            $sql_delete = "UPDATE user_request SET `a/r`='0' WHERE email='$email'";
            $conn->query($sql_delete);

            // Set a success message in the session and redirect to the admin page
            $_SESSION['error_message1'] = "Error: " . $sql . "<br>" . $conn->error;
            header("Location: admin_page.php");
            exit();
        } else {
            // If there's an error, print the error message
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
} else {
    // If the required parameters are not set, print an error message
    echo "Missing required parameters in the URL.";
}
?>
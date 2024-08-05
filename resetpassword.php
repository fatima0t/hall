<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hall";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Prepare the SQL query
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id = $row["id"];
        $user_email = $row["email"];

        // Generate a random password reset token
        $reset_token = bin2hex(random_bytes(32));

        // Update the password reset token in the database
        $update_sql = "UPDATE users SET password_reset_token = ?, password_reset_expiration = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("si", $reset_token, $user_id);
        $update_stmt->execute();

        // Send the password reset email using PHPMailer
        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->Username = "your_gmail_username@gmail.com";
            $mail->Password = "your_gmail_password";
            $mail->setFrom("your_email@example.com", "Password Reset");
            $mail->addAddress($user_email);
            $mail->Subject = "Password Reset Instructions";
            $mail->Body = "To reset your password, please click the following link:\n\nhttp://example.com/reset_password.php?token=" . $reset_token;
            $mail->send();
            echo "An email with password reset instructions has been sent to your address.";
        } catch (Exception $e) {
            echo "There was an error sending the password reset email: " . $mail->ErrorInfo;
        }
    } else {
        echo "No user found with the provided email address.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Password Reset</title>
</head>
<body>
    <h1>Password Reset</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Email: <input type="email" name="email" required>
        <input type="submit" name="submit" value="Reset Password">
    </form>
</body>
</html>
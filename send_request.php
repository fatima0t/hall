
<?php
// Start the session
session_start();
include "dbconfig.php";

?>
<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_time = $_POST["search_time"];

    // Prepare the SQL query to check if the time exists in the database
    $stmt = $conn->prepare("SELECT * FROM south_table WHERE time = ?");
    $stmt->bind_param("s", $search_time);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Time exists in the database, update the time
        $stmt = $conn->prepare("UPDATE time_table SET time = ? WHERE time = ?");
        $stmt->bind_param("ss", $search_time, $search_time);
        $stmt->execute();
        echo "Time updated successfully.";
    } else {
        // Time doesn't exist in the database, insert a new record
        $stmt = $conn->prepare("INSERT INTO time_table (time) VALUES (?)");
        $stmt->bind_param("s", $search_time);
        $stmt->execute();
        echo "Time added successfully.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Time Search</title>
</head>
<body>
    <h1>Time Search</h1>
    <form method="post" action="">
        Time: <input type="time" name="search_time">
        <input type="submit" name="submit" value="Search">
    </form>
</body>
</html>
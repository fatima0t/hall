<?php
include "dbconfig.php";

$id = $_GET['updateid'];

// Prepare the SQL query to fetch the row
$sql = "SELECT * FROM center WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if (!$stmt->execute()) {
    echo "Error executing query: " . $stmt->error;
    exit;
}

$result = $stmt->get_result();
if ($result->num_rows === 0) {
    header('location:center_hall.php');
    exit;
}

$row = $result->fetch_assoc();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $stime = $_POST['stime'];
    $etime = $_POST['etime'];
    $pamount = $_POST['pamount'];
    $ramount = $_POST['ramount'];
    $notes = $_POST['notes'];

    $sql = "UPDATE center 
        SET name = ?, date = ?, stime = ?, etime = ?, pamount = ?, ramount = ?, notes = ?
        WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssi", $name, $date, $stime, $etime, $pamount, $ramount, $notes, $id);

    if ($stmt->execute()) {
        echo 'Update successful';
        header('location:edit_information_c.php');
    } else {
        echo 'Error updating record: ' . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="update.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>update form</title>

    

</head>
<body>
    <div class="container">

    <div class="img">
			<img src="photo/edit1.svg">
		</div>
        <form action="" method="post">
            <!--<h3>Edit Information</h3>-->
            <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                    }
                }
            ?>
            <form action="#" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <!--<label for="name">Name:</label> -->
                Name: <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>">

             <!--   <label for="date">Date:</label> -->
               Date: <input type="date" id="date" name="date" value="<?php echo $row['date']; ?>">

                
                Start Time: <input type="time" id=" start time" name="stime" value="<?php echo $row['stime']; ?>">

               
                End Time: <input type="time" id="end time" name="etime" value="<?php echo $row['etime']; ?>">

                
                Paid Amount: <input type="number" id="paid" name="pamount" value="<?php echo $row['pamount']; ?>">

                
                remaining amount:<input type="number" id="paid" name="ramount" value="<?php echo $row['ramount']; ?>">

                
                Notes: <input type="text"  name="notes" value="<?php echo $row['notes']; ?>">
                <!--<textarea id="notes" name="notes"><?php echo $row['notes']; ?></textarea> -->
                 
                <input type="submit" name="submit" value="update now" class="form-btn">
            </form>
        </form>
    </div>
</body>
</html>
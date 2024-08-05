
<?php
include "dbconfig.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Person Database</title>
    <link rel="stylesheet" type="text/css" href="style_table.css">
<style> 
    body {
    font-family: Electrolize;
    background-image: URL( 'photo/10.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    color: #D9D9D9;
  }

  .container {
    max-width: 500px;
    margin-top: 160px;
    margin-bottom: 100px;
    margin-right: 150px;
    margin-left: 500px;
    padding: 100px;
    background-color: #CE121D;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    
  }

  

    th, td {
    border: 2px solid;
  }

   table {
    width: 100%;
  }

  img {
    float: left;
    margin-right: 10px;
  }
</style>
</head>
<body>

    <div class="container">
    <img width="50" src="photo\6.png" alt="no photo">
        <h2>Details</h2>
        <table class="table">
            <thead>
                
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Paid?</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM south_table";
                $result = $conn->query($sql);

                if ($result === false) {
                    // Handle the query error
                    echo "Error executing the query: " . $conn->error;
                } else {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['date']; ?></td>
                                <td><?php echo $row['time']; ?></td>
                                <td><?php echo $row['paid']; ?></td>
                                
                                    
                                
                            </tr>
                            
                            <?php
                        }
                    } else {
                        echo "No records found.";
                    }
                }
                ?>

                
            </tbody>
        </table>
     
     <!--<a class="btn btn-info" href="http://localhost:8080/hall/add.php">add new</a> -->
                                    
       
    </div>
</body>
</html>
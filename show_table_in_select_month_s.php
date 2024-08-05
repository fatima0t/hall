<!--done -->
<?php
include "dbconfig.php";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["month"]) && isset($_POST["year"])) {
        $selectedMonth = $_POST["month"];
        $selectedYear = $_POST["year"];

        // Prepare and execute SQL query
        $sql = "SELECT `name`, `date`, `stime`, `etime`, `pamount`, `ramount`, `notes` FROM south WHERE MONTH(date) = ? AND YEAR(date) = ? AND `delete`=1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $selectedMonth, $selectedYear);

        if (!$stmt->execute()) {
            echo "Error executing the query: " . $stmt->error;
        } else {
            $result = $stmt->get_result();
        }
    } else {
        
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <!-- <title>Show Table</title> -->
     <style>
    form {
    width: 100%;
 

    border-radius: 30px;
    /*border: 3px solid green;*/
  }
  
  .container h1 {
    text-align: center;
    color: green;
  }
  
  .container input[type="text"],
  .container input[type="submit"],
  .container input[type="number"],
  .container input[type="time"],
  .container input[type="notes"],
  .container input[type="date"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 3px solid green;
    border-radius: 4px;
    box-sizing: border-box;
    font-family: Electrolize;
  }
  
  .container input[type="submit"] {
    background-color: #07ff66;
    color: #000000;
    cursor: pointer;
  }
  
  .container input[type="submit"]:hover {
    background-color: white;
  }
  
  /*.container {
    width: 100%;
    height: 100%;
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-gap: 2rem;
    padding: 0 2rem;
    
  }
  
  .img {
    display: flex;
    justify-content: flex-end;
    
  }
  
  .img img {
    width: 100%;
  }
*/

  .container0 {
    max-width: 100%;
    margin-top: 10px;
    /*margin-top: 80px;
    margin-bottom: 100px;
    margin-right: 90px;
    margin-left: 10px;*/
    
    padding-left: 0px;
    border-radius: 10px;
   /* box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); */
   
   
    
  }
  th, td {
    width: 100%%;
      border: 2px solid green;
      padding-left: 10px;
      text-align: lift;
      
    }
  
     table {
      width: 100%;
      text-align: lift;
      padding-left: 10px;
    }


    .container select {
width: 100%;
padding: 10px;
margin-bottom: 10px;
border: 3px solid green;
border-radius: 4px;
box-sizing: border-box;
font-family: Electrolize;

}

</style>
    
</head>
<body>
    <div class="container">
    <div class="img">
			<!--<img src="photo/showmonth.svg">-->
		</div>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Month: <select name="month">
            <option value="">Select a month</option>
            <?php
                for ($i = 1; $i <= 12; $i++) {
                    echo "<option value=\"$i\">$i</option>";
                }
            ?>
        </select>
        Year: <input type="number" name="year" min="2000" max="2100" required>
        <input type="submit" name="submit" value="Show">
    

    <?php
        if (isset($result)) {
            if ($result->num_rows > 0) {
              echo "<h2>Search Results:</h2>";
              echo "<table class='container0' id='myTable'>";
              echo "<thead><tr>";
              echo "<th>Name</th>";
              echo "<th>Date</th>";
              echo "<th>Start time</th>";
              echo "<th>End time</th>";
              echo "<th>Paid amount</th>";
              echo "<th>Remaining amount</th>";
              echo "<th>Notes</th>";
              echo "</tr></thead><tbody>";
  
              while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["date"] . "</td>";
                echo "<td>" . $row["stime"] . "</td>";
                echo "<td>" . $row["etime"] . "</td>";
                echo "<td>" . $row["pamount"] . "</td>";
                echo "<td>" . $row["ramount"] . "</td>";
                echo "<td>" . $row["notes"] . "</td>";
                echo "</tr>";
              }
  
              echo "</tbody></table>";
            } else {
                echo "No data found for the selected month and year.";
            }
        }
    ?>
    </form>
    </div>

    <script>
$(document).ready(function() {
  $('#myTable').DataTable({
    // Exclude the 'search' configuration option
  });
});
</script>
</body>
</html>
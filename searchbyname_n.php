<!--have one error when referesh page no result found appere -->
<?php
include "dbconfig.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Search</title>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <style>
    body {
  font-family: Electrolize;
  /*background-image: URL( 'photo/9.jpg');*/
  background-repeat: no-repeat;
  background-size:2000px 1000px;
  color: #000000; 
  background-color: #fff; 
 
 
}

.container {
  max-width: 700px;
  margin-top: 60px;
  margin-bottom: 0px;
  margin-right: 0px;
  margin-left: 240px;
  padding:00px;
  background-color: #fff;
  /*border-radius: 10px;
  border: 3px solid #000000;
  box-shadow: 10px 5px 5px red;*/
  
}

.container h1 {
  text-align: center;
}

.container input[type="text"],
.container input[type="email"],
.container input[type="password"],
.container input[type="submit"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 3px solid #000000;
  border-radius: 4px;
  box-sizing: border-box;
  font-family: Electrolize;
}

.container input[type="submit"] {
  background-color: #85060e;
  color: #fff;
  cursor: pointer;
}

.container input[type="submit"]:hover {
  background-color: #d37979;
}

a:link {
color: #ff2727;
background-color: transparent;
text-decoration: none;
}

.container0 {
    max-width: 100%;
    
   
    
  }
  .container {
    width: 90vw;
    height: 85vh;
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-gap: 2rem;
    padding: 90 2rem;
    
  }
  
  .img {
    display: flex;
    justify-content: flex-end;
    
  }
  
  .img img {
    width: 360px;
   
  }

th, td {
  width: 100%;
    border: 2px solid;
    padding-left: 10px;
    text-align: lift;
    
  }

   table {
    width: 100%;
    text-align: lift;
    padding-left: 10px;
  }


.container img {
  margin-top: -150px; /* Adjust the value as needed */
}

.container input[type="submit"] {
      background-color: #CE121D;
      color: #fff;
      border-radius: 30px;
      cursor: pointer;
    }

    .container input[type="submit"]:hover {
      background-color: #000000;
    }


</style>
</head>
<body>
  <div class="container">
    <div class="img">
      <img src="photo/searchbyname.svg">
    </div>
    <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <br>
      <label for="name">Enter the name:</label>
      <input type="text" id="name" name="name">
      <br><br>
      <input type="submit" name="submit" value="Search">

      <?php
      if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $name = isset($_GET['name']) ? $_GET['name'] : '';

        $stmt = $conn->prepare("SELECT * FROM north WHERE name = ? AND `delete`=1");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result === false) {
          // Handle the query error
          echo "Error executing the query: " . $conn->error;
        } else {
          if ($result->num_rows > 0) {
            // Display the search results
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
            echo "<p>No records found.</p>";
          }
        }
        $stmt->close();
      }
      ?>
    </form>
  </div>

  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
  </script>
</body>
</html>
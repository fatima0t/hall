<!--done-->
<?php
include "dbconfig.php";
?>

<!DOCTYPE html>
<html>
<head>
  <title>Search</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>



 <style>
  
  body {
    font-family: Electrolize;
    background-image: URL( 'photo/b.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    color: #000000; /* font color */
  }

  .container {
    max-width: 100%;
    margin-top: 4%; 
  }

    th, td {
    border: 1.5px solid green;
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
    color: #000000;
    background-color: #0069d9;
    border-color: #0062cc;
}

.btn-primary {
    color: #000000;
    background-color: #126899;
    border-color: #000000;
}

.btn-primary:hover {
    color: #000000;
    background-color: #D9D9D9;
    border-color: #0062cc;
} 

    .navbar {
      
            background-color: #fff;
            overflow: hidden;
            padding: 10px;
           border: 4px solid;
           
           font-family: 'poppins', sans-serif;
           border-radius: 10px;
           box-shadow: 10px 5px 5px green;
           
        }

        .navbar a, .navbar button {
          
            float: left;
            color: black;
            text-align: center;
            padding: 12px 16px;
            text-decoration: none;
            font-size: 16px;
            border: none;
            background-color: transparent;
            cursor: pointer;
            color: #fff;
        }

        .navbar a:hover, .navbar button:hover {
            
            background-color: #D9D9D9;
            border-radius: 20px;

        }



  </style>
  
</head>
<body>
  <div class="container">
    <form method="POST" action="">

    <?php
  
    
    

    $sql = "SELECT * FROM north WHERE `ramount`!=0  AND `delete`=1";
    $result = $conn->query($sql);

    if ($result === false) {
      // Handle the query error
      echo "Error executing the query: " . $conn->error;
    } else {
      
      if ($result->num_rows > 0) {
        
        // Display the search results
        /*echo "<h2>Search Results:</h2>"; */
       
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
        echo "<p>No one found.</p>";
      }
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




<?php
include "dbconfig.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Person Database</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!--<link rel="stylesheet" type="text/css" href="style_table.css"> -->
<style> 
    body {
        font-family: Electrolize;
       background-image: URL( 'photo/b.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-color: #fff;
    color: #000000; /* font color */
  }

  .container {
    max-width: 100%;
    margin-top: 40px; 
  }

    th, td {
    border: 2px solid green;
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
      background-color: #d37979;
    }
    a {
  text-decoration: none;
  font-family: Electrolize;
}

    .btn {
    display: inline-block;
    font-weight: 400;
    color: #fff;
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
    color: #fff;
    background-color: #0069d9;
    border-color: #0062cc;
}

.btn-primary {
    color: #fff;
    background-color: #00e990;
    border-color: #000000;
}

.btn-primary:hover {
    color: #fff;
    background-color: #D9D9D9;
    border-color: #0062cc;
} 

    .navbar {
      
        background-image: URL( 'photo/b.jpg');
    background-repeat: no-repeat;
    background-size: cover;
            overflow: hidden;
            padding: 15px;
           border: 3px solid;
           margin-right: 100px;
    margin-left: 100px;
          /* font-family: 'poppins', sans-serif; */
          
           border-radius: 10px;
           box-shadow: 10px 5px 5px gray;
           
        }

        .navbar a, .navbar button {
          
            float: left;
            color: white;
            text-align: center;
            padding: 12px 16px;
            text-decoration: none;
            font-size: 16px;
            border: none;
            background-color: transparent;
            cursor: pointer;
            color: #000000;
        }

        .navbar a:hover, .navbar button:hover {
            background-color: #D9D9D9;
            border-radius: 20px;

        }


</style>
</head>
<body>


<div class="navbar">
<form action="HallType.php" method="post">
        <button type="submit"><i class="fas fa-arrow-left"></i> &emsp;Back</button>
    </form>
<form action="search_s.php" method="post">
        <button type="submit"><i class="fas fa-search"></i> &emsp;Search by Date & Time</button>
    </form>

    <form action="searchbyname_s.php" method="post">
        <button type="submit"><i class="fas fa-search"></i> &emsp;Search by Name</button>
    </form>

    <form action="show_table_in_select_month_s.php" method="post">
        <button type="submit"><i class="fas fa-eye"></i> &emsp;Show in Selected Month</button>
    </form>

    <form action="show_not_continue_paid_s.php" method="post">
        <button type="submit"><i class="fas fa-eye"></i> &emsp;Not all paid</button>
    </form>
    
    <form action="add_new_s.php" method="post">
        <button type="submit"><i class="fas fa-plus"></i> &emsp;Add New</button>
    </form>
   
    </div>
    <!-- <img width="200" src="photo\tab.svg" alt="no have photo" class="image-below-navbar"> -->
    
    

    


    <div class="container">
   
    <img width="50" src="photo/detail.svg" alt="no photo">
        <h2>Details</h2>
        <table class="table" id='myTable'>
            <thead>
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
           
                <tr>
                    
                    <th>Name</th>
                    <th>Date</th>
                    <th>Start time</th>
                    <th>end time</th>
                    <th>Paid amount</th>
                    <th>remainig amount</th>
                    <th>Notes</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM south WHERE `delete`=1";
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
                                <td><?php echo $row['date']; ?></td>
                                <td><?php echo $row['stime']; ?></td>
                                <td><?php echo $row['etime']; ?></td>
                                <td><?php echo $row['pamount']; ?></td>
                                <td><?php echo $row['ramount']; ?></td>
                                <td><?php echo $row['notes']; ?></td>
                                <td>
                                    <button class="btn btn-primary">
                                        <a href="edit_information_s.php?updateid=<?php echo $row['id']; ?>" class="text-light">Update</a>
                                    </button>
                                    <button class="btn btn-primary">
                                        <a href="delete_s.php?removeid=<?php echo $row['id']; ?>" class="text-light">Delete</a>
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
     
     <!--<a class="btn btn-info" href="http://localhost:8080/hall/add.php">add new</a> -->
                                    
       
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
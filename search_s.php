<!--done-->
<!DOCTYPE html>
<html>
<head>
  <title>Search</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- <link rel="stylesheet" type="text/css" href="style_table.css">-->
 
 <style>
  
  form {
    width: 400px;
    margin-top: 0px;
    margin-bottom: 20px;
    margin-right: 100px;
    margin-left: 0px;
    padding: 0px;
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
    background-color: #fff;
  }
  
  .container {
    width: 100vw;
    height: 100vh;
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
    width: 500px;
    margin-top: 30px;
  }


  .container0 {
    max-width: 100%;
    margin-top: 10px;
    /*margin-top: 80px;
    margin-bottom: 100px;
    margin-right: 90px;
    margin-left: 10px;*/
    border: 3px solid #000000;
    padding-left: 0px;
    border-radius: 10px;
   /* box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); */
   box-shadow: 10px 5px 5px red;
   
    
  }
  th, td {
    width: 360px;
      border: 2px solid;
      padding-left: 10px;
      text-align: lift;
      
    }
  
     table {
      width: 360px;
      text-align: lift;
      padding-left: 10px;
    }






    </style>
  
</head>
<body>
  <div class="container">
  <div class="img">
			<img src="photo/search.svg">
		</div>
    
    <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <br>
      
    <h1>SEARCH</h1>
      <label for="date">Select the date:</label>
      <input type="date" id="date" name="date">
      <br><br>
      <label for="time">Enter start time:</label>
      <input type="time" id="stime" name="stime" step="1">
      <br><br>
      <label for="time">Select end time:</label>
      <input type="time" id="etime" name="etime" step="1">
      <br><br>
      <!--<button type="submit">Search</button>-->
      <input type="submit" name="submit" value="Search">

      
      <?php
include "dbconfig.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['submit'])) {
  $date = isset($_GET['date']) ? $_GET['date'] : '';
  $stime = isset($_GET['stime']) ? date('H:i:s', strtotime($_GET['stime'])) : '';
  $etime = isset($_GET['etime']) ? date('H:i:s', strtotime($_GET['etime'])) : '';

  $sql = "SELECT * FROM south WHERE (date= '$date') AND (( '$stime' BETWEEN stime And etime ) 
          OR ( '$etime' BETWEEN stime And etime ) 
          OR ( etime BETWEEN '$stime' And '$etime' ) 
          OR ( etime BETWEEN '$stime' And '$etime' )) ";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "<p>This date & time is taken!</p>";
  } else {
    echo "<p>This date & time is not taken!</p>";
  }
}
?>
    </form>
   
  </div>

  
  <!--<a href="south_hall.php"><button>Back</button></a>-->

</body>
</html>



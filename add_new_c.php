<!--done-->
<?php
include "dbconfig.php";
?>
<?php

if (isset($_POST['submit'])) {
        
    $name = $_POST['name'];
    $date =  $_POST['date'];
    $stime= $_POST['stime'];
	$etime= $_POST['etime'];
    $pamount= $_POST['pamount'];
	$ramount= $_POST['ramount'];
    $notes= $_POST['notes'];
    
    

    

    $sql= "SELECT * FROM center WHERE (date= '$date') AND (( '$stime' BETWEEN stime And etime ) 
    OR ( '$etime' BETWEEN stime And etime ) 
    OR ( etime BETWEEN '$stime' And '$etime' ) 
    OR ( etime BETWEEN '$stime' And '$etime' )) ";
    $result = $conn->query($sql);
    if ($result->num_rows>0){
            $error[]= "This date & time is taken!";
    }
    else{
            $sql="INSERT INTO center(name,date,stime,etime,pamount,ramount,notes) 
            VALUES('$name','$date','$stime','$etime','$pamount','$ramount','$notes')";
            $conn->query($sql);
            $error[]= "This date is added!";

        }
    }
;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   
    <title>Add New</title>
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
    width: 90vw;
    height: 90vh;
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
			<img src="photo/edit1.svg">
		</div>
        <form action="" method="post">
            <!--<h3>Edit Information</h3>-->
            <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                        echo '<br>';
                    }
                }
            ?>
            <form action="#" method="post">
                
                Name: <input type="text" name="name" autocomplete="off" required ">

             <!--   <label for="date">Date:</label> -->
               Date: <input type="date" id="date" name="date" value="<?php echo $row['date']; ?>">

                
                Start Time: <input type="time" id=" start time" name="stime" autocomplete="off" required ">

               
                End Time: <input type="time" id="end time" name="etime" autocomplete="off" required">

                
                Paid Amount: <input type="number" id="paid" name="pamount" autocomplete="off" required ">

                
                remaining amount:<input type="number" id="paid" name="ramount" autocomplete="off" required ">

                
                Notes: <input type="text"  name="notes" autocomplete="off" required">
                
                 
                <input type="submit" name="submit" value="Add new" class="form-btn">
            </form>
        </form>
    </div>
</body>
</html>
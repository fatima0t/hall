<?php
include "dbconfig.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $stime = $_POST['stime'];
    $etime = $_POST['etime'];
    $hall = $_POST['hall'];
    $signInDateTime = date('Y-m-d H:i:s');

    $sql = "";
    if ($hall == "south") {
        $sql = "SELECT * FROM south WHERE (date= '$date') AND (( '$stime' BETWEEN stime AND etime ) 
        OR ( '$etime' BETWEEN stime AND etime ) 
        OR ( etime BETWEEN '$stime' AND '$etime' ) 
        OR ( etime BETWEEN '$stime' AND '$etime' ))";
    } elseif ($hall == "north") {
        $sql = "SELECT * FROM north WHERE (date= '$date') AND (( '$stime' BETWEEN stime AND etime ) 
        OR ( '$etime' BETWEEN stime AND etime ) 
        OR ( etime BETWEEN '$stime' AND '$etime' ) 
        OR ( etime BETWEEN '$stime' AND '$etime' ))";
    } elseif ($hall == "center") {
        $sql = "SELECT * FROM center WHERE (date= '$date') AND (( '$stime' BETWEEN stime AND etime ) 
        OR ( '$etime' BETWEEN stime AND etime ) 
        OR ( etime BETWEEN '$stime' AND '$etime' ) 
        OR ( etime BETWEEN '$stime' AND '$etime' ))";
    }

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $error[] = "This date & time is taken!";
    } else {
        $insert = "INSERT INTO requestguest(name,date,stime,etime,hall,reservetime) 
        VALUES('$name','$date','$stime','$etime','$hall','$signInDateTime')";
        $conn->query($insert);
        header('location:instruction.html');
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   
    <title>Add New</title>
    <style>

body {
  font-weight: bold;
  background-color: #cafcba;
}
        form {
    width: 400px;
    margin-top: 30px;
    margin-bottom: 100px;
    margin-right: 100px;
    margin-left: 0px;
    padding: 30px;
    border-radius: 30px;
    border: 3px solid black;
  }
  
  
  .container h1 {
    text-align: center;
    color: green;
  }
  
  .container input[type="text"],
  .container input[type="submit"],
  .container input[type="number"],
  .container input[type="time"],
  .container input[type="hall"],
  .container input[type="date"] {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    margin-bottom: 10px;
    border: 3px solid black;
    border-radius: 4px;
    box-sizing: border-box;
    font-weight: bold;
  }
  
  .container input[type="submit"] {
    background-color: #00e40b;
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
    width: 400px;
    margin-top: 10px;
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
    .instructions {
      background-color: #f4f4f4;
      border: 1px solid #ddd;
      padding: 20px;
      margin-bottom: 20px;
    }

    .instructions h3 {
      margin-top: 0;
    }

    .instructions ol {
      margin-left: 20px;
      padding-left: 0;
    }

    .instructions li {
      margin-bottom: 10px;
    }
  
     /* Form styles */
  .form-container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f1f1f1;
    border-radius: 8px;
  }

  /* Form field styles */
  .form-field {
    margin-bottom: 16px;
    position: relative;
  }

  .form-field label {
    display: block;
    font-weight: bold;
    margin-bottom: 8px;
  }

  /* Select element styles */
  .form-field select {
    width: 100%;
    font-size: 16px;
    padding: 8px 12px 8px 36px; /* Added padding for the icon */
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #fff;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    cursor: pointer;
  }

  .form-field select option {
    background-color: #fff;
    color: #333;
  }

  .form-field select option:hover {
    background-color: #f1f1f1;
  }

  /* Icon styles */
  .form-field::after {
    content: "\25BC"; /* Downward-facing triangle icon */
    position: absolute;
    top: 70%;
    right: 12px;
    transform: translateY(-50%);
    pointer-events: none; /* Allows click events to pass through the icon */
    color: #666;
  }
</style>

    

</head>
<body>
<div class="instructions">
    <h3>تعليمات</h3>
    <ol>
      <li>قم بعبئة النموذج الموجود بالأسفل</li>
      <li>عند الانهاء قم بالنقر على تقديم طلب</li>
      <li>في حالة التقديم لحجز قاعة محجوزة مسبقًا سيتم اعلامك بهذا</li>
      <li> يرجى العلم بأن هذا الطلب هو طلب شكلي لاعطاء الأولوية لمن يقوم بالحجز أولًا ولن يتم الموافقة عليه الا بعد زيارك مبنى البلدية وتأكيد حجزك </li>
    </ol>
  </div>
    <div class="container">

    <div class="img">
			<img src="photo/detail.svg">
		</div>
        
               
        <form action="" method="post">
        
        <!-- <h1>Add New</h1> -->
         <?php

             if(isset($error)){
                 foreach($error as $error){
                 echo '<span class="error-msg">'.$error.'</span>';
             };
         };
?>
        أدخل اسمك الرباعي: <input type="text" name="name"  required >
        <br>
        أدخل تاريخ الحجز: <input type="date" name="date" autocomplete="off" required lang="ar" >
        <br>
        أدخل وقت البداية: <input type="time" name="stime" autocomplete="off" required lang="ar">
        <br>
        أدخل وقت النهاية: <input type="time" name="etime" autocomplete="off" required lang="ar" >
         <br>
         <br>
         <!--اختر القاعة: -->  <div class="form-field">
        <label for="hall">اختر اسم القاعة</label> 
      <select name="hall" id="hall" required>
        <option value="">  </option>
        <option value="south">القاعة الجنوبية</option>
        <option value="north">القاعة الشمالية</option>
        <option value="center">القاعة الوسطى</option>
      </select>
    </div>         
<br>
         <input type="submit" name="submit" value="تقديم الطلب" class="form-btn">
    </div>
</body>
</html>
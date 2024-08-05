
<?php
include "dbconfig.php";

if(isset($_GET['removeid'])){

    $id=$_GET['removeid'];

    $sql= "UPDATE south SET `delete`='0' where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        
        header('location:south_hall.php');
    }
}


?>
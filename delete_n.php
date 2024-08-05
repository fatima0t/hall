
<?php
include "dbconfig.php";

if(isset($_GET['removeid'])){

    $id=$_GET['removeid'];

    $sql= "UPDATE north SET `delete`='0' where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        
        header('location:north_hall.php');
    }
}


?>
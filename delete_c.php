
<?php
include "dbconfig.php";

if(isset($_GET['removeid'])){

    $id=$_GET['removeid'];

    $sql= "UPDATE center SET `delete`='0' where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        
        header('location:center_hall.php');
    }
}


?>
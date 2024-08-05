
<?php
include "dbconfig.php";

if(isset($_GET['removeid'])){

    $id=$_GET['removeid'];

    $sql= "UPDATE  user_request SET `a/r`='0' where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        
        header('location:admin_page.php');
    }
}


?>
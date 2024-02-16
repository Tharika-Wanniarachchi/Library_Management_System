<?php

include 'connect.php';
if(isset($_GET['deleteid'])){
    $fine_id=$_GET['deleteid'];
    
    $sql="DELETE FROM fine WHERE fine_id='$fine_id'";
    $result=mysqli_query($con,$sql);
    if($result){
        header('location:index.php?delete_msg=The record you selected has been Deleted!');
    } else {
        header('location:index.php?delete_msg=Failed to delete the record!');
        exit(); // Stop execution
    }
}

?>
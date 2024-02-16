<?php

include 'connect.php';
if(isset($_GET['deleteid'])){
    $borrow_id=$_GET['deleteid'];

    $sql = "DELETE FROM bookborrower WHERE borrow_id='$borrow_id'";
    $result=mysqli_query($con,$sql);
    if($result){
        header('location:index.php?delete_msg=The record you selected has been Deleted!');
    }else{
        die(mysqli_error($con));
    }
}

?>
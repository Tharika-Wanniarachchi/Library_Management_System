<?php

include 'connect.php';

// Handle book deletion
if(isset($_GET['deleteid'])){
    $member_id=$_GET['deleteid'];

    $sql = "DELETE FROM member WHERE member_id='$member_id'";
    $result=mysqli_query($con,$sql);
    if($result){
        header('location:index.php?delete_msg=The record you selected has been Deleted!');
    }else{
        die(mysqli_error($con));
    }
}

?>
<?php
include 'connect.php';

if(isset($_GET['delete'])){
    $user_id = $_GET['delete'];

    $sql = "DELETE FROM user WHERE user_id = '$user_id'";
    $result = $conn->query($sql);

    if($result){
        header("Location: user_registration.php?delete_msg=The record you selected has been Deleted!");

    }else{
        header("location: user_registration.php?delete_msg=Failed to delete the record!");
        exit(); // Stop execution
    }

  

    
}
?>

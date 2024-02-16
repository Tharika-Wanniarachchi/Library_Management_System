<?php

include 'connect.php';

// Handle book deletion
if(isset($_GET['deleteid'])){
    $book_id=$_GET['deleteid'];

    $sql = "DELETE FROM book WHERE book_id='$book_id'";
    $result=mysqli_query($con,$sql);
    if($result){
        header('location:index.php?delete_msg=The record you selected has been Deleted!');
    } else {
        header('location:index.php?delete_msg=Failed to delete the record!');
        exit(); // Stop execution
    }
}
?>
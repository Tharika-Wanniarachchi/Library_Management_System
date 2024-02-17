<?php

include 'connect.php';

// Handle book deletion
if(isset($_GET['deleteid'])){
    $book_id=$_GET['deleteid'];

    // First, delete associated records from the bookborrower table
    $delete_bookborrower_sql = "DELETE FROM bookborrower WHERE book_id='$book_id'";
    $delete_bookborrower_result = mysqli_query($con, $delete_bookborrower_sql);

    if(!$delete_bookborrower_result) {
        header('location:index.php?delete_msg=Failed to delete associated book borrowers!');
        exit(); // Stop execution
    }

    // Next, delete associated fines
    $delete_fines_sql = "DELETE FROM fine WHERE book_id='$book_id'";
    $delete_fines_result = mysqli_query($con, $delete_fines_sql);

    if(!$delete_fines_result) {
        header('location:index.php?delete_msg=Failed to delete associated fines!');
        exit(); // Stop execution
    }

    // Now, delete the book record
    $delete_book_sql = "DELETE FROM book WHERE book_id='$book_id'";
    $delete_book_result = mysqli_query($con, $delete_book_sql);

    if($delete_book_result){
        header('location:index.php?delete_msg=The record you selected has been Deleted!');
    } else {
        header('location:index.php?delete_msg=Failed to delete the record!');
        exit(); // Stop execution
    }
}
?>

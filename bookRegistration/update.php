<?php

include 'connect.php';

$new_book_id = "";
$book_id = "";
$old_book_id = "";
$book_name = "";
$category_id ="";

// Fetching member details for update

if(isset($_GET['updateid'])){
    $book_id = $_GET['updateid'];
    $sql = "SELECT * FROM book WHERE book_id='$book_id'";
    $result = $con->query($sql);

    if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        $old_book_id = $row['book_id'];
        $book_name = $row['book_name'];
        $category_id = $row['category_id'];
        
    }
}



if(isset($_POST['submit'])) {
    $new_book_id = $_POST['new_book_id'];
    $book_name = $_POST['book_name'];
    $category_id = $_POST['category_id'];

    // Check if the new book ID already exists
    $check_sql = "SELECT COUNT(*) AS count FROM book WHERE book_id='$new_book_id'";
    $check_result = mysqli_query($con, $check_sql);
    $check_row = mysqli_fetch_assoc($check_result);
    if ($check_row['count'] > 0 && $new_book_id !== $old_book_id) {
        echo "<script>alert('Book ID already exists!');</script>";
    } else {
        $sql = "UPDATE book SET book_id='$new_book_id', book_name='$book_name', category_id='$category_id' WHERE book_id='$old_book_id'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            header('location:index.php?update_msg=Update Data Successfully');
            exit(); // Stop execution
        } else {
            header('location:update.php?updateid='.$book_id.'&update_msg=Failed to update data!');
            exit(); // Stop execution
        }
    }
}

?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="style.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Book Registration</title>
    </head>
    <body>   
        <div class="container my-5">
        <div class="card  my-5 p-5"  style="background:#9f9ee7a2;margin: 80px;">
            <div class="card-body">
                    <div class="card-header mb-5 pt-3" style="background:#1B1A55 ; color:white;">
                        <h2 class="text-center">Update Book Details</h2>
                    </div>
                <form method="post" onsubmit="return validateForm()">
                    <div class="form-group">
                        <label for="new_book_id">Book ID</label>
                        <input type="text" class="form-control mt-2" id="new_book_id" name="new_book_id"  value="<?php echo $old_book_id?>" placeholder="Enter Book ID" autocomplete="off" >
                    </div>
                    <div class="form-group mt-4">
                        <label for="book_name">Book Name</label>
                        <input type="book_name" class="form-control mt-2" id="book_name" name="book_name" value="<?php echo $book_name?>"  placeholder="Enter Book Name" autocomplete="off">
                    </div>
                    <div class="form-group mt-4">
                        <label for="category_id">Book Category</label>
                        <select name="category_id" class="form-control">
                            <option  value="-1">-select-</option>
                                <?php
                                    $sql = "SELECT category_id, category_Name FROM bookcategory";
                                    $result = $con->query($sql);

                                    if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                    
                                ?>

                                    <option value="<?php echo $row['category_id'] ?>" <?php if($row['category_id'] == $category_id) echo 'selected="selected"'; ?>>
                                        <?php echo $row['category_Name']?>
                                    </option>


                                    <?php

                                    }
                                    } else {
                                    echo "0 results";
                                    }
                            
                                    ?>

                        </select>
                    </div>

                    <div class="form-group">
                    <button type="submit" class="btn btn-success mt-4 me-2 btn_text" name="submit" id="submit" >Update</button>
                    <button type="button" class="btn btn-warning mt-4 btn_text" onclick="closeForm()">Close</button>
                    </div>
                </form>
            </div>
        </div>
            
        </div>


    <!--Boostrap Jquery-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!--Boostrap Javascript-->
  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   


    <script>
         function validateForm() {
            // Get input values
            var bookId = document.getElementById("new_book_id").value;
            var bookName = document.getElementById("book_name").value;
            var categoryId = document.getElementsByName("category_id").value;
            
            // Check if any field is empty
            if (bookId === "" || bookName === "" || categoryId === "-1") {
                alert("Please fill in all fields");
                return false;
            }
             // Validate Book ID format using a regular expression
             var bookIdRegex = /^B\d{3}$/;
            if (!bookIdRegex.test(bookId)) {
                alert("Invalid Book ID format. It should be in the 'B<BOOK_ID>' format (e.g., F001).");
                return false;
            }


            return true;
        }
        function closeForm() {
            
            alert("Form closed!");
            window.location.href ='index.php';
        }
    </script>



    </body>
</html>
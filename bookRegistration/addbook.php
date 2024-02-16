<?php

include 'connect.php';


if(isset($_POST['submit'])){
    $book_id =$_POST['book_id'];
    $book_name =$_POST['book_name'];
    $category_id =$_POST['category_id'];

    // Check if the book_id already exists in the database
    $check_query = "SELECT * FROM book WHERE book_id = '$book_id'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Book with the same book_id already exists
        echo '<script>alert("Book with the same ID already exists!");</script>';
    } else {
        // Insert the new book record
        $sql = "INSERT INTO book (book_id, book_name, category_id) VALUES ('$book_id', '$book_name', '$category_id')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            header('location:index.php?success_msg=Your entered Book data has been successfully saved!');
        }  else {
            header('location:add_book.php?add_msg=Failed to add the book!');
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
            <div class="card my-5 p-5" style="background:#9f9ee7a2; margin: 80px;">
                <div class="card-body">
                    <div class="card-header mb-5 pt-3"style="background:#1B1A55 ; color:white;">
                        <h2 class="text-center">Add New Book</h2>
                    </div>
                    <form method="post"  onsubmit="return validateForm()">
                        <div class="form-group">
                            <label for="book_id">Book ID</label>
                            <input type="text" class="form-control mt-2" id="book_id" name="book_id" placeholder="Enter Book ID(eg.B001)" autocomplete="off">
                        </div>
                        <div class="form-group mt-4">
                            <label for="book_name">Book Name</label>
                            <input type="text" class="form-control mt-2" id="book_name" name="book_name" placeholder="Enter Book Name" autocomplete="off">
                        </div>
                        <div class="form-group mt-4">
                            <label for="category_id">Book Category</label>
                            <select name="category_id" class="form-control mt-2">
                                <option value="-1">-Select Book Category-</option>
                            <?php
                                $sql = "SELECT category_id, category_Name FROM bookcategory";
                                $result = $con->query($sql);

                                if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                
                            ?>

                                <option value="<?php echo $row['category_id'] ?>"><?php echo $row['category_Name']?></option>

                                <?php

                                }
                                } else {
                                echo "0 results";
                                }
                        
                        ?>

                            </select>

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-dark me-2 mt-4" name="submit" id="submit" >Add Book</button>
                            <button type="button" class="btn btn-warning  mt-4" onclick="closeForm()">Close</button>
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
            var bookId = document.getElementById("book_id").value;
            var bookName = document.getElementById("book_name").value;
            var categoryId = document.getElementsByName("category_id")[0].value;

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
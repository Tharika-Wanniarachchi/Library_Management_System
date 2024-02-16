<?php

include 'connect.php';


if(isset($_POST['submit'])){
    $category_id=$_POST['category_id'];
    $category_Name=$_POST['category_Name'];
    $date_modified=$_POST['date_modified'];

    // Check if the category_already exists in the database
    $check_query = "SELECT * FROM bookcategory WHERE category_id = '$category_id'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Book with the same category_book_id already exists
        echo '<script>alert("BookCategory with the same ID already exists!");</script>';
    } else {
        // Insert the new book record
        $sql = "INSERT INTO bookcategory (category_id, category_Name, date_modified) VALUES ('$category_id', '$category_Name', '$date_modified')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            header('location:index.php?success_msg=Your entered data has been successfully saved!');
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
    <title>Assign Fine</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container my-5">
        <div class="card my-5 p-5" style="background:#9f9ee7a2;">
            <div class="card-body">
                <div class="card-header mb-5 p-4" style="background:#1B1A55; color:white;">
                    <h2 class="text-center">Add Book Category  </h2>
                </div>
                <form method="post" action="" onsubmit="return validateForm()">
                    <div class="form-group">
                        <label for="category_id">Category ID</label>
                        <input type="text" class="form-control mt-2" id="category_id" name="category_id" placeholder="Enter Category ID (e.g., C001)" autocomplete="off">
                    </div>
                    <div class="form-group mt-4">
                        <label for="category_Name">Category Name</label>
                        <input type="text" class="form-control mt-2" id="category_Name" name="category_Name" placeholder="Enter Category Name" autocomplete="off">
                    </div>
                    <div class="form-group mt-4">
                        <label for="date_modified">Category Date Modified</label>
                        <input type="datetime-local" class="form-control" id="date_modified" name="date_modified" value="<?php echo date('Y-m-d\TH:i'); ?>" autocomplete="on"> 
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark me-2 mt-4" name="submit" id="submit">Add Category</button>
                        <button type="button" class="btn btn-warning mt-4" onclick="closeForm()">Back</button>
                    </div>                                               
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+2vx2KPScO2L8Lw5VW49pJfNOQIkFwJ8JwCz3Z6" crossorigin="anonymous"></script>

    <script>
        function validateForm() {
            var categoryId = document.getElementById("category_id").value.trim();
            var category_Name = document.getElementById("category_Name").value.trim();
            var dateModified = document.getElementById("date_modified").value.trim();

            if (categoryId === "" || category_Name === "" || dateModified === "") {
                alert("Please fill in all fields");
                return false;
            }

            var categoryIDRegex = /^C\d{3}$/;
            if (!categoryIDRegex.test(categoryId)) {
                alert("Invalid Category ID format. It should be in the 'C<CATEGORY_ID>' format (e.g., C001).");
                return false;
            }
        }

        function closeForm() {
            alert("Back to the Home page!");
            window.location.href ='index.php';
        }
    </script>
</body>
</html>

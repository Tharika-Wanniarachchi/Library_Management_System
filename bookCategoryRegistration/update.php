<?php

include 'connect.php';

$new_category_id = "";
$old_category_id ="";
$category_id ="";
$date_modified="";
$category_Name="";

// Fetching member details for update
if(isset($_GET['updateid'])){
    $category_id = $_GET['updateid'];
    $sql = "SELECT * FROM bookcategory WHERE category_id='$category_id'";
    $result = $con->query($sql);

    if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        $old_category_id = $row['category_id'];
        $category_Name = $row['category_Name'];
        $date_modified = $row['date_modified'];
    }
}

if(isset($_POST['submit'])) {
    $new_category_id = $_POST['category_id'];
    $category_Name = $_POST['category_Name'];
    $date_modified = $_POST['date_modified'];

    // Check if the new bookcategory ID already exists
    $check_sql = "SELECT COUNT(*) AS count FROM bookcategory WHERE category_id='$new_category_id'";
    $check_result = mysqli_query($con, $check_sql);
    $check_row = mysqli_fetch_assoc($check_result);

    if ($check_row['count'] > 0 && $new_category_id !== $old_category_id) {
        echo "<script>alert('Bookcategory ID already exists!');</script>";
    } else {
        $sql = "UPDATE bookcategory SET category_id='$new_category_id', category_Name='$category_Name', date_modified='$date_modified' WHERE category_id='$old_category_id'";
        $result = mysqli_query($con, $sql);

        if ($result) {
            header('location:index.php?update_msg=Update Data Successfully');
            exit(); // Stop execution
        } else {
            header('location:update.php?updateid='.$category_id.'&update_msg=Failed to update data!');
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
        <div class="card my-5 p-5" style="background:#9f9ee7a2;">
            <div class="card-body">
                <div class="card-header mb-5 p-4" style="background:#1B1A55; color:white;">
                    <h2 class="text-center"> Update Book Category</h2>
                </div>
                <form method="post" action="" onsubmit="return validateForm()">
                    <div class="form-group">
                        <label for="category_id">Category ID</label>
                        <input type="text" class="form-control mt-2" id="category_id" name="category_id" value="<?php echo $old_category_id?>" placeholder="Enter Category ID (e.g., C001)" autocomplete="off">
                    </div>
                    <div class="form-group mt-4">
                        <label for="category_Name">Category Name</label>
                        <input type="text" class="form-control mt-2" id="category_Name" name="category_Name"  value="<?php echo $category_Name?>"placeholder="Enter Category Name" autocomplete="off">
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

    <!--Boostrap Jquery-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!--Boostrap Javascript-->
  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   


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
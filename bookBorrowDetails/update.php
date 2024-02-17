<?php
include 'connect.php';

// Check if 'updateid' parameter exists
if(isset($_GET['updateid'])) {
    $borrow_id = $_GET['updateid'];

    // Fetch borrower data only if updateid parameter is provided
    $sql = "SELECT * FROM bookborrower WHERE borrow_id='$borrow_id'";
    $result = mysqli_query($con, $sql);

    // Check if a row is returned
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $borrow_id = $row['borrow_id'];
        $book_id = $row['book_id'];
        $member_id = $row['member_id'];
        $borrow_status = $row['borrow_status'];
        $date_modified = $row['borrower_date_modified'];
    } else {
        // Handle the case where borrow_id doesn't exist
        echo "Borrower not found!";
        exit; // Stop further execution
    }
} else {
    // Handle the case where 'updateid' parameter is missing
    echo "Update ID parameter is missing!";
    exit; // Stop further execution
}


if(isset($_POST['submit'])){
    $borrow_id = $_POST['borrow_id'];
    $book_id = $_POST['book_id'];
    $member_id = $_POST['member_id'];
    $borrow_status = $_POST['borrow_status'];
    $date_modified = $_POST['date_modified'];

    // Check if the member_id exists in the member table
    $check_member_query = "SELECT * FROM member WHERE member_id = '$member_id'";
    $check_member_result = mysqli_query($con, $check_member_query);

    if (mysqli_num_rows($check_member_result) > 0) {
        
        
        // Check if the borrow_id already exists in the bookborrower table
        $check_borrow_query = "SELECT * FROM bookborrower WHERE borrow_id = '$borrow_id'";
        $check_borrow_result = mysqli_query($con, $check_borrow_query);

        if (mysqli_num_rows($check_borrow_result) > 0) {
            echo '<script>alert("Borrow ID already exists in the bookborrower table.");</script>';
        } else {
           
            // Validate Borrow ID format using regular expressions
            if (!preg_match("/^BR\d{3}$/", $borrow_id)) {
                echo '<script>alert("Invalid Borrow ID format. It should be in the \'BR<BORROW_ID>\' format (e.g., BR001)");</script>';
            } else {
                // Check if the book_id already exists in the book table
                $check_book_query = "SELECT * FROM book WHERE book_id = '$book_id'";
                $check_book_result = mysqli_query($con, $check_book_query);

                if (mysqli_num_rows($check_book_result) > 0) {
                    // Book ID already exists, proceed with insertion
                    $sql = "INSERT INTO bookborrower (borrow_id, book_id, member_id, borrow_status, borrower_date_modified) VALUES ('$borrow_id', '$book_id', '$member_id', '$borrow_status', '$date_modified')";
                    $result = mysqli_query($con, $sql);

                    if ($result) {
                        header('location:index.php?update_msg=Update Data Successfully');
                    } else {
                        die(mysqli_error($con));
                    }
                } else {
                    // Book ID does not exist
                    echo '<script>alert("Book ID does not exist in the book table.");</script>';
                }
            }
        }
    } else {
        // Member with the given member_id does not exist
        echo '<script>alert("Invalid member_id. The member_id does not exist in the member table.");</script>';
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

    <title>Update Book Borrower Details</title>
    </head>
    <body>   
        <div class="container my-5">
        <div class="card  my-5 p-5"  style="background:#9f9ee7a2; margin: 80px;"   >
            <div class="card-body">
                    <div class="card-header mb-5 pt-3" style="background:#1B1A55 ; color:white;">
                        <h2 class="text-center" >Update Book Borrower Details</h2>
                    </div>
                <form method="post" onsubmit="return validateForm()">
                <div class="form-group">
                        <label for="borrow_id">Borrow ID</label>
                        <input type="text" class="form-control mt-2" id="borrow_id" name="borrow_id" placeholder="Enter Book ID(eg.BR001)" autocomplete="off" value=<?php echo $borrow_id; ?>>
                    </div><br>
                    <div class="form-group">
                        <label for="book_id">Book ID</label>
                        <input type="text" class="form-control mt-2" id="book_id" name="book_id" placeholder="Enter Book ID(eg.B001)" autocomplete="off" value=<?php echo $book_id; ?>>
                    </div><br>
                    <div class="form-group">
                        <label for="member_id">Member Id</label>
                        <input type="text" class="form-control mt-2" id="member_id" name="member_id" placeholder="Enter Book ID(eg.B001)" autocomplete="off" value=<?php echo $member_id; ?> readonly>
                    </div><br>
                    <div class="form-group">
                        <label for="borrow_status">Borrow Status </label>
                        <select name="borrow_status" id="borrow_status" style="width:100%; height:40px; padding-left:5px;">
                            <option value="available"<?php if ($borrow_status == 'available') echo ' selected'; ?>>available</option>
                            <option value="borrowed"<?php if ($borrow_status == 'borrowed') echo ' selected'; ?>>borrowed</option>
                        </select> 
                    </div><br>

                    <div class="form-group">
                        <label for="date_modified">Date Modified</label>
                        <input type="datetime-local" class="form-control" id="date_modified" name="date_modified" value="<?php echo date('Y-m-d\TH:i'); ?>" autocomplete="on"> 
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
        var borrowId = document.getElementById("borrow_id").value;
        var bookId = document.getElementById("book_id").value;
        var memberId = document.getElementById("member_id").value;
        var borrowStatus = document.getElementById("borrow_status").value;
        var dateModified = document.getElementById("date_modified").value;

        // Checking if any fields are empty
        if (borrowId === "" || bookId === "" || memberId === "" || borrowStatus === "" || dateModified === "") {
            alert("Please fill in all fields");
            return false;
        }

        // Validating Borrow ID format using regular expressions
        var borrowIdRegex = /^BR\d{3}$/;
        if (!borrowIdRegex.test(borrowId)) {
            alert("Invalid Borrow ID format. It should be in the 'BR<BORROW_ID>' format (e.g., BR001)");
            return false;
        }

        // Validating Book ID format using regular expressions
        var bookIdRegex = /^B\d{3}$/;
        if (!bookIdRegex.test(bookId)) {
            alert("Invalid Book ID format. It should be in the 'B<BOOK_ID>' format (e.g., B001)");
            return false;
        }

        // Validating Member ID format using regular expressions
        var memberIdRegex = /^M\d{3}$/;
        if (!memberIdRegex.test(memberId)) {
            alert("Invalid Member ID format. It should be in the 'M<MEMBER_ID>' format (e.g., M001)");
            return false;
        }

        // All validations passed
        return true;
    }

    function closeForm() {
        alert("Back to the Home page!");
        window.location.href = 'index.php';
    }
    function redirectToUpdatePage() {
        window.location.href = 'update.php?updateid=<?php echo $borrow_id; ?>';
    }
</script>


    </body>
</html>
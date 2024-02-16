<?php
include 'connect.php';

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
                        header('location:index.php?success_msg=Your entered Book data has been successfully saved!');
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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book Borrow</title>
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <div class="card my-5 p-5"   style="background:#9f9ee7a2; margin: 80px;"  >
        <div  class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-secondary my-3"><a href="../loginAndUser/homeInterface.php" class="text-light btn_text">Back to home</a></button>
                </div>
            <div class="card-body" >
                <div class="card-header mb-5 pt-3" >
                <div class="card-header mb-5 pt-3" style="background:#1B1A55 ; color:white;">
                        <h2 class="text-center" >Add Book Borrower Details</h2>
                    </div>

                <form onsubmit="return validateform()" method="post">
                    <div class="form-group">
                        <label for="borrow_id">Borrow ID</label>
                        <input type="text" class="form-control mt-2" id="borrow_id" name="borrow_id" placeholder="Enter Book ID(eg.BR001)" autocomplete="off">
                    </div><br>
                    <div class="form-group">
                        <label for="book_id">Book ID</label>
                        <input type="text" class="form-control mt-2" id="book_id" name="book_id" placeholder="Enter Book ID(eg.B001)" autocomplete="off">
                    </div><br>
                    <div class="form-group">
                        <label for="member_id">Member Id</label>
                        <input type="text" class="form-control mt-2" id="member_id" name="member_id" placeholder="Enter Member ID(eg.M001)" autocomplete="off">
                    </div><br>
                    <div class="form-group">
                        <label for="borrow_status">Borrow Status </label>
                        <select name="borrow_status" id="borrow_status" style="width:100%; height:40px; padding-left:5px;">
                            <option value="available" default > available </option>
                            <option value="borrowed"> borrowed </option>
                        </select> 
                    </div><br>
                    <div class="form-group ">
                        <label for="date_modified">Date Modified</label>
                        <input type="datetime-local" class="form-control" id="date_modified" name="date_modified" value="<?php echo date('Y-m-d\TH:i'); ?>" autocomplete="on"> 
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-dark me-2 mt-4" name="submit" id="submit">Add Borrower</button>
                        <button type="button" align_button="right" class="btn btn-warning  mt-4" onclick="closeForm()">Back</button>
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
    function validateform() {
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
</script>

</body>
</html>
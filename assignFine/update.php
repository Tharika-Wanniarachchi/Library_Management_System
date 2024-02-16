
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="style.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">

    <title>Update Fine</title>
</head>

<body>
    <div class="container my-5">
        <div class="card  my-5 p-5"style="background:#9f9ee7a2;margin: 80px;">
            <div class="card-body">
                <div class="card-header mb-5 pt-3" style="background:#1B1A55 ; color:white;">
                    <h2 class="text-center">Update Fine Details</h2>
                </div>

                <form action="update.php" method="POST" onsubmit="return validateForm()">
                    <div class="form-group mt-4">
                        <label for="fine_id">Fine ID: </label>
                        <input type="text" class="form-control" placeholder="Enter Fine ID (e.g., F001)"  name="fine_id" id="fine_id" readonly value="<?php echo $fine_id; ?>"  autocomplete='off' >
                    </div>

                    <div class="form-group mt-4">
                        <label for="book_id">Book ID: </label>
                        <input type="text" class="form-control" placeholder="Enter Book ID (e.g., B001)" name="book_id" id="book_id" readonly value="<?php echo $book_id; ?>"  autocomplete='off' readonly>
                    </div>

                    <div class="form-group mt-4">
                        <label for="member_id">Member ID: </label>
                        <input type="text" class="form-control" placeholder="Enter Member ID (e.g., M001)"name="member_id" id="member_id" value="<?php echo $member_id; ?>"  autocomplete='off'>
                    </div>

                    <div class="form-group mt-4">
                        <label for="fine_amount">Fine Amount (LKR): </label>
                        <input type="text" class="form-control" placeholder="Enter Fine Amount" name="fine_amount"id="fine_amount" value="<?php echo $fine_amount; ?>"  autocomplete='off'>
                    </div>

                    <div class="form-group mt-4">
                            <label for="fine_date_modified">Fine Date Modified</label>
                            <input type="datetime-local" class="form-control" id="fine_date_modified" name="fine_date_modified" value="<?php echo date('Y-m-d\TH:i'); ?>" autocomplete="on"> 
                        </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-dark me-2 mt-4" name="update" id="update">Update Fine</button>
                        <button type="button" class="btn btn-warning  mt-4" onclick="closeForm()">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Boostrap Jquery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!--Boostrap Javascript-->
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

   
</body>

</html>

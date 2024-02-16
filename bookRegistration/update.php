



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
                        <input type="text" class="form-control mt-2" id="new_book_id" name="new_book_id"   placeholder="Enter Book ID" autocomplete="off" >
                    </div>
                    <div class="form-group mt-4">
                        <label for="book_name">Book Name</label>
                        <input type="book_name" class="form-control mt-2" id="book_name" name="book_name"   placeholder="Enter Book Name" autocomplete="off">
                    </div>
                    <div class="form-group mt-4">
                        <label for="category_id">Book Category</label>
                        <select name="category_id" class="form-control">
                            <option  value="-1">-select-</option>
                                

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
   


   



    </body>
</html>
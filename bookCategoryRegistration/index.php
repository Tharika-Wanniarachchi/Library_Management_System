<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book Category</title>

    <link rel="stylesheet" href="style.css">
     <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    
</head>
<body style="font-family:poppins">
<div class="container">
        <div class="card my-3 px-3" style="background:#9f9ee7a2;">
                <div  class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-secondary my-3"><a href="../loginAndUser/homeInterface.php" class="text-light btn_text">Back to home</a></button>
                </div>
            <div class="card-body">
                <div class="card-header" style="background:#1B1A55 ; color:white;" >
                    <h1 class="text-center">Add Book Category<img class="mx-5" src="../img/category.png" alt="addcategory" width="60px" height=""></h1>
                </div>
                <button class="btn btn-dark mt-5 "><a href="addcategory.php" class="text-light btn_text"><a href="addcategory.php" class="text-light btn_text"><img src="../img/category.png" alt="addbook"  width="20px"> Add Book Category</a></button>

                <center>
                <div class="my-3" style="color:green; font-size: 18px; font-weight: 500;">
                    
                </div>
                <div class="my-3" style="color:rgb(118, 7, 7);  font-size: 18px; font-weight: 500;">
                    
                </div>

                <div class="my-3" style="color:green; font-size: 18px; font-weight: 500;">
                    
                </div>

                </center>
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th class="p-3" scope="col">Category ID</th>
                            <th class="p-3"scope="col">Category Name</th>
                            <th class="p-3"scope="col">Date Modified </th>
                            <th class="p-3"scope="col">Operation </th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                </table>
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
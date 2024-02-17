<?php
    include 'connect.php';
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Registration</title>

    <link rel="stylesheet" href="style.css">
     <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<div class="container">
        <div class="card my-5 p-5" style="background:#9f9ee7a2;">
                <div  class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-secondary my-3"><a href="../loginAndUser/homeInterface.php" class="text-light btn_text btn_back">Back to home</a></button>
                </div>
            <div class="card-body">
                <div class="card-header"style="background:#1B1A55 ; color:white;">
                    <h1 class="text-center">Book Registration<img src="../img/bookreg.png" alt="bookreg" width="90px" height=""></h1>
                </div>
                
                <button class="btn btn-dark mt-5 "><a href="addbook.php" class="text-light btn_text"><img src="../img/addbook.png" alt="addbook"  width="30px"> Add New Book</a></button>
                <center>
                <div class="my-3" style="color:green; font-size: 18px; font-weight: 500;">
                    <?php
                        if(isset($_GET['update_msg'])){
                            $display_msg=$_GET['update_msg'];
                            echo $display_msg;
                        }
                    ?>
                </div>
                <div class="my-3" style="color:rgb(118, 7, 7);  font-size: 18px; font-weight: 500;">
                    <?php
                        if(isset($_GET['delete_msg'])){
                            $display_msg=$_GET['delete_msg'];
                            echo $display_msg;
                        }
                    ?>
                </div>

                <div class="my-3" style="color:green; font-size: 18px; font-weight: 500;">
                    <?php
                        if(isset($_GET['success_msg'])){
                            $display_msg=$_GET['success_msg'];
                            echo $display_msg;
                        }
                    ?>
                </div>

              
                </center>
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                        <th scope="col">Book ID</th>
                        <th scope="col">Book Name</th>
                        <th scope="col">Book Category</th>
                        <th scope="col">Operation</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                            $sql = "SELECT * from book ";
                            $result=mysqli_query($con,$sql);
                            if($result){
                                while($row =mysqli_fetch_assoc($result)){
                                    $book_id=$row['book_id'];
                                    $book_name=$row['book_name'];
                                    $category_id=$row['category_id'];
                                    echo '<tr>
                                    <td scope="row">'.$book_id.'</td>
                                    <td>'.$book_name.'</td>
                                    <td>'.$category_id.'</td>
                                    
                                    <td>
                                        <button class="btn btn-success" onclick="updatedata()"><a href="update.php? updateid='.$book_id.'"class="text-light btn_text">Update</a></button>
                                        <button class="btn btn-danger" onclick="deletedata()"><a href="delete.php? deleteid='.$book_id.'"class="text-light btn_text">Delete</a></button>
                                    </td>
                                    </tr>';
                                }
                            }
                        ?>
                                    
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

<script>
         function deletedata() {
            
            alert("Are You Sure Delete Data?");
            window.location.href ='index.php';
        }
        function updatedata() {
            
            alert("Are You Sure Update Data?");
            window.location.href ='update.php';
        }
    </script>
</body>
</html>
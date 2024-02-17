<?php
    include 'connect.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign fine</title>

    <link rel="stylesheet" href="style.css">
     <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    
</head>
<body>

    <div class="container">
        <div class="card my-3 px-3" style="background:#9f9ee7a2;">
                <div  class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-secondary my-3"><a href="../loginAndUser/homeInterface.php" class="text-light btn_text">Back to home</a></button>
                </div>
            <div class="card-body">
                <div class="card-header" style="background:#1B1A55 ; color:white;" >
                    <h1 class="text-center">Assign Fine For a User<img class="mx-5" src="../img/assign-white.png" alt="bookreg" width="60px" height=""></h1>
                </div>
                <button class="btn btn-dark mt-5 "><a href="addbook.php" class="text-light btn_text"><a href="assignfine.php" class="text-light btn_text"><img src="../img/assign-white.png" alt="addbook"  width="20px"> Assign Fine</a></button>

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
                            <th class="p-3" scope="col">Fine ID</th>
                            <th class="p-3"scope="col">Member ID</th>
                            <th class="p-3"scope="col">Member Name</th>
                            <th class="p-3"scope="col">Book name related to relevant fine</th>
                            <th class="p-3"scope="col">Fine amount in LKR</th>
                            <th class="p-3"scope="col">Date Modified </th>
                            <th class="p-3"scope="col">Operation </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                            $sql = "SELECT fine.fine_id, member.member_id, member.first_name, book.book_name, fine.fine_amount, fine.fine_date_modified
                            FROM fine
                            INNER JOIN member ON fine.member_id = member.member_id
                            INNER JOIN book ON fine.book_id = book.book_id";


                            $result=mysqli_query($con,$sql);
                            if($result){
                                while($row =mysqli_fetch_assoc($result)){
                                    $fine_id = $row['fine_id'];
                                    $member_id = $row['member_id'];
                                    $first_name = $row['first_name'];
                                    $book_name = $row['book_name'];
                                    $fine_amount = $row['fine_amount'];
                                    $fine_date_modified = $row['fine_date_modified'];
                                    
                                    echo '<tr>
                                    <th scope="row">'.$fine_id.'</th>
                                    <td>'.$member_id.'</td>
                                    <td>'.$first_name.'</td>
                                    <td>'.$book_name.'</td>
                                    <td>'.$fine_amount.'</td>
                                    <td>'.$fine_date_modified.'</td>

                                    <td>
                                        <button class="btn btn-success" onclick="updatedata()"><a href="update.php? updateid='.$fine_id.'"class="text-light btn_text">Update</a></button>
                                        <button class="btn btn-danger" onclick="deletedata()"><a href="delete.php? deleteid='.$fine_id.'"class="text-light btn_text">Delete</a></button>
                                    </td>
                                    </tr>';

                                }
                            } else{
                                // Handle SQL query error
                                echo "Error: " . mysqli_error($con);
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

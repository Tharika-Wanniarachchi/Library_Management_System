<?php
    include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Borrow Details</title>
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container"><br><br>
        <div class="card my p-5" style="background:#9f9ee7a2; margin: 80px;">
        <div  class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-secondary my-3"><a href="../loginAndUser/homeInterface.php" class="text-light btn_text">Back to home</a></button>
                </div>
            <div class="card-body">
                <div class="card-header">
                    <h1 class="text-center py-2" style="background:#1B1A55 ; color:white;">Book Borrow Details <img src="../img/borrow-book-white.png" alt="" width="90px" srcset=""></h1>
                </div>

                <button class="btn btn-dark my-5"><a href="add-book-borrow.php" class="text-light btn_text" target="_blank"><img src="../img/borrow-book-white.png" alt="borrowingbook" width="30px"> Add New Borrower</a></button>
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
                            <th scope="col">Borrow ID</th>
                            <th scope="col">Book ID</th>
                            <th scope="col">Member ID</th>
                            <th scope="col">Borrow Status</th>
                            <th scope="col">Modified Date</th>
                            <th scope="col">Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM bookborrower" ;
                            $result = mysqli_query($con,$sql);
                            if($result){
                                while($row = mysqli_fetch_assoc($result)){
                                    $borrow_id =$row['borrow_id'];
                                    $book_id =$row['book_id'];
                                    $member_id =$row['member_id'];
                                    $borrow_status = $row['borrow_status'];
                                    $date_modified = $row['borrower_date_modified'];
                                    echo '<tr>
                                    <th scope="row">'.$borrow_id.'</th>
                                    <td>' .$book_id.'</td>
                                    <td>'.$member_id.'</td>
                                    <td>'.$borrow_status.'</td>
                                    <td>'.$date_modified.'</td>
                                    
                                    <td>
                                    <button class="btn btn-success" onclick="updatedata()"><a href="update.php? updateid='.$borrow_id.'"class="text-light btn_text">Update</a></button>
                                    <button class="btn btn-danger" onclick="deletedata()"><a href="delete.php? deleteid='.$borrow_id.'"class="text-light btn_text">Delete</a></button>
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
        function updatedata(){
            alert("Are You Sure Update Data?");
            window.location.href = 'index.php';
        }
        
    </script>
</body>
</html>
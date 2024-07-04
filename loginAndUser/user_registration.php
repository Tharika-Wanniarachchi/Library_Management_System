<?php
include 'connect.php'; 

session_start();

$sql = "SELECT * FROM user";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
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

    <title>Home</title>
</head>
<body>
      

 <div class="container">
        <div class="card my-5 p-5" style="background:#9f9ee7a2;">
                <div  class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-secondary my-3"><a href="homeInterface.php" class="text-light btn_text btn_back">Back to home</a></button>
                </div>
            <div class="card-body">
                <div class="card-header"style="background:#1B1A55 ; color:white;">
                    <h1 class="text-center">User Registration<img src="../img/member.png" alt="userreg" width="80px" height=""></h1>
                </div>
                
                <button class="btn btn-dark my-5 "><a href="adduser.php" class="text-light btn_text"><img src="../img/member.png" alt="adduser"  width="30px"> Add New User</a></button>
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
                                <th scope="col">User ID</th>
                                <th scope="col">Firstname</th>
                                <th scope="col">Lastname</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th> 
                                <th scope="col">Operation</th>                  
                            </tr>
                        </thead>
                <tbody>

                        <?php
                            if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['user_id'] . "</td>";
                            echo "<td>" . $row['first_name'] . "</td>";
                            echo "<td>" . $row['last_name'] . "</td>";
                            echo "<td>" . $row['username'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                         ?> 
                          
                          <td>
                            <button class="btn btn-success"><a href="update.php?updateid=<?php echo $row['user_id']; ?>" class="text-light btn_text">Update</a></button>
                            <a href="delete.php?delete=<?php echo $row['user_id']; ?>"><button class="btn btn-danger me-2 btn_text">Delete</button></a> <!-- Delete button -->
                        </td>

                         
                         <?php               
                            echo "</tr>";
                            }
                            } else {
                                echo "<tr><td colspan='6'>No users found</td></tr>";
                                }
                        ?>

                    </tbody>
                </table> 
             </div>
        </div>
    </div>  
                        
                    
</body>
</html>



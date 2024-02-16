<?php
include 'connect.php';

if(isset($_POST['submit'])){
    $user_id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    
    // Hash the password using bcrypt
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the user_id exists in the user table
    $check_user_query = "SELECT * FROM user WHERE user_id = '$user_id'";
    $check_user_result = mysqli_query($conn, $check_user_query);

    if (mysqli_num_rows($check_user_result) > 0) {
        // User with the same user_id already exists
        echo '<script>alert("The User ID already exists!");</script>';
    } else {
        // Check if the username already exists
        $check_username_query = "SELECT * FROM user WHERE username = '$username'";
        $check_username_result = mysqli_query($conn, $check_username_query);

        if (mysqli_num_rows($check_username_result) > 0) {
            // Username already exists
            echo '<script>alert("The username is already taken!");</script>';
        } else {
            // Check if the email already exists
            $check_email_query = "SELECT * FROM user WHERE email = '$email'";
            $check_email_result = mysqli_query($conn, $check_email_query);

            if (mysqli_num_rows($check_email_result) > 0) {
                // Email already exists
                echo '<script>alert("The email is already registered!");</script>';
            } else {
                // Insert the new user record
                $sql = "INSERT INTO user (user_id, first_name, last_name, username, password, email) VALUES ('$user_id', '$first_name', '$last_name', '$username', '$hashed_password', '$email')";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    header('location: user_registration.php?success_msg=Data inserted successfully');
                } else {
                    die(mysqli_error($conn));
                }
            }
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adduser</title>
    <!-- Required meta tags -->
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="style.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">
</head>
<body>
<div class="container my-5">
            <div class="card my-5 p-5"style="background:#9f9ee7a2; margin: 80px;">
                <div class="card-body" >
                <div class="card-header mb-5 p-4">
                    <div class="card-header mb-5 p-4" style="background:#1B1A55 ; color:white;">
                        <h2 class="text-center">Add New User</h2>
                    </div>
                    <form method="post"  onsubmit="return validateForm()">
                        <div class="form-group">
                        <div class="form-group">
                            <label for="user_id">User ID</label>
                            <input type="text" class="form-control mt-2" id="user_id" name="user_id" placeholder="Enter User ID (e.g., U001)" autocomplete="off">
                        </div>                        
                        <div class="form-group mt-4">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control mt-2" id="first_name" name="first_name" placeholder="Enter First Name" autocomplete="off">
                        </div>
                        <div class="form-group mt-4">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control mt-2" id="last_name" name="last_name" placeholder="Enter Last Name" autocomplete="off">
                        </div>
                        <div class="form-group mt-4">
                            <label for="username">User Name</label>
                            <input type="text" class="form-control mt-2" id="username" name="username" placeholder="Enter User Name" autocomplete="off">
                        </div>
                        <div class="form-group mt-4">
                            <label for="password">Password</label>
                            <input type="password" class="form-control mt-2" id="password" name="password" placeholder="Enter your Password" autocomplete="off">
                        </div>
                        <div class="form-group mt-4">
                            <label for="email">Email</label>
                            <input type="email" class="form-control mt-2" id="email" name="email" placeholder="Enter your Email" autocomplete="off">
                        </div>
                        

                        <div class="form-group">
                            <button type="submit" class="btn btn-dark me-2 mt-4" name="submit" id="submit" >Add User</button>
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
    function validateForm() {
    // Get input values
    var user_id = document.getElementById("user_id").value.trim();
    var first_name = document.getElementById("first_name").value.trim();
    var last_name = document.getElementById("last_name").value.trim();
    var username = document.getElementById("username").value.trim();
    var password = document.getElementById("password").value.trim();
    var email = document.getElementById("email").value.trim();

    // Check if any field is empty
    if (user_id === "" || first_name === "" || last_name === "" || username === "" || password === "" || email === "") {
        alert("Please fill in all fields");
        return false;
    }

    // Validate User ID format using a regular expression
    var user_idRegex = /^U\d{3}$/;
    if (!user_idRegex.test(user_id)) {
        alert("Invalid User ID format. It should be in the 'U<USER_ID>' format (e.g., U001).");
        return false;
    }

    // Password Length Validation
    if(password.length < 8) {
        alert("Password must be at least 8 characters long.");
        return false;
    }

    // Email Format Validation
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert("Invalid email format.");
        return false;
    }

    // Other validations can be added here if needed

    // If all validations pass, the form can be submitted
    return true;
}



    function closeForm() {
        
        alert("Back to the User page!");
        window.location.href ='user_registration.php';
    }
</script>
</body>
</html>
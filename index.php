<?php

session_start();

include './loginAndUser/connect.php'; 

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $stored_password = $row['password'];
        $loggin_username = $row['username'];
        if (password_verify($password, $stored_password)) {
            header("Location: ./loginAndUser/homeInterface.php");
            exit;
        } else {
            echo "<script>alert('Username and Password Incorrect!');</script>";
        }
    } else {
        echo "<script>alert('Username and Password Incorrect!');</script>";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login Page</title>
    <style>
        body {
            background: linear-gradient(to right, #01012a, #012870, #27036b);

        }

        .container-style {
            background: linear-gradient(to right, #7f7fd5, #86a8e7, #91c2f8);
            max-width: 800px !important;
            height: 500px;
            border-radius: 30px;
            padding-top: 7%;
            margin-top: 6%;
        }

        .lbl_style {
            color: rgb(12, 3, 72);
            font-size: 20px;
            font-weight: 500;

        }

        .r_lbl_style {
            color: rgb(12, 3, 72);
            font-size: 15px;

        }

        .h2_style {
            color: rgb(12, 3, 72);
            font-family: poppins;
            margin-top: 30px;
            margin-left: -130px;
        }

        .l_img {
            width: 150%;
            margin-left: -120px;
        }

        .input-box {
            background: #ffffff63 !important;
            width: 250px!important;
        }
        .login_btn{
            background: #010159!important;
            color: white!important;
            font-weight: 500;
            width: 250px;
        }
        

    </style>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>
        <div class="container justify-content-center container-style">
            <div class="row justify-content-center">

                <div class="col-4">
                    <div class="text-center">
                        <h2 class="h2_style">Login LMS</h2>
                        <img src="./img/main.png" alt="main" class="l_img">
                    </div>
                </div>
                <div class="col-4">
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label lbl_style">Username:</label>
                                <input type="text" class="form-control input-box" id="username" name="username" required autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label lbl_style">Password:</label>
                                <input type="password" class="form-control input-box" id="password" name="password" required autocomplete="off">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me">
                                <label class="form-check-label  r_lbl_style" for="remember_me">Remember me</label>
                            </div>
                            <button id="login" name="login" type="submit" class="btn btn btn-block login_btn">Login</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
            crossorigin="anonymous"></script>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>

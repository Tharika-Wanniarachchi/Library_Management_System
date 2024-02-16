
<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit;
}

include 'connect.php'; 
?>

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

    <title>Library Management System</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #f0f0f0;
            padding: 20px;
            align-items: center;
        }
        .navbar ul {
            list-style-type: none;
            padding: 0;
        }
        .navbar li {
            margin-bottom: 10px;
        }
        .navbar li a {
            color: #333;
            text-decoration: none;
            display: block;
            padding: 10px;
        }
        .navbar li a:hover {
            background-color: #ddd;
        }
       
        .ui_a{
            background: #1B1A55!important; 
            width:100%;
            margin: 8px;
            border-radius: 50px;
            padding: 15px!important;
            align-items: center!important;
            display: flex; /* Added to make align-items work */
            justify-content: center; /* Centers the text horizontally */
            text-align: center; /* Centers the text vertically */
            color: white; /* Set font color to white */
            text-decoration: none;
        }
        .ui_a:hover{
            background: #9f9ee7a2!important; 
            width:100%;
            margin: 5px;
            border-radius: 50px;
            color:#1B1A55!important;
            
        }
        .ui_a,li{
            color: white!important;
        }

    </style>
</head>



<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="navbar">
                        <nav class="navbar">
                            <img class="mb-4" src="../img/logo.png" alt="Logo" class="logo" style="width: 200px;  border-radius: 50%;border: 5px solid  #1B1A55; margin-left:10%;">
                            <ul>
                                <li><a href="user_registration.php"class="ui_a">User Registration</a></li>
                                <li><a href="../bookRegistration/index.php"class="ui_a">Books Registration</a></li>
                                <li><a href="../bookcategory/index.html"class="ui_a">Book Category Registration</a></li>
                                <li><a href="../libraryMemberRegistration/index.php"class="ui_a">Library Member Registration</a></li>
                                <li><a href="../bookBorrow/index.php"class="ui_a">Book Borrow Details</a></li>
                                <li><a href="../assignFine/index.php"class="ui_a">Assign Fine</a></li>
                            </ul>
                        </nav>
                    
                </div>
            </div>
            <div class="col-md-9">
                <div  class="d-grid gap-2 d-md-flex justify-content-md-end ">
                    <button class="btn btn-secondary my-3"><a href="index.php" class="text-light btn_text btn_back">Log Out</a></button>
                </div>
                <center><h1 style="color:#1B1A55; font-family:poppins; margin-top:50px;">Library Management System</h1></center>
                <img src="../img/main.png" alt="main">
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

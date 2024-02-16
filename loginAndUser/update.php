<?php
include 'connect.php';

$new_user_id = "";
$user_id = "";
$old_user_id = "";
$first_name = "";
$last_name ="";
$password ="";
$email ="";

// Fetching user details for update
if(isset($_GET['updateid'])){
    $user_id=$_GET['updateid'];
    $sql ="SELECT * FROM user WHERE user_id='$user_id'";
    $result = $conn->query($sql);

    if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        $old_user_id=$row['user_id'];
        $first_name=$row['first_name'];
        $last_name=$row['last_name'];
        $username=$row['username']; 
        $password=$row['password'];
        $email=$row['email'];
    }
}

if(isset($_POST['submit'])){
    $new_user_id = $_POST['new_user_id']; 
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username=$_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

     // Hash the password using bcrypt
     $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the new user ID is already exists
    $check_sql = "SELECT COUNT(*) AS count FROM user WHERE user_id='$new_user_id'";
    $check_result = mysqli_query($conn, $check_sql);
    $check_row = mysqli_fetch_assoc($check_result);

    if ($check_row['count'] > 0 && $new_user_id !== $old_user_id) {
        echo "<script>alert('User ID already exists!');</script>";
    } else {
        $sql = "UPDATE user SET user_id='$new_user_id', first_name='$first_name', last_name='$last_name',username='$username', password='$hashed_password', email='$email' WHERE user_id='$old_user_id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header('location:user_registration.php?update_msg=Update Data Successfully');
            exit(); // Stop execution
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn); // Error handling for database query
        }
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>User Registration</title>
</head>
<body>
<div class="container my-5">
    <div class="card  my-5 p-5" style="background:#9f9ee7a2;margin: 80px;">
        <div class="card-body">
            <div class="card-header mb-5 pt-3">
                <h2 class="text-center">Update User Details</h2>
            </div>
            <form method="post" onsubmit="return validateForm()">
                <div class="form-group">
                    <label for="new_user_id">User ID</label>
                    <input type="text" class="form-control mt-2" id="new_user_id" name="new_user_id" placeholder="Enter User ID eg: U001" autocomplete="off" value="<?php echo $old_user_id; ?>">
                </div>
                <div class="form-group mt-4">
                    <label for="first_name"> First Name</label>
                    <input type="text" class="form-control mt-2" id="first_name" name="first_name" placeholder="Enter First Name" autocomplete="off" value="<?php echo $first_name; ?>">
                </div>
                <div class="form-group mt-4">
                    <label for="last_name"> Last Name</label>
                    <input type="text" class="form-control mt-2" id="last_name" name="last_name" placeholder="Enter Last Name" autocomplete="off" value="<?php echo $last_name; ?>">
                </div>
                <div class="form-group mt-4">
                    <label for="username"> User Name</label>
                    <input type="text" class="form-control mt-2" id="username" name="username" placeholder="Enter username eg:t_supun" autocomplete="off" value="<?php echo $username; ?>">
                </div>
                <div class="form-group mt-4">
                    <label for="password"> Password</label>
                    <input type="password" class="form-control mt-2" id="password" name="password" placeholder="Enter Password" autocomplete="off">
                </div>
                <div class="form-group mt-4">
                    <label for="email">Email</label>
                    <input type="email" class="form-control mt-2" id="email" name="email" placeholder="Email eg: example@gmail.com" autocomplete="off" value="<?php echo $email; ?>">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success mt-4 me-2 btn_text" name="submit" id="submit" >Update</button>
                    <button type="button" class="btn btn-warning mt-4 btn_text" onclick="closeForm()">Back</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-eOJMYsd53ii+scO/bJGF2fwnUMJ78d2Kf5+2L+2rY8Oj8DGaVcT1niFQj0+pbJ1r" crossorigin="anonymous"></script>
<script>
function validateForm() {
    // Get input values
    var user_id = document.getElementById("new_user_id").value.trim();
    var first_name = document.getElementById("first_name").value.trim();
    var last_name = document.getElementById("last_name").value.trim();
    var password = document.getElementById("password").value.trim();
    var email = document.getElementById("email").value.trim();

    // Check if any field is empty
    if (user_id === "" || first_name === "" || last_name === "" || password === "" || email === "") {
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
    return true;
}

function closeForm() {
    alert("Form closed!");
    window.location.href ='user_registration.php';
}
</script>
</body>
</html>

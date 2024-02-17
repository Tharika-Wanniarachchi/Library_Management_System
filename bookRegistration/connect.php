<?php
$servername ="localhost";
$username ="root";
$password ="";
$database ="library_system";

//create connection
$con = new mysqli($servername,$username,$password,$database);

//check connection
if($con->connect_error){
    die("Connection Faild :" .$con->connect_error);
}  

?>
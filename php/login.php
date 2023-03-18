<?php

$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

$server = "localhost";
$username  = "root";
$password = "";
$dbname = "user_details";

$conn = mysqli_connect($server, $username, $password, $dbname);

if(!$conn){
    die("Connection failed: " .mysqli_connect_error());
}

$email = $_POST['email'];
$pass = $_POST['pass'];

$stmt = $conn->prepare("SELECT * FROM login WHERE email_id=? AND pass = ?");
$stmt->bind_param("ss",  $email, $pass);
$stmt->execute();

$result = mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($result) > 0){
    header('Location:../profile.html');
    exit();
}
else{
    echo "Invalid Username or Password";
}
?>
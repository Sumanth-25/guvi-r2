<?php

$servername = "localhost";
$username  = "root";
$password = "";
$dbname = "user_details";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$Name = $_POST['username'];
$Email = $_POST['email_id'];
$Password= $_POST['password'];


$stmt = $conn->prepare("INSERT INTO login(username, email_id, pass) VALUES(?, ?, ?)");
$stmt->bind_param("sss", $Name, $Email, $Password);
$stmt->execute();

$stmt->close();
$conn->close();

$bulk = new MongoDB\Driver\BulkWrite;
$client = new MongoDB\Driver\Manager("mongodb://127.0.0.1:27017");

$userData=[
    "_id" => new MongoDB\BSON\ObjectId,
    "firstname" => $_POST['firstname'],
    "lastname" => $_POST['lastname'],
    "mobile_number" => $_POST['mobile_number'],
    "country" => $_POST['country'],
    "state" => $_POST['state']
];
$bulk->insert($userData);

$result = $client->executeBulkWrite('profile_db.profile_collection',$bulk);
if($result->getInsertedCount()==1){
    echo $userData['_id'];
    header("Location: http://localhost/guvi-r2/login.html");
}else{
    echo'Failed';
}
exit();
?>
<?php
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
 
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
}else{
    echo'Failed';
}
    
?>
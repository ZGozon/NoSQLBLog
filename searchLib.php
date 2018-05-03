
<?php

$email = $_SESSION["email"];


$m = new MongoClient();
$db = $m->selectDB('blogProj');
$collection = new MongoCollection($db, 'users');

// search for user
$userQuery = array('Email Address' => $email);

$cursor = $collection->find($userQuery);

// $test = $cursor['_id'];
foreach ($cursor as $doc) {
    // var_dump($doc);
        // var_dump($doc['_id']);

$userId = $doc['_id'];
        
}

// search for produce that is sweet. Taste is a child of Details. 
// $sweetQuery = array('Details.Taste' => 'Sweet');
// echo "Sweet\n";
// $cursor = $collection->find($sweetQuery);
// foreach ($cursor as $doc) {
//     var_dump($doc);
// }

?>

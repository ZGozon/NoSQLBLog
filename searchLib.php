
<?php

$email = $_SESSION["email"];

$m = new MongoClient();
$db = $m->selectDB('blogProj');
$collection = new MongoCollection($db, 'users');

// search for user
$userQuery = array('Email Address' => $email);

$cursor = $collection->find($userQuery);

foreach ($cursor as $doc) {
    $userId = $doc['_id'];
}

?>

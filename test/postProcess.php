<?php
$m = new MongoClient();
$db = $m->blogProj;

// $value = "0";
// $newValue = str_pad($value,2,"0");
$post = array (
    'content' => $_POST['postContent'],
);

$db->postImages->insert($post);

?>

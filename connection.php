<?php
    try{
    $m = new MongoClient();
     //echo "Connection to database Successfull!";echo"<br />";
    $db = $m->blogProj;
    //echo "Databse loginreg selected";
    $users = $db->users; 
    $post_details = $db->post_details;
    $posts = $db->posts;
    //echo "Collection userdata Selected Successfully";
    }
    catch (Exception $e){
        die("Error. Couldn't connect to the server. Please Check");
    }
       if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
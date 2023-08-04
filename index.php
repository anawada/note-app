<?php

require 'functions.php';
//whenever you have a php file that only contains a class we use Capital letter 
require 'Database.php';
require 'router.php';


$id = $_GET['id'];
$query = "select * from post where id = ?";
//call the query method (method is a function inside a class) 
//(:: give you access to an static or a constant that was defined in a class)
$posts = $db->query($query, [$id])->fetch();

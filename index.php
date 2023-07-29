<?php

require 'functions.php';
// require 'router.php';
//whenever you have a php file that only contains a class we use Capital letter 
require 'Database.php';

//create a variable called config and make = to what is returned from this config file 
$config = require('config.php');

//create a new instance of the database class
$db = new Database($config['database']);
//call the query method (method is a function inside a class) 
//(:: give you access to an static or a constant that was defined in a class)
$posts = $db->query("select * from posts")->fetchAll();

//loop over to display the results
foreach ($posts as $post) {
    echo "<li>" . $post['title'] . "</li>";
}

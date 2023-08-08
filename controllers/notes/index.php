<?php

//create a variable called config and make = to what is returned from this config file 
$config = require base_path('config.php');
//create a new instance of the database class
$db = new Database($config['database']);

$notes = $db->query('select * from notes where user_id = 1')->get();

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
   ]);

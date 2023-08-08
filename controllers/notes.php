<?php

//create a variable called config and make = to what is returned from this config file 
$config = require('config.php');
//create a new instance of the database class
$db = new Database($config['database']);
$heading = 'My Notes';


$notes = $db->query('select * from notes where user_id = 1')->get();

require 'views/notes.view.php';

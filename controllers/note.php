<?php

//create a variable called config and make = to what is returned from this config file 
$config = require('config.php');
//create a new instance of the database class
$db = new Database($config['database']);
$heading = 'Note';

$notes = $db->query('select * from notes where user_id = :id', ['id' => $_GET['id']])->fetch();

require 'views/note.view.php';

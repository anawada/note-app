<?php
//create a variable called config and make = to what is returned from this config file 
$config = require('config.php');
//create a new instance of the database class
$db = new Database($config['database']);
$heading = 'Note';
$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']

])->findOrFail();

authorize($note['user_id'] === $currentUserId);

require 'views/notes/show.view.php';

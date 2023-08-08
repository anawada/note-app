<?php

require 'Validator.php';

$config = require('config.php');
$db = new Database($config['database']);

$heading = "Create Note";

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if(! Validator::string($_POST['note'], 1, 1000)){
        $errors['note'] = 'A note of no more than 1.000 characters is required';
    }

   

    if (empty($errors)){
        $db->query('INSERT INTO notes(note, user_id) VALUES(:note, :user_id)', [
            'note' => $_POST['note'],
            'user_id' => 1
        ]);
    }
}

require 'views/note-create.view.php';

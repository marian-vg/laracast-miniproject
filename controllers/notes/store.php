<?php

use \Core\Validator;
use \Core\Database;

$config = require base_path("config.php");
$db = new Database($config);

$errors = [];

//adding validation to the form
if (!Validator::string($_POST['body']))
{
    $errors['body'] = "A body of no more than 1000 characters is required.";
}

if (!empty($errors))
{
    return view("notes/create.view.php", [
    "heading" => "Create Note",
    "errors" => $errors
    ]);
}

$db->Query("INSERT INTO notes(body, user_id_fkey) VALUES (:body, :user_id_fkey)", [
        'body' => $_POST['body'],
        'user_id_fkey' => 1
]);

header("location: /notes");



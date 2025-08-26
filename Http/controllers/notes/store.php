<?php

use \Core\Validator;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

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

$db->Query("INSERT INTO notes(body, user_id) VALUES (:body, :user_id)", [
        'body' => $_POST['body'],
        'user_id' => 1
]);

header("location: /notes");



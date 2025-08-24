<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];


if(!Validator::email($email))
{
    $errors['email'] = "Please enter a valid email address.";
}

if(!Validator::string($password, 7, 255))
{
    $errors['password'] = "Please provide a valid password.";
}

if(!empty($errors))
{
    return view("session/create.view.php", [
        "errors" => $errors
    ]);
}

// match the credentials

$user = $db->Query("SELECT * FROM users WHERE email = :email", [
    'email' => $email
])->find();

if($user)
{
   if(password_verify($password, $user['password']))
    {    
        login([
            'email' => $user['email']
        ]);

        header("location: /");

        exit();
    }
}


return view("session/create.view.php", [
        'errors' => [
            'email' => 'No matching account for that email address and password.'
        ]
    ]);
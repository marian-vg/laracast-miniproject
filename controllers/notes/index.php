<?php

use Core\Database;

$config = require base_path("config.php");
$db = new Database($config);

$query = "SELECT * FROM notes WHERE user_id_fkey = 1";

$notes = $db->Query($query)->get();

view("notes/index.view.php", [
    "heading" => "My Notes",
    "notes" => $notes
]);
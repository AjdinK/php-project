<?php
$heading = "Create Note";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    dd('You submitted: '.$_POST['body']);
    dd($_POST);
}

require "views/note-create.view.php";
<?php
require "functions.php";
require "router.php";
require "Database.php";
require "config.php";

$config = require "config.php";

$db = new Database($config['database']);

$id = $_GET['id'];
//dd($_GET['id']);
$query = 'select * from posts where id = :id';
//dd($query);


//Single Post
//$post = $db->query($query, [':id' => $id])->fetch();
//dd($post['title']);


//All Posts
//$posts = $db->query("select * from posts")->fetchAll();
//foreach ($posts as $post) {
//    echo "<li>".$post['id'].' '.$post['title']."</li>";
//}

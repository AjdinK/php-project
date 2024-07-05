<?php
require "functions.php";
require "router.php";
require "Database.php";
require "config.php";

$config = require "config.php";

$db = new Database($config);

//Single Post
//$post = $db->query("select * from posts")->fetch(PDO::FETCH_ASSOC);
//dd($post['title']);


//All Posts
$posts = $db->query("select * from posts")->fetchAll();
foreach ($posts as $post) {
    echo "<li>".$post['id'].' '.$post['title']."</li>";
}

<?php

if(! $_SESSION['loggedin'])
{
    header("Location: /user-login");
}

$pageHeading = 'Your Post';

require 'Core/Database.php';

$db = new Database();

$post = $db->query("SELECT * FROM posts WHERE id = :id", [
    "id" => $_GET['id']
])->find();


require 'views/posts/my-post.view.php';

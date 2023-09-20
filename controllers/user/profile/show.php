<?php

if(! $_SESSION['loggedin'])
{
    header("Location: /user-login");
}

require 'Core/Database.php';

$db = new Database();

$user_id = $_GET['id'];

$user_info = $db->query("SELECT * FROM user_info WHERE user_id = :userId", [
    "userId" => $user_id
])->find();

$posts = $db->query("SELECT *, DATE_FORMAT(time, '%e %M %Y %l:%i %p') AS formatted_time FROM posts WHERE user_id = :userId ORDER BY time DESC", [
    "userId" => $user_id
])->fetchAll();


if(! $user_info)
{
    header("Location: /edit-profile?id=" . $_SESSION['loggedin']['id']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    session_destroy();
    header("Location: /user-logout");
}

require 'views/user/profile/show.view.php';
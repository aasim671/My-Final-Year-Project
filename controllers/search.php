<?php

require 'Core/Database.php';

$db = new Database();

if(isset($_POST['search-button']))
{
    $posts = $db->query("SELECT *, DATE_FORMAT(time, '%e %M %Y %l:%i %p') AS formatted_time
    FROM posts
    WHERE laptop_name LIKE :search", [
        'search' => '%' . $_POST['search'] . '%'
    ])->fetchAll();
}

require 'views/search.view.php';
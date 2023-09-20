<?php

$pageHeading = 'Details';

require 'Core/Database.php';

$db = new Database();

$post = $db->query("SELECT *
FROM posts p
JOIN user_info ui ON p.user_id = ui.user_id
JOIN users u ON p.user_id = u.id
WHERE p.id = {$_GET['id']};
")->find();
    

require 'views/posts/post-show.view.php';
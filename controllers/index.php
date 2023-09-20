<?php

$pageHeading = "Sell And Buy Laptops's";

require 'Core/Database.php';

$db = new Database();

$posts = $db->query("SELECT *, DATE_FORMAT(time, '%e %M %Y %l:%i %p') AS formatted_time FROM posts ORDER BY time DESC")->fetchAll();

require 'views/index.view.php';

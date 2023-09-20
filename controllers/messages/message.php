<?php

$pageHeading = 'Send Message';

require 'Core/Database.php';
$db = new Database();

if(! $_SESSION['loggedin']['id'])
{
    header("Location: /user-login");
    exit();
}

$user_info = $db->query("SELECT * FROM user_info WHERE user_id = :userId", [
    "userId" => $_GET['user_id']
])->find();


if(isset($_POST['submit']))
{
    
    $db->query("INSERT INTO `messages` ( `sender_id`, `receiver_id`, `message`, `sent_at`, `created_by`) VALUES (:senderId, :receiverId, :message, current_timestamp(), :createdBy);",
    [        
        'senderId' => $_SESSION['loggedin']['id'],        
        'receiverId' => $_GET['user_id'],        
        'message' => $_POST['message'],
        'createdBy' => $_SESSION['loggedin']['id'],
    ]);

}

$messages = $db->query("SELECT * FROM messages
WHERE (sender_id = :senderId AND receiver_id = :receiverId)
OR (sender_id = {$_GET['user_id']} AND receiver_id = {$_SESSION['loggedin']['id']})
ORDER BY sent_at ASC;", [

    'senderId' => $_SESSION['loggedin']['id'],
    'receiverId' => $_GET['user_id']

])->fetchAll();


require 'views/messages/message.view.php';

<?php

    require base_path('/Core/Database.php');
    $db = new Database();

    $userId = $_SESSION['loggedin']['id'];

    // Selecting those users who messaged each other,one sided or both sided
    $users = $db->query("SELECT u.*
    FROM users u
    JOIN messages m ON u.id = CASE
        WHEN m.sender_id = $userId THEN m.receiver_id
        WHEN m.receiver_id = $userId THEN m.sender_id
    END
    WHERE u.id != $userId
    GROUP BY u.id"
    )->fetchAll();

    /**
     * Checking for when clicks on 
     * specific user to fetch messages 
     * of selected user.
     */
    if(isset($_POST['submit'])) 
    {
        $messages = $db->query("SELECT * FROM messages
        WHERE (sender_id = :senderId AND receiver_id = :receiverId)
        OR (sender_id = {$_POST['user-id']} AND receiver_id = {$_SESSION['loggedin']['id']})
        ORDER BY sent_at ASC;", [

        'senderId' => $_SESSION['loggedin']['id'],
        'receiverId' => $_POST['user-id']

        ])->fetchAll();

        $user = $db->query("SELECT * from users WHERE id = :id", [
            "id" => $_POST['user-id']
        ])->find();

        $user_name = $user['user_name'];
        
    }

    $error_message = [];

    if(isset($_POST['message']))
    {
        if($_POST['receiver-id'] == 0)
        {
            $error_message['error'] = 'Please select user';
        }else
        {
            $db->query("INSERT INTO `messages` ( `sender_id`, `receiver_id`, `message`, `sent_at`, `created_by`) VALUES (:senderId, :receiverId, :message, current_timestamp(), :createdBy);",
            [        
                'senderId' => $_SESSION['loggedin']['id'],        
                'receiverId' => $_POST['receiver-id'],        
                'message' => $_POST['message-body'],
                'createdBy' => $_SESSION['loggedin']['id'],
            ]);

            $messages = $db->query("SELECT * FROM messages
            WHERE (sender_id = :senderId AND receiver_id = :receiverId)
            OR (sender_id = {$_POST['receiver-id']} AND receiver_id = {$_SESSION['loggedin']['id']})
            ORDER BY sent_at ASC;", [

            'senderId' => $_SESSION['loggedin']['id'],
            'receiverId' => $_POST['receiver-id']

            ])->fetchAll();

            $user = $db->query("SELECT * from users WHERE id = :id", [
                "id" => $_POST['receiver-id']
            ])->find();

            $user_name = $user['user_name'];
            
        }

        

    }
  

require 'views/messages/chats.view.php';
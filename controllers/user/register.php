<?php


require 'Core/Database.php';
require 'Core/Validator.php';

$db = new Database();
$validator = new Validator();

$name_error = [];
$email_error = [];
$password_error = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){ 

    $user_name = $_POST['userName'];
    $user_email = $_POST['userEmail'];
    $user_password = $_POST['userPassword'];

    $name = trim($user_name);
    $password = trim($user_password);

    if(! $validator::validString($name, 3, 15) ){
        $name_error['name'] = 'Name Should 3 to 15 characters long';
    }

    if(strlen($password) < 8){
        $password_error['password'] = "Password must be 8 characters long";
    }
    
    if($validator::validEmail($user_email) === false){
        $email_error['email'] = 'Invalid Email';
    }

    if(empty($name_error) && empty($email_error) && empty($password_error)){

        $email = $db->query("SELECT * FROM users WHERE user_email = :email",[
            'email' => $user_email
        ])->find();

        if( !$email)
        {        
            $db->query("INSERT INTO `users` (`user_name`, `user_email`, `user_password`) VALUES (:name, :email, :password);", [
                'name' => $user_name,
                'email' => $user_email,
                'password' => $user_password
            ]);

            header('Location: /user-register/success');
            exit();

        }else
        {
            $email_error['email'] = 'Email alreday exists';
        }

    }
    

}


require base_path('/views/user/register.view.php');
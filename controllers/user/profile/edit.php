<?php

$pageHeading = 'Complete Your Profile';

require base_path('/Core/Validator.php');
require base_path('/Core/Database.php');

  $db = new Database();
  $validator = new Validator();

  if(! isset($_SESSION['loggedin'])){
    header("Location: /");
  }

  $user_id = $_GET['id'];

  // User Authentication

  $user_info = $db->query("SELECT * FROM user_info WHERE user_id = :userId", [
    "userId" => $user_id
  ])->find();

  // User Auth Completed

  $name_error = [];
  $email_error = [];
  $address_error = [];
  $phone_error = [];

  if($_SERVER['REQUEST_METHOD'] === 'POST')
  {
    if(! $validator::validString($_POST['name'], 3, 15)){
      $name_error['name'] = 'Name should be 3 to 10 characters long';
    }
    if($validator::validEmail($_POST['email']) === false){
      $email_error['email'] = 'Invalid Email';
    }

    if(strlen($_POST['address']) < 10 || strlen($_POST['address']) > 50){
      $address_error['address'] = 'Address must be 10 to 50 character long';
    }

    if(! $validator::validPhone($_POST['phone'], 11)){
      $phone_error['phone'] = 'Pakistan numbers accepted without hyphen';
    }

    $validation_completed = checkConditions($name_error, $email_error, $address_error, $phone_error);

    if($validation_completed)
    {

      $user_id_exists = $db->query("SELECT * FROM `user_info` WHERE user_id = :userId", [
        "userId" => $user_id
      ])->find();

      /**
       * If user_id doesnot exits it will create a user_info record
       * else it will simply update the existed one.
       * 
       * if-else
       * 
       **/

      if(!$user_id_exists){
        
        $db->query("INSERT INTO `user_info` (`user_name`, `user_email`, `user_address`, `user_city`, `user_phone`, `user_gender`, `user_id`) VALUES (:name, :email, :address, :city, :phone, :gender, :userId);",[
        
          "name" => $_POST['name'],
          "email" => $_POST['email'],
          "address" => $_POST['address'],
          "city" => $_POST['city'],
          "phone" => $_POST['phone'],
          "gender" => $_POST['gender'],
          "userId" => $user_id,

        ]);

        $created_alert = true;

      }else{

        $db->query("UPDATE `user_info` SET `user_name` = :name, `user_email` = :email, `user_address` = :address, `user_city` = :city, `user_phone` = :phone, `user_gender` = :gender WHERE `id` = :infoId;", [

          "infoId" => $user_id_exists['id'],
          "name" => $_POST['name'],
          "email" => $_POST['email'],
          "address" => $_POST['address'],
          "city" => $_POST['city'],
          "phone" => $_POST['phone'],
          "gender" => $_POST['gender']

        ]);

        $updated_alert = true;

      }
      

    }

  }

  /**
   * this user is used for edit.view.php 
   * to autocomplete some existing fields like
   * 
   * name & email
   */
  $user = $db->query("SELECT * FROM users WHERE id = :id", [

    "id" => $user_id

  ])->find();

   

  require 'views/user/profile/edit.view.php';

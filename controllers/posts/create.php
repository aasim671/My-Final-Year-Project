<?php

if(! $_SESSION['loggedin'])
{
    header("Location: /user-login");
}

$pageHeading = 'Sell Your Laptop';

require 'Core/Validator.php';
require 'Core/Database.php';

$db = new Database();
$validator = new Validator();

$complete_profile = $db->query("SELECT * FROM user_info WHERE user_id = :userId", [
    "userId" => $_SESSION['loggedin']['id']
])->find();

if(! $complete_profile)
{
    header("Location: /edit-profile?id=" . $_SESSION['loggedin']['id']);
}

$name_error = [];
$price_error = [];
$description_error = [];
$location_error = [];
$phone_error = [];
$photo_error = [];

if($_SERVER['REQUEST_METHOD'] === 'POST')
{

    if(! $validator::validString($_POST['laptop-name'], 5, 30)){
        $name_error['name'] = "Name should 5 to 30 characters long.";
    }

    if(! $validator::validDigits($_POST['laptop-price'], 3, 6)){
        $price_error['price'] = "Price must be between thousands & lakhs.";
    }

    if(! $validator::validDescription($_POST['laptop-description'])){
        $description_error['details'] = 'Provide proper details for better approach.';
    }

    if(! $validator::validString($_POST['laptop-location'], 10, 150)){
        $location_error['location'] = "Provide proper location.";
    }

    if(! $validator::validPhone($_POST['user-phone'])){
        $phone_error['phone'] = 'Pakistani numbers accepted only.';
    }

    $file = $_FILES['laptop-photo'];
    $file_name = $file['name'];

    if(! $validator::isValidImage($file_name)){
        $photo_error['photo'] = 'Only PNG, JPG, JPEG files alowed';
    } 

    $validation_completed = checkConditions($name_error, $price_error, $description_error, $location_error, $phone_error, $photo_error);
        
    if($validation_completed)
    {

        $db->query("INSERT INTO `posts` (`laptop_name`, `laptop_price`, `laptop_detail`, `laptop_condition`, `laptop_location`, `user_phone`, `laptop_photo`, `user_id`, `time`) VALUES (:name, :price, :detail, :condition, :location, :phone, :photo, :userId, CURRENT_TIMESTAMP())", [

            "name" => $_POST['laptop-name'],
            "price" => $_POST['laptop-price'],
            "detail" => $_POST['laptop-description'],
            "condition" => $_POST['laptop-condition'],
            "location" => $_POST['laptop-location'],
            "phone" => $_POST['user-phone'],
            "photo" => $file_name,
            "userId" => $_GET['id'],
        ]);

        // Uploading image to src/posts folder.

        $temp_path = $file['tmp_name'];
        $upload_path = 'src/posts/' . $file_name;

        move_uploaded_file($temp_path, $upload_path);

        $post_created = true;
        
    }
    
}

require 'views/posts/create.view.php';
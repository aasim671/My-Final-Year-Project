<?php

// handy dandy function for inspecting

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    
    die();
}

// For Including Files

function base_path($path)
{
    return BASE_PATH . $path;
}

// Url checking 

function isUrl($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

/**
 * Function that accepts parameters depends on arguments.
 * Checks the arguments if all the arguments(array) are empty 
 * return true.
 */

function checkConditions(...$conditions) 
{

    foreach ($conditions as $condition) {
        if (!empty($condition)) {
            return false;
        }
    }
    
    return true;
}

/**
 * This function is used for hidding
 * the large amount of text
 * in the post details
 */

function limitDetails($string)
{

    $detail = $string;

    if(strlen($string) > 120) {
        
        $detail = substr($string, 0, 120);

        /**
         * strrpos function returns
         * the index(int) of the last occuring string
         * inside another string. 
         **/   
        $last_space = strrpos($detail, ' ');                
        /**
         * substr starts from 0 index 
         * of detail upto $last_space(117) chars 
         * and concatinating three dots.
         **/
        $detail = substr($detail, 0, $last_space) . '•••';
    } 

    return $detail;

}

function textWrap($text)
{
    $wrapped_text = wordwrap($text, 50, "<br>");

    return $wrapped_text;
}
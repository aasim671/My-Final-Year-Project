<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = require('routes.php');


function routeToController($uri,$routes)
{

    if(array_key_exists($uri,$routes)){

        require $routes[$uri];
    
    }else{
    
        abort(404);
    
    }
}

function abort($code){

    http_response_code(401);

    require "views/{$code}.view.php";
}

routeToController($uri,$routes);
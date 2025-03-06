<?php

require 'functions.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// if ($uri === '/') {
//     require 'controllers/index.php';
// } else if ($uri === '/about') {
//     require 'controllers/about.php';
// } else if ($uri === '/contact') {
//     require 'controllers/contact.php';
// }

// associative array
$routes = [

    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',

];

function abort($code)
{
    http_response_code($code);


    require 'views/{$code}.php';

    die();
}

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    abort(404);
}

<?php
session_start();
// requiring db connection
require_once "config/db.php"; 

spl_autoload_register(function ($class) {
    $paths = [
        'app/controllers/' . $class . '.php',
        'app/models/' . $class . '.php'
    ];
    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
});

// parsing "page" query param: 
$page = $_GET['page'] ?? 'home';  // also defaulting to home if none given. 

list($controllerName, $action) = explode('/', $page.'/index'); // $page.index can be "user/login/index" or user/index either way we are only tracking the first two ... 

$controllerClass = ucfirst($controllerName)."Controller"; // user => UserController etc. 

$action = $action ?: "index"; 


if (class_exists($controllerClass) && method_exists($controllerClass, $action)) {
    $controller = new $controllerClass();
    $controller->$action();
} else {
    die("Page not found");
}
  
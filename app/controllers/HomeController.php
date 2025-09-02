<?php 

class HomeController {
    private $pdo;

    public function __construct() {
        global $pdo; // Access PDO from config/db.php
        $this->pdo = $pdo;
    }

    public function index() {


        $request = new Blog($this->pdo);
        $response = $request->getAll(); 

        if ($response['success']) {
            $posts = $response['data']; 
            $data = ['title' => 'Welcome to User Blog',  "posts" =>$posts];
            $this->render('home', $data);
            exit;
        } else {
            $data = ['title' => 'ERR Create Your Blog'];
            $this->render('index', $data);
        }

        // $data = ['title' => 'Welcome to User Blog', 
                 
        //         ];
        // $this->render('home', $data);
    }

   

    private function render($view, $data = []) {
        extract($data); // converts ass.arr. into variables.
        $contentPath = dirname(__DIR__, 2) . '/app/views/' . $view . '.php'; // we are setting here which file we intend to load. 
        if (file_exists($contentPath)) {
            require_once dirname(__DIR__, 2) . '/app/views/layouts/layout.php'; // question::: i need to load this.. but how am i passing contentpath to it?? answer::: the render remembers its scope and vairables in that scope like $title or $contentPath here. 
        } else {
            die("View file not found");
        }
    }
}
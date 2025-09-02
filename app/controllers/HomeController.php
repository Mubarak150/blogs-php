<?php 

class HomeController {
    public function index() {
        $data = ['title' => 'Welcome to User Blog', 
                 
                ];
        $this->render('home', $data);
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
<?php 

class BlogController {
    private $pdo;

    public function __construct() {
        global $pdo; // Access PDO from config/db.php
        $this->pdo = $pdo;
    }

    public function index() {
        $request = new Blog($this->pdo);
        $response = $request->getAll(); 

            if ($response['success']) {
                $blogs = $response['data']; 
                $data = ['title' => 'Create Your Blog', "table_title" => "blogs", "blogs" =>$blogs];
                $this->render('index', $data);
                exit;
            } else {
                $data = ['title' => 'Create Your Blog', "table_title" => "blogs"];
                $this->render('index', $data);
            }
        // $data = ['title' => 'Create Your Blog', "table_title" => "blogs"];
        // $this->render('index', $data);
    }
    
     public function add() {
        $data = ['title' => 'Create a New Blog'];
        $this->render('create', $data);
    }

    public function show() {
         $id = $_GET["id"]; 
        $blog = new Blog($this->pdo);
        $response = $blog->get($id); 

        if ($response['success']) {
            $blog = $response['data']; 
            $data = ['title' => 'Blog Detail View', "post" =>$blog];
            $this->render('show', $data);
            exit;
        } else {
            header('Location: /blogs/?page=blog/index');
        }
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $user_id = $_SESSION['user_id']; 
            if(!isset($user_id)){ // is user login?? 
                header('Location: /blogs/?page=user/login');
            }

            $title = $_POST['title'] ?? '';
            $description = $_POST['description'] ?? '';
            $isPublished = isset($_POST['isPublished']) ? true : false;
            $thumbnail = $_FILES['thumbnail'] ?? '';
            
            // Basic validation
            if (empty($title) || empty($description)) {
                die("All fields are required");
            }

            // Handle file upload
            $imagePath = null;
            if ($thumbnail && $thumbnail['error'] === UPLOAD_ERR_OK) {
                $uploadDir = 'public/uploads/';
                $imagePath = $uploadDir . uniqid() . '_' . basename($thumbnail['name']);
                if (!move_uploaded_file($thumbnail['tmp_name'], $imagePath)) {
                    die("Failed to upload image");
                }
            }

            // Save user
            $blog = new Blog($this->pdo);
            $response = $blog->create($title, $description, $user_id, $isPublished, $imagePath); 

            if ($response['success']) {
                $this->index(); 
                exit;
            } else {
                header('Location: /blogs/?page=blog/add');
            }
        }
    }

    public function edit() {
        $id = $_GET["id"]; 
        $blog = new Blog($this->pdo);
        $response = $blog->get($id); 

        if ($response['success']) {
            $blog = $response['data']; 
            $data = ['title' => 'Create Your Blog', "table_title" => "blogs", "blog" =>$blog];
            $this->render('edit', $data);
            exit;
        } else {
            header('Location: /blogs/?page=blog/index');
        }
    }

   public function update() {
        $id = $_GET["id"]; 
        $data = $_POST; 
        $data['isPublished'] = isset($_POST['isPublished']) ? true : false;

        // Handle thumbnail
        if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] === UPLOAD_ERR_OK) {
            // 1. Get current blog (so we can remove old image)
            $blogModel = new Blog($this->pdo);
            $currentBlog = $blogModel->get($id);

            // 2. Delete old thumbnail if it exists
            if (!empty($currentBlog['thumbnail']) && file_exists($currentBlog['thumbnail'])) {
                unlink($currentBlog['thumbnail']);
            }

            // 3. Upload new thumbnail
            $uploadDir = 'public/uploads/';
            $imagePath = $uploadDir . uniqid() . '_' . basename($_FILES['thumbnail']['name']);
            if (!move_uploaded_file($_FILES['thumbnail']['tmp_name'], $imagePath)) {
                die("Failed to upload image");
            }

            // 4. Set new image path into $data
            $data['thumbnail'] = $imagePath;
        }

        // Update blog with new data
        $blog = new Blog($this->pdo);
        $response = $blog->update($id, $data); 

        if ($response['success']) {
            $this->index(); 
            exit;
        } else {
            header('Location: /blogs/?page=blog/index');
        }
    }


    public function destroy () {
        $id = $_GET["id"]; 
        $blog = new Blog($this->pdo);
        $response = $blog->delete($id); 

        if ($response['success']) {
            $this->index(); 
            exit;
        } else {
            header('Location: /blogs/?page=blog/index');
        }
    }

    private function render($view, $data = []) {
        extract($data); // converts ass.arr. into variables.
        $contentPath = dirname(__DIR__, 2) . '/app/views/layouts/posts/' . $view . '.php'; // we are setting here which file we intend to load. 
        if (file_exists($contentPath)) {
            require_once dirname(__DIR__, 2) . '/app/views/layouts/layout.php'; // question::: i need to load this.. but how am i passing contentpath to it?? answer::: the render remembers its scope and vairables in that scope like $title or $contentPath here. 
        } else {
            die("View file not found");
        }
    }

    
}
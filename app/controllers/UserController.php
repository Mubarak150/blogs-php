<?php
class UserController {
    private $pdo;

    public function __construct() {
        global $pdo; // Access PDO from config/db.php
        $this->pdo = $pdo;
    }

    public function signup() {
        if(isset($_SESSION["user_id"])){
            header('Location: /blogs/'); 
        }
        else 
        {
            $data = ['title' => 'Sign Up'];
            $this->render('signup', $data);
        }
    }

     public function login() {
        if(isset($_SESSION["user_id"])){
            header('Location: /blogs/'); 
        }
        else 
        {
           $data = ['title' => 'Log In'];
            $this->render('login', $data); 
        }
    }

    public function logout () {
        session_destroy();
        header('Location: /blogs/?page=user/login'); 
    }

    public function authenticate() {
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $email=$_POST['email'] ?? ''; 
            $password = $_POST['password'] ?? "";
             
            if ( empty($email) || empty($password)) {
                die("All fields are required");
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                die("Invalid email format");
            }

            // searching for user... 
            $user = new User($this->pdo);
            $response = $user->get($email, $password); 

            // handling the response. 
            if ($response['success']) {
                
                // redirecting back to home... 
                header('Location: http://localhost/blogs/'); // head to the home page when login... 
                exit;
            } else {
                header('Location: http://localhost/blogs/?page=user/login');
            }


        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $profileImage = $_FILES['profile_image'] ?? null;

            // Basic validation
            if (empty($name) || empty($email) || empty($password)) {
                die("All fields are required");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                die("Invalid email format");
            }

            // Handle file upload
            $imagePath = null;
            if ($profileImage && $profileImage['error'] === UPLOAD_ERR_OK) {
                $uploadDir = 'public/uploads/';
                $imagePath = $uploadDir . uniqid() . '_' . basename($profileImage['name']);
                if (!move_uploaded_file($profileImage['tmp_name'], $imagePath)) {
                    die("Failed to upload image");
                }
            }

            // Save user
            $user = new User($this->pdo);
            $response = $user->create($name, $email, $password, $imagePath); 
            if ($response['success']) {
                header('Location: /blogs/?page=user/login');
                exit;
            } else {
                die($response['message']);
            }
        }
    }

    private function render($view, $data = []) {
        extract($data);
        $contentPath = dirname(__DIR__, 2) . '/app/views/' . $view . '.php';
        $layoutPath = dirname(__DIR__, 2) . '/app/views/layouts/layout.php';
        if (file_exists($contentPath) && file_exists($layoutPath)) {
            require_once $layoutPath;
        } else {
            die("View or layout file not found");
        }
    }
}
?>
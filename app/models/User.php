<?php
class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // public function create($name, $email, $password, $profileImage = null) {
    //     $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    //     $stmt = $this->pdo->prepare("INSERT INTO users (name, email, password, profile_image) VALUES (?, ?, ?, ?)");
    //     return $stmt->execute([$name, $email, $hashedPassword, $profileImage]);
    // }

    public function create($name, $email, $password, $profileImage = null) {
        // 1. Check if email already exists
        $stmt = $this->pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $existingUser = $stmt->fetch();

        if ($existingUser) {
            // Email already registered
            return [
                "success" => false,
                "message" => "This email is already in use."
            ];
        }

        // 2. Proceed with insert
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare(
            "INSERT INTO users (name, email, password, profile_image) VALUES (?, ?, ?, ?)"
        );
        $result = $stmt->execute([$name, $email, $hashedPassword, $profileImage]);

        if ($result) {
            return [
                'success' => true,
                'message' => 'User created successfully'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Failed to save user'
            ];
        }
    }

    public function get($email, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user) {
            // success... now match passowrds
        //    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
           if(password_verify($password, $user['password'])){

                // storin sessions: 
                $_SESSION['user_id'] = $user['id']; 
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $user['email'];

                // var_dump($_SESSION['user_id']); 

                return [
                    'success' => true,
                    'message' => 'User found with this email'
                ];
           }
        }

        return [
            'success' => false, 
            'message' => 'wrong credentials!!!'
        ];
    }

}
?>
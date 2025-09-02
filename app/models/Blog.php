<?php
class Blog {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($title, $description, $user_id, $isPublished = false, $thumbnail=null, ) {
        // 1. Check if email already exists
        $stmt = $this->pdo->prepare("SELECT id FROM posts WHERE title = ?");
        $stmt->execute([$title]);
        $existingPost = $stmt->fetch();

        if ($existingPost) {
            // psot already exists
            return [
                "success" => false,
                "message" => "This post is already present."
            ];
        }

        // 2. Proceed with insert
        $stmt = $this->pdo->prepare(
            "INSERT INTO posts (title, description, thumbnail, isPublished, user_id) VALUES (?, ?, ?, ?, ?)"
        );
        $result = $stmt->execute([$title, $description, $thumbnail, $isPublished, $user_id]);

        if ($result) {
            return [
                'success' => true,
                'message' => 'post created successfully'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Failed to create post'
            ];
        }
    }

     public function get($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->execute([$id]);
        $post = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($post) {
            return [
                'success' => true,
                'data' => $post,
                'message' => 'Post found.'
            ];
        }

        return [
            'success' => false, 
            'message' => 'No post found.'
        ];
    }

    public function getAll() {
        $stmt = $this->pdo->prepare("SELECT posts.*, users.name AS user_name
                                     FROM posts
                                     LEFT JOIN users ON posts.user_id = users.id;
                                  ");
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC); 

        if ($posts) {
            return [
                'success' => true,
                'data' => $posts,
                'message' => 'Post found.'
            ];
        }

        return [
            'success' => false, 
            'message' => 'No post found.'
        ];
    }

    public function update($id, $data) {
        // Only allow certain fields to be updated
        $allowedFields = ['title', 'description', 'isPublished', 'thumbnail', 'user_id'];
        $setParts = [];
        $values = [];

        foreach ($allowedFields as $field) {
            if (isset($data[$field])) {
                $setParts[] = "$field = ?";
                $values[] = $data[$field];
            }
        }

        if (empty($setParts)) {
            return [
                'success' => false,
                'message' => 'No valid fields provided for update.'
            ];
        }

        $values[] = $id; // last one is for WHERE
        $sql = "UPDATE posts SET " . implode(", ", $setParts) . " WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);

        if ($stmt->execute($values)) {
            return [
                'success' => true,
                'message' => 'Post updated successfully.'
            ];
        }

        return [
            'success' => false,
            'message' => 'Failed to update post.'
        ];
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM posts WHERE id = ?");
        $success = $stmt->execute([$id]);

        if ($success && $stmt->rowCount() > 0) {
            return [
                'success' => true,
                'message' => 'Post deleted successfully!'
            ];
        }

        return [
            'success' => false,
            'message' => 'No post found or you are not authorized to delete this post!'
        ];
    }




}
?>
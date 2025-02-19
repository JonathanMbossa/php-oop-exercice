<?php

require_once 'Database.php';

class CommentController {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function postComment($blogId, $data) {
        $sql = "INSERT INTO comments (blog_id, content, user_id) VALUES (:blog_id, :content, :user_id)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['blog_id' => $blogId, 'content' => $data['content'], 'user_id' => $data['user_id']]);
    }
}
<?php

require_once __DIR__ . '/AbstractController.php';

class BlogController extends AbstractController {
    public function listBlogs() {
        $sql = "SELECT * FROM blogs";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readBlog($id) {
        $sql = "SELECT * FROM blogs WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createBlog($data) {
        $sql = "INSERT INTO blogs (title, content, user_id) VALUES (:title, :content, :user_id)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['title' => $data['title'], 'content' => $data['content'], 'user_id' => $data['user_id']]);
    }

    public function listUserBlogs($userId) {
        $sql = "SELECT * FROM blogs WHERE user_id = :user_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
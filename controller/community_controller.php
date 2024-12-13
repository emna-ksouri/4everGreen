<?php
include_once 'model/posts_model.php';

class PostController {
    private $postModel;

    public function __construct() {
        $this->postModel = new PostModel();
    }

    public function getAllPosts() {
        return $this->postModel->getAllPosts();
    }

    public function addPost($author, $text) {
        // You might want to perform some validation here before adding the post
        return $this->postModel->addPost($author, $text);
    }
}
?>

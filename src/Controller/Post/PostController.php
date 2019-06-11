<?php

namespace App\Controller\Post;

class PostController
{
    public function show($id)
    {
        echo "Je suis l'article $id";
    }

    public function updatePostAction()
    {

        $updatePost = new updateThePost();
        $update = $updatePost->updateThePost();
        require '../src/view/modifier_Post.php';

    }

    public function deletePostAction()
    {

        require '../src/view/delete_Post.php';
    }

}

<?php

namespace App\Controller\Post;

use App\Model\Manager\PostManager;

class ListePostController
{
    public function listePostAction()
    {
        $postManagerChapitres = new PostManager();
        $posts = $postManagerChapitres->getPost2();
        require '../src/view/listePost.php';
    }
}

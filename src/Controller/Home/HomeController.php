<?php

namespace App\Controller\Home;

use App\Model\Manager\PostManager;

class HomeController
{
    public function homePageAction()
    {
        $postManager = new PostManager();
        $posts = $postManager->getPost1();
        require '../src/view/home.php';
    }
}
//HomeController::homePageAction()

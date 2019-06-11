<?php

namespace App\Controller\Home;

use App\Model\Manager\PostManager;

class ChapitreController
{
    public function chapitrePageAction()
    {
        $ChapterByPage = new PostManager();
        $post = $ChapterByPage->getPostsByPage($_POST['page'] ?? 1);
        require '../src/view/chapter.php';
    }
}

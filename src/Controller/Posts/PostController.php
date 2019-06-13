<?php


namespace App\Controller\Posts;

use Core\Controller\AbstractController;
use App\Model\Manager\PostManager;

class PostController extends AbstractController
{
    //Pagination des page Acceuil(homepage) et chapitres.
    //------------------------------------------
    public function ChapitrePageAction()
    {
        $ChapterByPage = new PostManager();
        $post = $ChapterByPage ->getPostsByPage($_POST['page'] ?? 1);
        $this->render('Default/homepage.html.twig');
    }

    //Afficher les post sur la page chapitres.
    //------------------------------------------
    public function listPostChapterAction()
    {
        $listeChapters = new PostManager();
        $chapters = $listeChapters ->getPost2();
        $this->render('Post/chapitres.html.twig', ['listChapter' => $chapters ]);
    }
}
<?php


namespace App\Controller;

use Core\Controller\AbstractController;
use App\Model\Manager\PostManager;

class PostController extends AbstractController
{
    //Pagination des page Acceuil(homepage) et list.html.twig:
    //------------------------------------------
    public function ChapitrePageAction()
    {
        $ChapterByPage = new PostManager();
        $post = $ChapterByPage->getPostsByPage($_POST['page'] ?? 1);
        $this->render('Default/homepage.html.twig');
    }

    //Afficher les post sur la page list.html.twig:
    //------------------------------------------
    public function listAction()
    {
        $postManager = new PostManager();
        $posts = $postManager->getAllPosts();
        $this->render('Post/list.html.twig', ['posts' => $posts]);
    }

    //Afficher les post sur la page listAdmin.html.twig:
    //------------------------------------------
    public function listAdminAction()
    {
        $postManager = new PostManager();
        $posts = $postManager->getAllPosts();
        $this->render('Post/listAdmin.html.twig', ['posts' => $posts]);
    }

    //Afficher les post sur la page listAdmin.html.twig:
    //------------------------------------------
    public function newPostAction()
    {
        $this->render('Post/newPost.html.twig');
    }


}
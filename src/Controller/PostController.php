<?php


namespace App\Controller;

use App\Model\Entity\Post;
use Core\Controller\AbstractController;
use App\Model\Manager\PostManager;
use Core\Service\Form\Constraint\MaxLengthTextConstraint;
use Core\Service\Form\Constraint\MinLengthTextConstraint;
use Core\Service\Form\Constraint\NotBlankConstraint;
use Core\Service\Form\Form;
use Core\Service\Form\Type\TextAreaType;
use Core\Service\Form\Type\TextType;

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

    //Afficher les posts sur la pge d'acceuil
    //------------------------------------------
    public function homePageAction()
    {
        $postManager = new PostManager();
        $posts = $postManager->getPosts();
        $this->render('Default/homepage.html.twig', ['posts' => $posts]);
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

    //Ajout deu post dans la base de données:
    //------------------------------------------
    public function newPostAction()
    {
        //creation du formulaire
        $form = (new Form())
            ->add('title', new TextType([
                //on ajoute les contrainte voulue!
                new NotBlankConstraint(),
                new MaxLengthTextConstraint(15)
            ]))
            ->add('content', new TextAreaType([
                new NotBlankConstraint()
            ]));
        // recupération des info du form
        $form->handleRequest();
        //vérification du form
        if ($form->isSubmitted() && $form->isValid()) {
            //envoie du post en base de données
            $post = (new Post())
                ->setTitle($form->getData('title'))
                ->setContent($form->getData('content'));
            $postManager = new PostManager();
            $postManager->createPost($post);
            die('post envoyer');
        }
        $this->render('Post/newPost.html.twig', [
            'form' => $form
        ]);
    }


}
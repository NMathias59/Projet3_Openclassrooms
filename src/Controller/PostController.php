<?php


namespace App\Controller;

use App\Model\Entity\Comment;
use App\Model\Entity\Post;
use App\Model\Manager\CommentManager;
use Core\Controller\AbstractController;
use App\Model\Manager\PostManager;
use Core\Service\Form\Constraint\CsrfConstraint;
use Core\Service\Form\Constraint\MaxLengthTextConstraint;
use Core\Service\Form\Constraint\NotBlankConstraint;
use Core\Service\Form\Form;
use Core\Service\Form\Type\CsrfType;
use Core\Service\Form\Type\IdType;
use Core\Service\Form\Type\TextAreaType;
use Core\Service\Form\Type\TextType;
use Core\Service\Util\FlashBag;

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
        //var_dump($posts);
        $this->render('Post/listAdmin.html.twig', ['posts' => $posts]);
    }

    //Ajout deu post dans la base de données:
    //------------------------------------------
    public function newPostAction()
    {
        //creation du formulaire
        $form = (new Form())
            ->add('title', new TextType([
                //ajout des contraintes voulue!
                new NotBlankConstraint(),
                new MaxLengthTextConstraint(40)
            ]))
            ->add('content', new TextAreaType([
                new NotBlankConstraint()
            ]))
            ->add('csrf', new CsrfType(
                [
                    new CsrfConstraint()
                ]
            ));
        // recupération des données du form !
        $form->handleRequest();
        //vérification du form
        if ($form->isSubmitted() && $form->isValid()) {
            //envoie du post en base de données
            $post = (new Post())
                ->setTitle($form->getData('title'))
                ->setContent($form->getData('content'));
            $postManager = new PostManager();
            $postManager->createPost($post);

        }
        $this->render('Post/newPost.html.twig', [
            'form' => $form
        ]);
    }
    //supression du post dans la base de données:
    //------------------------------------------
    public function deletePostAction()
    {
        $form = (new Form())
            ->add('id', new IdType([
                //ajout des contraintes voulue !
                new NotBlankConstraint(),
            ]))
            ->add('csrf', new CsrfType(
                [
                    new CsrfConstraint()
                ]
            ));
        //recuperation des données du form !
        $form->handleRequest();

        //vérification du form
        if ($form->isSubmitted() && $form->isValid()) {

            //supresion du post de la bdd !
            $id = $form->getData('id');
            $postManager = new PostManager();
            $postManager->deleteThePost($id);
            //rediriger vers listAdminPost
            $this->redirectTo('?uri=chapitresAdmin');
        }
        //rediriger vers listAdminPost
        $this->redirectTo('?uri=chapitresAdmin');
    }

    /**
     * permet de lire un post
     */
    public function showAction()
    {
        $id = $_GET['id'];
        $postManager = new PostManager();
        $post = $postManager->getPost($id);
        $commentManager = new CommentManager();
        $comments = $commentManager->getCommentByPost($id);
        $form = (new Form())
            ->add('pseudo', new TextType([
                new NotBlankConstraint(),
                new MaxLengthTextConstraint(10)
            ]))
            ->add('content', new TextAreaType([
                new NotBlankConstraint(),
                new MaxLengthTextConstraint(140)
            ]));
        $form->handleRequest();

        if ($form->isSubmitted() && $form->isValid()) {

            $comments = (new comment())
                ->setCreatedBy($form->getData('pseudo'))
                ->setContent($form->getData('content'))
                ->setPostId($post->getId());
            $commentManager = new CommentManager();
            $commentManager->newCommentPost($comments);
            die('commentaire poster');
        }


        $this->render('Post/show.html.twig', ['post' => $post, 'comments' => $comments]);


    }

    /**
     * permet d'editer :
     */
    public function editAction()
    {
        $id = $_GET['id'];
        $postManager = new PostManager();
        $post = $postManager->getPost($id);

        $form = (new Form())
            ->add('title', new TextType([
                //ajout des contraintes voulue!
                new NotBlankConstraint(),
                new MaxLengthTextConstraint(15)
            ]))
            ->add('content', new TextAreaType([
                new NotBlankConstraint()
            ]))
            ->add('csrf', new CsrfType(
                [
                    new CsrfConstraint()
                ]
            ));
        // recupération des données du form !
        $form->handleRequest();
        //vérification du form
        if ($form->isSubmitted() && $form->isValid()) {
            //envoie du post en base de données
            $post
                ->setTitle($form->getData('title'))
                ->setContent($form->getData('content'));
            $postManager->updatePost($post);
            //var_dump($post);
            die('post editer');
        }
        $this->render('Post/edit.html.twig', [
            'form' => $form, 'post' => $post
        ]);
    }


}
<?php


namespace App\Controller;

use App\Model\Entity\Post;
use App\Model\Manager\CommentManager;
use App\Model\Manager\PostManager;
use Core\Controller\AbstractController;
use App\Model\Entity\Comment;
use Core\Service\Form\Constraint\MaxLengthTextConstraint;
use Core\Service\Form\Constraint\NotBlankConstraint;
use Core\Service\Form\Form;
use Core\Service\Form\Type\IdType;
use Core\Service\Form\Type\TextAreaType;
use Core\Service\Form\Type\TextType;

class CommentController extends AbstractController
{
    public function newComment()
    {
        $form = (new Form())
            ->add('pseudo', new TextType([
                new NotBlankConstraint(),
                new MaxLengthTextConstraint(10)
            ]))
            ->add('content', new TextAreaType([
                new NotBlankConstraint(),
                new MaxLengthTextConstraint()
            ]));
        $form->handleRequest();

        if ($form->isSubmitted() && $form->isValid()) {

            $comments = (new comment())
                ->setPeudo($form->getData('pseudo'))
                ->setContnent($form->getData('content'));
            $commentManager = new CommentManager();
            $commentManager->newCommentPost($comments);
            die('commentaire poster');
        }

    }

    public function listCommentsAction()
    {

        $commentsManager = new CommentManager();
        $comments = $commentsManager->commentsPost();

        $this->render('Comment/listComments.html.twig', ['comments' => $comments]);
    }

    public function deleteCommentAction()
    {
        $form = (new Form())
            ->add('commentId', new IdType([
                new NotBlankConstraint(),
            ]));

        $form->handleRequest();

        if ($form->isSubmitted() && $form->isValid()) {

            $commentManager = new CommentManager();
            $commentManager->deleteTheComment($form->getData('commentId'));

            $this->redirectTo('?uri=listComments');

        }
    }


}
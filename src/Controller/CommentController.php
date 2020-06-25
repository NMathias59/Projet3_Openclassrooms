<?php


namespace App\Controller;

use App\Model\Entity\Post;
use App\Model\Manager\CommentManager;
use App\Model\Manager\PostManager;
use Core\Controller\AbstractController;
use App\Model\Entity\Comment;
use Core\Service\Form\Constraint\CsrfConstraint;
use Core\Service\Form\Constraint\MaxLengthTextConstraint;
use Core\Service\Form\Constraint\NotBlankConstraint;
use Core\Service\Form\Form;
use Core\Service\Form\Type\CsrfType;
use Core\Service\Form\Type\IdType;
use Core\Service\Form\Type\TextAreaType;
use Core\Service\Form\Type\TextType;
use Core\Service\Util\FlashBag;

class CommentController extends AbstractController
{

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

    public function deReportCommentAction()
    {
        $form = (new Form())
            ->add('commentId', new IdType([
                new NotBlankConstraint(),
            ]));

        $form->handleRequest();

        if ($form->isSubmitted() && $form->isValid()) {

            $commentManager = new CommentManager();
            $commentManager->deReportComment($form->getData('commentId'));
            FlashBag::getInstance()->addFlash('commentaire dereport', 'success');

            $this->redirectTo('?uri=listComments');
        }
    }

    public function reportCommentAction()
    {
        $form = (new Form())
            ->add('reportComment', new IdType([
                new NotBlankConstraint(),
            ]));

        $form->handleRequest();

        if ($form->isSubmitted() && $form->isValid()) {
            $commentManager = new CommentManager();
            $commentManager->reportComment($form->getData('reportComment'));
            FlashBag::getInstance()->addFlash('commentaire signaler', 'success');
            $this->redirectTo('?uri=chapitre&id=' . $_GET['id']);
        }

    }


}
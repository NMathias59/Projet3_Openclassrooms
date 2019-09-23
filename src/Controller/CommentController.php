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
use Core\Service\Form\Type\TextAreaType;
use Core\Service\Form\Type\TextType;

class CommentController extends AbstractController
{
    public function listCommentAction()
    {
        $this->render('Comment/listComments.html.twig');
    }


}
<?php


namespace App\Controller;
use App\Model\Manager\CommentManager;

use Core\Controller\AbstractController;

class CommentController extends AbstractController
{
    public function listConmmentAction()
    {
        $this->render('Comment/listComments.html.twig');
    }
}
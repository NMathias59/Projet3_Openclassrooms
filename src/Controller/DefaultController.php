<?php


namespace App\Controller;

use Core\Controller\AbstractController;

class DefaultController extends AbstractController
{

    public function homepageAction()
    {
        $this->render('Default/homepage.html.twig');
    }

    public function autobioAction()
    {
        $this->render('Default/autobiographie.html.twig');
    }

}
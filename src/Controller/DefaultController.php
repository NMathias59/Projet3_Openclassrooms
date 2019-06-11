<?php


namespace App\Controller;

use Core\Controller\AbstractController;

class DefaultController extends AbstractController
{

    public function homepageAction()
    {
        $this->render('default/homepage.html.twig');
    }

}
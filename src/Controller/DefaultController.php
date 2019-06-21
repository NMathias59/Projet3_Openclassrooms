<?php


namespace App\Controller;

use Core\Controller\AbstractController;

class DefaultController extends AbstractController
{
    //Permet d'afficher la page homepage.html.twig.
    //------------------------------------------
    public function homepageAction()
    {
        $this->render('Default/homepage.html.twig');
    }

    //Permet d'afficher la page autobiographie.html.twig.
    //------------------------------------------
    public function autobioAction()
    {
        $this->render('Default/autobiographie.html.twig');
    }

    //Permet d'afficher la page autobiographie.html.twig.
    //------------------------------------------
    public function adminHomepageAction()
    {
        $this->render('Default/administration.html.twig');
    }


}
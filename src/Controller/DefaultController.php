<?php


namespace App\Controller;

use Core\Controller\AbstractController;

class DefaultController extends AbstractController
{
    //Permet d'afficher la page homepage.html.twig.
    //------------------------------------------
    //public function homepageAction()
    //{
    //    $this->render('Default/homepage.html.twig');
    //}

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

    //Test du rendu error 404.html.twig.
    //------------------------------------------
    public function error404Action()
    {
        $this->render('Error/error 404.html.twig');
    }

    //Test du rendu error 504.html.twig.
    //------------------------------------------
    public function error504Action()
    {
        $this->render('Error/error 504.html.twig');
    }

}
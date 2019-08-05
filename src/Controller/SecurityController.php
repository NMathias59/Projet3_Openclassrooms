<?php


namespace App\Controller\Admin;

use Core\Controller\AbstractController;

class SecurityController extends AbstractController
{
    //Permet d'afficher la page Admin.html.twig.
    //------------------------------------------
    public function connectionAction()
    {
        $this->render('Admin/connection.html.twig');
    }



}
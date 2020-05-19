<?php


namespace App\Controller;

use App\Model\Manager\LoginManager;
use Core\Controller\AbstractController;
use Core\Service\Form\Constraint\CsrfConstraint;
use Core\Service\Form\Constraint\EmailConstraint;
use Core\Service\Form\Constraint\MaxLengthTextConstraint;
use Core\Service\Form\Constraint\NotBlankConstraint;
use Core\Service\Form\Form;
use Core\Service\Form\Type\CsrfType;
use Core\Service\Form\Type\EmailType;
use Core\Service\Form\Type\PasswordType;
use Core\Service\Form\Type\TextAreaType;
use Core\Service\Form\Type\TextType;
use Core\Service\Util\AuthenticationUtil;

class SecurityController extends AbstractController
{
    //Permet d'afficher la page Admin.html.twig.
    //------------------------------------------
    public function connectionAction()
    {
        $form = (new Form())
            ->add('login', new TextType([
                new EmailConstraint(),
                new NotBlankConstraint()
            ]))
            ->add('password', new PasswordType([
                new NotBlankConstraint()
            ]));

        // recupération des données du form !
        $form->handleRequest();

        //vérification du form
        if ($form->isSubmitted() && $form->isValid()) {

            $loginManager = new LoginManager();
            $loginUser = $loginManager->loginUser($form-> getData('login'), $form->getData('password'));
            var_dump($loginUser,$form-> getData('login'), $form->getData('password') );
            if ($loginUser !== null ){
                AuthenticationUtil::connectAdmin($loginUser);
                $this->redirectTo('?uri=administration');
            }

          var_dump('reussi');
        }
        $this->render('Admin/connection.html.twig');
    }

    public function disconnectionAction() {
        AuthenticationUtil::disconnectAdmin();
        $this->redirectTo('?uri=administration');
    }


}
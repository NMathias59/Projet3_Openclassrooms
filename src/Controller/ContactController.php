<?php


namespace App\Controller;
use App\Model\Manager\MessageManager;
use Core\Controller\AbstractController;

class ContactController extends AbstractController
{
    //Permet d'afficher la liste des messages reçus (messages.html.twig.)
    //------------------------------------------
    public function listMessagesAction()
    {
        //$messagesManager = MessageManager();
        //$messages = $messagesManager->listMessages();
        $this->render('Default/messages.html.twig', ['messages' => $messages]);
    }

}
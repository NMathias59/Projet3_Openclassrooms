<?php

namespace App\Controller\Message;

use App\Model\Manager\MessageManager;

class MessagePostController
{
    public static function listeMessagePageAction()
    {
        $postManagerMessage = new MessageManager();
        $messages = $postManagerMessage->getMessage1();
        require '../src/view/message.php';
    }
}

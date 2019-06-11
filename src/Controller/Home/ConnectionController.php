<?php

namespace App\Controller\Home;

use App\Model\Manager\LoginManager;

class ConnectionController
{
    public function connectionPageAction()
    {
        if ($_SERVER['REQUEST_METHOD'] ==='POST') {
            $loginManager = new LoginManager();
            $user = $loginManager->loginUser($_POST['login'], $_POST['password']);
            if ($user) {
                header('Location: administration');
            } else {
                echo('ERREUR : identifiants incorrect');
                die();
            }
        }
        require '../src/view/connection.php';
    }

    public function chekSessionUser($user)
    {
        $chekSession = new chekSession();
        if($user){
            header('Location: administration');
        }
        else{
            header('Location: connection');
        }
    }

    public function logoutSessionUser($user)
    {
       $logoutSession = new logoutSession;
       

    }



}


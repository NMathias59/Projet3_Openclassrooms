<?php

namespace App\Model\Manager;

use Core\DataBase\Manager;
use App\Model\Entity\Admin;

class LoginManager extends Manager
{
    private function hydrate($data)
    {
        if (is_array($data)) {
            $tab = [];

            foreach ($data as $obj) {
                $tab[] = new Admin($obj);
            }

            return $tab;
        }

        return new Admin($data);
    }

    public function loginUser($login, $password)
    {
        $requete = self::$dataBase->prepare('SELECT * FROM `admin` WHERE `login` = :login');
        $requete->execute(array('login' => $login ));
       
        $admin = $this->hydrate( $requete->fetch());
    
        if(password_verify($password, $admin-> getPassword()))
        {
            return $admin;
        }
        return null;
    }
    

}

<?php

namespace App\Model\Manager;

use Core\DataBase\Manager;
use App\Model\Entity\Message;

class MessageManager extends Manager
{
    private function hydrate($data)
    {
        if (is_array($data)) {
            $tab = [];

            foreach ($data as $obj) {
                $tab[] = new Message($obj);
            }

            return $tab;
        }

        return new Message($data);
    }

    public function getMessage1()
    {
        $query = self:: $dataBase->prepare('SELECT * FROM `message` ORDER BY `createdAt`');
        $query->execute();

        $tabData = $query->fetchAll();

        return $this->hydrate($tabData);
    }

    public function deleteTheMessage()
    {
        $req->self::$dataBase->prepare('DELETE FROM `message` WHERE `id` = ?');
        $req->execute(array($_POST['message']));
    }
}

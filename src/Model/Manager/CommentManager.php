<?php

namespace App\Model\Manager;

use App\Model\Entity\Comment;
use Core\DataBase\Manager;

class CommentManager extends Manager
{
    private function hydrate($data)
    {
        if (is_array($data)) {
            $tab = [];

            foreach ($data as $obj) {
                $tab[] = new Comment($obj);
            }

            return $tab;
        }

        return new Comment($data);
    }

    public function commentPost()
    {
        $query = self:: $dataBase->prepare('SELECT * FROM `comment` ORDER BY `createdAt`');
        $query->execute();

        $tabData = $query->fetchAll();

        return $this->hydrate($tabData);
    }

    public function newCommentPost($comment)
    {
        $query = self::$dataBase->prepare('INSERT INTO `comment` (`name`,`comment`) VALUE (:name, :comment)');
        $query->execute([':name' => $comment->getName(), ':comment' => $comment->getComment()]);

        $post->setId(self::$dataBase->lastInsertId());
    }

    public function deleteTheComment()
    {
        $req->self::$dataBase->prepare('DELETE FROM `comment` WHERE `id` = ?');
        $req->execute(array($_POST['comment']));
    }

    public function reportComment($commentId)
    {
        $query = self::$dataBase->prepare('UPDATE `comment` SET `report` = :report WHERE `id` = :id');
        $query->execute([':id' => $commentId, ':report' => 1]);
    }
}

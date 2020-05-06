<?php

namespace App\Model\Manager;

use App\Model\Entity\Comment;
use Core\DataBase\Manager;
use mysql_xdevapi\Exception;

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


    public function newCommentPost(Comment $comment)
    {
        $query = self::$dataBase->prepare('INSERT INTO `comment` (`created_by`,`comment`,`post_id`, `report`, `created_at`) VALUE (:createdBy, :comment, :postId, :report, :createdAt)');
        $query->execute([':createdBy' => $comment->getCreatedBy(), ':comment' => $comment->getContent(), ':postId' => $comment->getPostId(), ':report' => $comment->getReport() ? 1 : 0, ':createdAt' => $comment->getCreatedAt()->format('Y-m-d H:i:s')]);

        $comment->setId(self::$dataBase->lastInsertId());
    }

    public function deleteTheComment($id)
    {
        $query = self::$dataBase->prepare('DELETE FROM `comment` WHERE `id` = :id');
        $query->execute([':id' => $id]);
    }

    public function reportComment($commentId)
    {
        $query = self::$dataBase->prepare('UPDATE `comment` SET `report` = :report WHERE `id` = :id');
        $query->execute([':id' => $commentId, ':report' => 1]);
    }

    public function deReportComment($commentId)
    {
        $query = self::$dataBase->prepare('UPDATE `comment` SET `report` = :report WHERE `id` = :id');
        $query->execute([':id' => $commentId, ':report' => 0]);
    }

    public function getCommentByPost($postId)
    {
        $query = self::$dataBase->prepare('SELECT * FROM `comment` WHERE `post_id` = :postId ORDER BY `created_at` ');
        $query->execute([':postId' => $postId]);
        $tabData = $query->fetchAll();

        return $this->hydrate($tabData);
    }


    // partie administration

    public function commentsPost()
    {
        $query = self:: $dataBase->prepare('SELECT * FROM `comment` ORDER BY `report` DESC ,`created_at` DESC');
        $query->execute();

        $tabData = $query->fetchAll();

        return $this->hydrate($tabData);
    }


}



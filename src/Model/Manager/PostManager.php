<?php

namespace App\Model\Manager;

use Core\DataBase\Manager;
use App\Model\Entity\Post;

class PostManager extends Manager
{
    private function hydrate($data)
    {
        if (is_array($data)) {
            $tab = [];

            foreach ($data as $obj) {
                $tab[] = new Post($obj);
            }

            return $tab;
        }

        return new Post($data);
    }

    public function getPost1()
    {
        $query = self:: $dataBase->prepare('SELECT * FROM `post` ORDER BY `created_at` DESC LIMIT 0, 6');
        $query->execute();

        $tabData = $query->fetchAll();

        return $this->hydrate($tabData);
    }

    public function getPost2()
    {
        $query = self:: $dataBase->prepare('SELECT * FROM `post` ORDER BY `created_at`');
        $query->execute();

        $tabData = $query->fetchAll();

        return $this->hydrate($tabData);
    }

    public function getPostsByPage($numPage)
    {
        $nbElemPerPage = 8;
        $indexFirstElement = ($numPage - 1) * $nbElemPerPage;
        $query = self:: $dataBase->prepare('SELECT * FROM `post` LIMIT '.$indexFirstElement.','.$nbElemPerPage);
        $query->execute([
            ]);

        $tabData = $query->fetchAll();

        return $this->hydrate($tabData);
    }

    public function getPost($id)
    {
        $query = self::$dataBase->prepare('SELECT * FROM `post` WHERE `id`= :id');
        $query->execute([':id' => $id]);

        $postData = $query->fetch();

        return $this->hydrate($postData);
    }

    public function postChapterComments()
    {
        $query = self::$dataBase->prepare('SELECT * FROM `post` WHERE `id`= :id');
        $query->execute([':id' => $id]);

        $postData = $query->fetch();

        return $this->hydrate($postData);
    }

    public function createPost(Post $post)
    {
        $query = self::$dataBase->prepare('INSERT INTO `post` (`title`, `content`) VALUES (:title, :content)');
        $query->execute([':title' => $post->getTitle(), ':content' => $post->getContent()]);

        $post->setId(self::$dataBase->lastInsertId());
    }

    public function updateThePost()
    {
        $query = self::$dataBase->prepare('UPDATE `post` SET `title` = :title, `content` = :content WHERE `id` = :id');
        $query->execute([':id' => $post->getId(), ':title' => $post->getTitle(), ':content' => $post->getContent()]);


    }

    public function deleteThePost()
    {
        $req->self::$dataBase->prepare('DELETE FROM `post` WHERE `id` = ?');
        $req->execute(array($_POST['post']));
    }
}

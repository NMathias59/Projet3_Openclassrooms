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

    /**
     * @return Post[] Liste de tout les posts.
     */

    public function getAllPosts(): array
    {
        $query = self:: $dataBase->prepare('SELECT * FROM `post` ORDER BY `created_at`');
        $query->execute();

        $tabData = $query->fetchAll();

        return $this->hydrate($tabData);
    }

    /**
     * @return Post[] Liste des 6 dernier Posts pour l'acceuil.
     */

    public function getPosts()
    {
        $query = self:: $dataBase->prepare('SELECT * FROM `post` ORDER BY `created_at` DESC LIMIT 0, 6');
        $query->execute();

        $tabData = $query->fetchAll();

        return $this->hydrate($tabData);
    }

    /**
     * @return Post
     */
    public function getPost($id)
    {
        $query = self:: $dataBase->prepare('SELECT * FROM `post` WHERE `id` = :id');
        $query->execute([
            'id' => $id
        ]);

        $tabData = $query->fetch();
        return $this->hydrate($tabData);
    }


    /**
     * @return Post[] Ajout d'un nouveau post.
     */
    public function createPost(Post $post)
    {
        $query = self::$dataBase->prepare('INSERT INTO `post` (`title`, `content`, `created_at`) VALUES (:title, :content, :createdAt)');
        $query->execute([':title' => $post->getTitle(), ':content' => $post->getContent(), ':createdAt' => $post->getCreatedAt()->format('Y-m-d H:i:s')]);

        $post->setId(self::$dataBase->lastInsertId());
    }

    public function deleteThePost(int $id)
    {
        $req = self::$dataBase->prepare('DELETE FROM `post` WHERE `id` = ?');
        $req->execute(array($id));
    }

    /**
     * @return Post[] edition d'un post.
     */
    public function updatePost(Post $post)
    {
        $query = self::$dataBase->prepare('UPDATE  `post` SET `title` = :title, `content`= :content, `created_at`= :createdAt WHERE `id` = :id');
        $query->execute([':title' => $post->getTitle(), ':content' => $post->getContent(), ':createdAt' => $post->getCreatedAt()->format('Y-m-d H:i:s'),':id' => $post->getId() ]);
    }
}

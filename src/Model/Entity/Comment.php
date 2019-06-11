<?php

namespace App\Model\Entity;

class Comment
{
    private $id;
    private $createdBy;
    private $createdAt;
    private $content;
    private $post;

    public function __construct($data = null)
    {
        if ($data) {
            $this->setId($data->id);
            $this->setCreatedBy($data->created_by);
            $this->setCreatedAt($data->created_at);
            $this->setContent($data->comment);
            $this->setPost($data->post_id);
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getPost()
    {
        return $this->post;
    }

    public function setPost($post)
    {
        $this->post = $post;
    }
}

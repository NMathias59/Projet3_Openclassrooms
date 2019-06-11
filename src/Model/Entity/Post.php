<?php

namespace App\Model\Entity;

class Post
{
    private $id;
    private $name;
    private $createdAt;
    private $content;

    public function __construct($data = null)
    {
        if ($data) {
            $this->setId($data->id);
            $this->setName($data->name);
            $this->setCreatedAt($data->created_at);
            $this->setContent($data->content);
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

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
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
}

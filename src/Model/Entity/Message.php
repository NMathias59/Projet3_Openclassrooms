<?php

namespace App\Model\Entity;

class Message
{
    private $id;
    private $createdBy;
    private $createdAt;
    private $content;
    private $email;

    public function __construct($data = null)
    {
        if ($data) {
            $this->setId($data->id);
            $this->setCreatedby($data->name);
            $this->setCreatedAt($data->createdAt);
            $this->setContent($data->content);
            $this->setEmail($data->email);
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

    
    public function getEmail()
    {
        return $this->email;
    }

    
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}

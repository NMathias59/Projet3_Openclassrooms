<?php

namespace App\Model\Entity;

class Comment
{
    private $id;
    private $createdBy;
    private $createdAt;
    private $content;
    private $postId;
    private $report;

    public function __construct($data = null)
    {
        $this->setCreatedAt(new \DateTime());
        $this->setReport(false);
        if ($data) {
            $this->setId($data->id);
            $this->setCreatedBy($data->created_by);
            $this->setCreatedAt(new \DateTime($data->created_at));
            $this->setContent($data->comment);
            $this->setPostId($data->post_id);
            $this->setReport($data->report);
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    public function getPostId()
    {
        return $this->postId;
    }

    public function setPostId($postId)
    {
        $this->postId = $postId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getReport()
    {
        return $this->report;
    }

    /**
     * @param mixed $report
     */
    public function setReport($report)
    {
        $this->report = $report;
    }

}

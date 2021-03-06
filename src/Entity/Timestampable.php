<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

trait Timestampable{
    /**
     * @var \DateTimeInterface $createdAt
//     * @var datetime $createdAt
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @return \DateTimeInterface
     */
    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }


    /**
     * @return \DateTimeInterface
     */
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTimeInterface $updatedAt
     * @return Timestampable
     */
    public function setUpdatedAt(\DateTimeInterface $updatedAt): Timestampable
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @var \DateTimeInterface $updatedAt
//     * @var datetime $updatedAt
     * @ORM\Column(name="updated_at", type="datetime",nullable=true)
     */
    private $updatedAt;
}
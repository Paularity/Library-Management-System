<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PublisherRepository")
 */
class Publisher
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $PublisherName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPublisherName(): ?string
    {
        return $this->PublisherName;
    }

    public function setPublisherName(string $PublisherName): self
    {
        $this->PublisherName = $PublisherName;

        return $this;
    }
}

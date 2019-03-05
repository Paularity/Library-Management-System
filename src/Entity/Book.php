<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BookRepository")
 */
class Book
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $Title;

    /**
     * @ORM\Column(type="integer")
     */
    private $AuthorID;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $CallNumber;

    /**
     * @ORM\Column(type="integer")
     */
    private $PublisherID;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $PublicationYear;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Edition;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Volume;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Copyright;

    /**
     * @ORM\Column(type="integer")
     */
    private $NumberOfPages;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ISBN;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    public function getAuthorID(): ?int
    {
        return $this->AuthorID;
    }

    public function setAuthorID(int $AuthorID): self
    {
        $this->AuthorID = $AuthorID;

        return $this;
    }

    public function getCallNumber(): ?string
    {
        return $this->CallNumber;
    }

    public function setCallNumber(string $CallNumber): self
    {
        $this->CallNumber = $CallNumber;

        return $this;
    }

    public function getPublisherID(): ?int
    {
        return $this->PublisherID;
    }

    public function setPublisherID(int $PublisherID): self
    {
        $this->PublisherID = $PublisherID;

        return $this;
    }

    public function getPublicationYear(): ?string
    {
        return $this->PublicationYear;
    }

    public function setPublicationYear(string $PublicationYear): self
    {
        $this->PublicationYear = $PublicationYear;

        return $this;
    }

    public function getEdition(): ?string
    {
        return $this->Edition;
    }

    public function setEdition(string $Edition): self
    {
        $this->Edition = $Edition;

        return $this;
    }

    public function getVolume(): ?string
    {
        return $this->Volume;
    }

    public function setVolume(string $Volume): self
    {
        $this->Volume = $Volume;

        return $this;
    }

    public function getCopyright(): ?string
    {
        return $this->Copyright;
    }

    public function setCopyright(string $Copyright): self
    {
        $this->Copyright = $Copyright;

        return $this;
    }

    public function getNumberOfPages(): ?int
    {
        return $this->NumberOfPages;
    }

    public function setNumberOfPages(int $NumberOfPages): self
    {
        $this->NumberOfPages = $NumberOfPages;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getISBN(): ?string
    {
        return $this->ISBN;
    }

    public function setISBN(string $ISBN): self
    {
        $this->ISBN = $ISBN;

        return $this;
    }
}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OpacRepository")
 */
class Opac
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $StudentId;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $FacultyId;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $StaffId;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $BookId;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $Status;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateUpdated;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateCreated;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $penalty;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateDue;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStudentId(): ?int
    {
        return $this->StudentId;
    }

    public function setStudentId(int $StudentId): self
    {
        $this->StudentId = $StudentId;

        return $this;
    }

    public function getFacultyId(): ?int
    {
        return $this->FacultyId;
    }

    public function setFacultyId(int $FacultyId): self
    {
        $this->FacultyId = $FacultyId;

        return $this;
    }

    public function getStaffId(): ?int
    {
        return $this->StaffId;
    }

    public function setStaffId(int $StaffId): self
    {
        $this->StaffId = $StaffId;

        return $this;
    }

    public function getBookId(): ?int
    {
        return $this->BookId;
    }

    public function setBookId(int $BookId): self
    {
        $this->BookId = $BookId;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->Status;
    }

    public function setStatus(string $Status): self
    {
        $this->Status = $Status;

        return $this;
    }

    public function getDateUpdated() : ?\DateTimeInterface
    {
        return $this->DateUpdated;
    }

    public function setDateUpdated(\DateTimeInterface $DateUpdated): self
    {
        $this->DateUpdated = $DateUpdated;

        return $this;
    }

    public function getDateCreated(): ?\DateTimeInterface
    {
        return $this->DateCreated;
    }

    public function setDateCreated(\DateTimeInterface $DateCreated): self
    {
        $this->DateCreated = $DateCreated;

        return $this;
    }

    public function getPenalty()
    {
        return $this->penalty;
    }

    public function setPenalty($penalty): self
    {
        $this->penalty = $penalty;

        return $this;
    }

    public function getDateDue(): ?\DateTimeInterface
    {
        return $this->DateDue;
    }

    public function setDateDue(\DateTimeInterface $DateDue): self
    {
        $this->DateDue = $DateDue;

        return $this;
    }

}

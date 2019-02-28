<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StudentRepository")
 */
class Student
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $LastName;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $FirstName;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $MiddleName;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $EducationalLevel;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $Course;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $YearSection;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $ContactNo;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $EmailAddress;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastName(): ?string
    {
        return $this->LastName;
    }

    public function setLastName(string $LastName): self
    {
        $this->LastName = $LastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->FirstName;
    }

    public function setFirstName(string $FirstName): self
    {
        $this->FirstName = $FirstName;

        return $this;
    }

    public function getMiddleName(): ?string
    {
        return $this->MiddleName;
    }

    public function setMiddleName(string $MiddleName): self
    {
        $this->MiddleName = $MiddleName;

        return $this;
    }

    public function getEducationalLevel(): ?string
    {
        return $this->EducationalLevel;
    }

    public function setEducationalLevel(string $EducationalLevel): self
    {
        $this->EducationalLevel = $EducationalLevel;

        return $this;
    }

    public function getCourse(): ?string
    {
        return $this->Course;
    }

    public function setCourse(string $Course): self
    {
        $this->Course = $Course;

        return $this;
    }

    public function getYearSection(): ?string
    {
        return $this->YearSection;
    }

    public function setYearSection(string $YearSection): self
    {
        $this->YearSection = $YearSection;

        return $this;
    }

    public function getContactNo(): ?string
    {
        return $this->ContactNo;
    }

    public function setContactNo(string $ContactNo): self
    {
        $this->ContactNo = $ContactNo;

        return $this;
    }

    public function getEmailAddress(): ?string
    {
        return $this->EmailAddress;
    }

    public function setEmailAddress(string $EmailAddress): self
    {
        $this->EmailAddress = $EmailAddress;

        return $this;
    }
}

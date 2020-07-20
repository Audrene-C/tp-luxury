<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JobOffer
 *
 * @ORM\Table(name="job_offer", indexes={@ORM\Index(name="IDX_288A3A4EDC2902E0", columns={"client_id_id"}), @ORM\Index(name="IDX_288A3A4E712A86AB", columns={"job_category_id"})})
 * @ORM\Entity
 */
class JobOffer
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    private $active;

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="string", length=255, nullable=false)
     */
    private $notes;

    /**
     * @var string
     *
     * @ORM\Column(name="job_title", type="string", length=255, nullable=false)
     */
    private $jobTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="contract_type", type="string", length=255, nullable=false)
     */
    private $contractType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="location", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $location;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="closing_date", type="date", nullable=true, options={"default"="NULL"})
     */
    private $closingDate;

    /**
     * @var int|null
     *
     * @ORM\Column(name="salary", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $salary;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \JobCategory
     *
     * @ORM\ManyToOne(targetEntity="JobCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="job_category_id", referencedColumnName="id")
     * })
     * @ORM\Column(nullable=true)
     */
    private $jobCategory;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="client_id_id", referencedColumnName="id")
     * })
     */
    private $clientId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClientId(): ?Client
    {
        return $this->clientId;
    }

    public function setClientId(?Client $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getJobTitle(): ?string
    {
        return $this->jobTitle;
    }

    public function setJobTitle(string $jobTitle): self
    {
        $this->jobTitle = $jobTitle;

        return $this;
    }

    public function getContractType(): ?string
    {
        return $this->contractType;
    }

    public function setContractType(string $contractType): self
    {
        $this->contractType = $contractType;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getJobCategory(): ?JobCategory
    {
        return $this->jobCategory;
    }

    public function setJobCategory(?JobCategory $jobCategory): self
    {
        $this->jobCategory = $jobCategory;

        return $this;
    }

    public function getClosingDate(): ?\DateTimeInterface
    {
        return $this->closingDate;
    }

    public function setClosingDate(?\DateTimeInterface $closingDate): self
    {
        $this->closingDate = $closingDate;

        return $this;
    }

    public function getSalary(): ?int
    {
        return $this->salary;
    }

    public function setSalary(?int $salary): self
    {
        $this->salary = $salary;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}

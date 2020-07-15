<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $societyName;

    /**
     * @ORM\ManyToOne(targetEntity=JobCategory::class, inversedBy="clients")
     * @ORM\JoinColumn(nullable=false)
     */
    private $jobCategory;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contactName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contactPosition;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contactPhone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contactEmail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $notes;

    /**
     * @ORM\OneToMany(targetEntity=JobOffer::class, mappedBy="clientId")
     */
    private $jobOffers;

    public function __construct()
    {
        $this->jobOffers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSocietyName(): ?string
    {
        return $this->societyName;
    }

    public function setSocietyName(string $societyName): self
    {
        $this->societyName = $societyName;

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

    public function getContactName(): ?string
    {
        return $this->contactName;
    }

    public function setContactName(string $contactName): self
    {
        $this->contactName = $contactName;

        return $this;
    }

    public function getContactPosition(): ?string
    {
        return $this->contactPosition;
    }

    public function setContactPosition(string $contactPosition): self
    {
        $this->contactPosition = $contactPosition;

        return $this;
    }

    public function getContactPhone(): ?string
    {
        return $this->contact_phone;
    }

    public function setContactPhone(string $contact_phone): self
    {
        $this->contact_phone = $contact_phone;

        return $this;
    }

    public function getContactEmail(): ?string
    {
        return $this->contactEmail;
    }

    public function setContactEmail(string $contactEmail): self
    {
        $this->contactEmail = $contactEmail;

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

    /**
     * @return Collection|JobOffer[]
     */
    public function getJobOffers(): Collection
    {
        return $this->jobOffers;
    }

    public function addJobOffer(JobOffer $jobOffer): self
    {
        if (!$this->jobOffers->contains($jobOffer)) {
            $this->jobOffers[] = $jobOffer;
            $jobOffer->setClientId($this);
        }

        return $this;
    }

    public function removeJobOffer(JobOffer $jobOffer): self
    {
        if ($this->jobOffers->contains($jobOffer)) {
            $this->jobOffers->removeElement($jobOffer);
            // set the owning side to null (unless already changed)
            if ($jobOffer->getClientId() === $this) {
                $jobOffer->setClientId(null);
            }
        }

        return $this;
    }
}

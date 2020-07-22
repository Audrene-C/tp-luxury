<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Candidate
 *
 * @ORM\Table(name="candidate", indexes={@ORM\Index(name="IDX_C8B28E44712A86AB", columns={"job_category"})})
 * @ORM\Entity
 */
class Candidate
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
     * @var bool|null
     *
     * @ORM\Column(name="gender", type="boolean", nullable=true, options={"default"="NULL"})
     */
    private $gender;

    /**
     * @var string|null
     *
     * @ORM\Column(name="first_name", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $firstName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="last_name", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $lastName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adress", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $adress;

    /**
     * @var string|null
     *
     * @ORM\Column(name="country", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $country;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nationality", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $nationality;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="passport", type="boolean", nullable=true, options={"default"="NULL"})
     */
    private $passport;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cv", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $cv;

    /**
     * @var string|null
     *
     * @ORM\Column(name="profil_picture", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $profilPicture;

    /**
     * @var string|null
     *
     * @ORM\Column(name="current_location", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $currentLocation;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_of_birth", type="date", nullable=true, options={"default"="NULL"})
     */
    private $dateOfBirth;

    /**
     * @var string|null
     *
     * @ORM\Column(name="place_of_birth", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $placeOfBirth;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $email;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="availability", type="boolean", nullable=true, options={"default"="NULL"})
     */
    private $availability;

    /**
     * @var string|null
     *
     * @ORM\Column(name="experience", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $experience;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $notes;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $createdAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $updatedAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $deletedAt;

    /**
     * @var \JobCategory
     *
     * @ORM\ManyToOne(targetEntity="JobCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="job_category", referencedColumnName="id")
     * })
     */
    private $jobCategory;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $passportFile;

    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default" : false})
     */
    private $isComplete;

    public function __construct()
    {
        $this->files = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGender(): ?bool
    {
        return $this->gender;
    }

    public function setGender(bool $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(string $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function getPassport(): ?bool
    {
        return $this->passport;
    }

    public function setPassport(bool $passport): self
    {
        $this->passport = $passport;

        return $this;
    }

    public function getCv(): ?string
    {
        return $this->cv;
    }

    public function setCv(string $cv): self
    {
        $this->cv = $cv;

        return $this;
    }

    public function getProfilPicture(): ?string
    {
        return $this->profilPicture;
    }

    public function setProfilPicture(string $profilPicture): self
    {
        $this->profilPicture = $profilPicture;

        return $this;
    }

    public function getCurrentLocation(): ?string
    {
        return $this->currentLocation;
    }

    public function setCurrentLocation(string $currentLocation): self
    {
        $this->currentLocation = $currentLocation;

        return $this;
    }

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(\DateTimeInterface $dateOfBirth): self
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    public function getPlaceOfBirth(): ?string
    {
        return $this->placeOfBirth;
    }

    public function setPlaceOfBirth(string $placeOfBirth): self
    {
        $this->placeOfBirth = $placeOfBirth;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAvailability(): ?bool
    {
        return $this->availability;
    }

    public function setAvailability(bool $availability): self
    {
        $this->availability = $availability;

        return $this;
    }

    public function getExperience(): ?string
    {
        return $this->experience;
    }

    public function setExperience(string $experience): self
    {
        $this->experience = $experience;

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

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(string $notes): self
    {
        $this->notes = $notes;

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

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getDeletedAt(): ?\DateTimeInterface
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(\DateTimeInterface $deletedAt): self
    {
        $this->deletedAt = $deletedAt;

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

    /**
     * @return File[]
     */
    public function getFiles(): File
    {
        return $this->files;
    }

    public function addFile(File $file): self
    {
        if (!$this->files->contains($file)) {
            $this->files[] = $file;
            $file->setCandidate($this);
        }

        return $this;
    }

    public function removeFile(File $file): self
    {
        if ($this->files->contains($file)) {
            $this->files->removeElement($file);
            // set the owning side to null (unless already changed)
            if ($file->getCandidate() === $this) {
                $file->setCandidate(null);
            }
        }

        return $this;
    }

    public function getPassportFile(): ?string
    {
        return $this->passportFile;
    }

    public function setPassportFile(?string $passportFile): self
    {
        $this->passportFile = $passportFile;

        return $this;
    }

    public function getIsComplete(): ?bool
    {
        return $this->isComplete;
    }

    public function setIsComplete(?bool $isComplete): self
    {
        $this->isComplete = $isComplete;

        return $this;
    }
}

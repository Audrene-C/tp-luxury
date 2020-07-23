<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Security\Core\User\UserInterface;
use Vich\UploaderBundle\Mapping\Annotation as Vich;



/**
 * Candidate
 *
 * @ORM\Table(name="candidate", indexes={@ORM\Index(name="IDX_C8B28E44712A86AB", columns={"job_category_id"})})
 * @ORM\Entity
 * @Vich\Uploadable
 */
class Candidate implements \Serializable
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
     * @Vich\UploadableField(mapping="cvFile", fileNameProperty="cv")
     * 
     * @var File|null
     */
    private $cvFile;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cv", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $cv;

    /**
    * @Vich\UploadableField(mapping="profilPictureFile", fileNameProperty="profilPicture")
    * 
    * @var File|null
    */
    private $profilPictureFile;

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
     *   @ORM\JoinColumn(name="job_category_id", referencedColumnName="id")
     * })
     */
    private $jobCategory;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $passportFile;

    /**
     * @Vich\UploadableField(mapping="passportFileUpload", fileNameProperty="passportFile")
     *
     * @var File|null
     */
     private $passportFileUpload;

     /**
     * String representation of object
     * @link https://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->cv,
            $this->profilPicture,
            $this->passportFile,
        ));
    }

    /**
     * Constructs the object
     * @link https://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->cv,
            $this->profilPicture,
            $this->passportFile,
            ) = unserialize($serialized, array('allowed_classes' => false));
    }

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


    /**
     * If manually uploading a file (i.e not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $cvFile
     */
    public function setCvFile(?File $cvFile = null): void
    {
        $this->cvFile = $cvFile;

        if(null !== $cvFile){
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getCvFile(): ?File
    {
        return $this->cvFile;
    }

    public function setCv(?string $cv): void
    {
        $this->cv = $cv;
    }

    public function getCv(): ?string
    {
        return $this->cv;
    }

    /**
     * If manually uploading a file (i.e not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $profilPictureFile
     */
     public function setProfilPictureFile(?File $profilPictureFile = null): void
     {
         $this->profilPictureFile = $profilPictureFile;
 
         if(null !== $profilPictureFile){
             $this->updatedAt = new \DateTimeImmutable();
         }
     }
 
     public function getProfilPictureFile(): ?File
     {
         return $this->profilPictureFile;
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

    /**
     * If manually uploading a file (i.e not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $passportFileUpload
     */
     public function setPassportFileUpload(?File $passportFileUpload = null): void
     {
         $this->passportFileUpload = $passportFileUpload;
 
         if(null !== $passportFileUpload){
             $this->updatedAt = new \DateTimeImmutable();
         }
     }
 
     public function getPassportFileUpload(): ?File
     {
         return $this->passportFileUpload;
     }
}

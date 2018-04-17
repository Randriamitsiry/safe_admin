<?php

namespace Jess\scolaBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

class Etudiant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100)
     * @Assert\NotBlank()
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=25, nullable=true, unique=true)
     * @Assert\NotBlank()
     */
    private $telephone;

    /**
     * @var string
     * @ORM\Column(type="string")
     * @Assert\File(mimeTypes={ "image/jpeg", "image/jpg", "image/png" }, mimeTypesMessage="format invalide")
     */
    private $photos;
    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Matiere",mappedBy="etudiants", cascade={"persist", "remove", "merge"})
     * @Assert\NotBlank()
     */
    private $matieres;

    /**
     * @var Note
     * @ORM\OneToMany(targetEntity="Note", mappedBy="etudiant", cascade={"remove"})
     */
    private $notes;

    /**
     * user constructor.
     */
    public function __construct()
    {
        $this->notes = new ArrayCollection();
        $this->matieres = new ArrayCollection();
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * @param string $photos
     * @return Etudiant
     */
    public function setPhotos($photos)
    {
        $this->photos = $photos;

        return $this;
    }

    /**
     * Get nom.
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set nom.
     *
     * @param string $nom
     *
     * @return Etudiant
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get adresse.
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set adresse.
     *
     * @param string $adresse
     *
     * @return Etudiant
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get telephone.
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set telephone.
     *
     * @param string $telephone
     *
     * @return Etudiant
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getMatieres()
    {
        return $this->matieres;
    }

    /**
     * @param ArrayCollection $matieres
     *
     * @return Etudiant
     */
    public function setMatieres($matieres)
    {
        $this->matieres = $matieres;

        return $this;
    }

    /**
     * @return Note
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param Note $notes
     *
     * @return Etudiant
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * add matiere to matieres list.
     *
     * @param Matiere $matiere
     *
     * @return Etudiant
     */
    public function addMatiere(Matiere $matiere)
    {
        $this->matieres->add($matiere);

        return $this;
    }

    /**
     * delete matiere from matiere list.
     *
     * @param Matiere $matiere
     *
     * @return Etudiant
     */
    public function removeMatiere(Matiere $matiere)
    {
        $this->matieres->removeElement($matiere);

        return $this;
    }
    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function upload()
    {
        if ($this->getPhotos() instanceof UploadedFile) {
            $fileName = md5(uniqid()).'.'.$this->getPhotos()->guessExtension();
            try {
                $this->photos->move("../web/uploads/etudiant", $fileName);
            } catch (\Exception $exception) {
                throw $exception;
            }

            $this->setPhotos($fileName);
        }
    }

    /**
     * @ORM\PostRemove
     */
    public function deletePhoto()
    {
        try {
            unlink("../web/uploads/etudiant/".$this->getPhotos());
        } catch (\Exception $exception) {
        }
    }
}

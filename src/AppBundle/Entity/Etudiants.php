<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Etudiant
 *
 * @ORM\Table(name="etudiants")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Etudiants
{
    /**
     * @var string
     *
     * @ORM\Column(name="idEtudiant", type="string")
     * @ORM\Id
     */
    private $idetudiant;

    /**
     * @var string
     * @ORM\Column(name="code")
     */
    private $code;

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=100, nullable=true)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_naissance", type="date", nullable=false)
     */
    private $dateNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=20, nullable=false)
     */
    private $sexe;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu_naissance", type="string", length=255, nullable=true)
     */
    private $lieuNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=50, nullable=true)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=true)
     */
    private $email;

    /**
     * @var string
     * @ORM\Column(type="string", options={"default" = "default.png"}))
     * @Assert\File(mimeTypes={ "image/jpeg", "image/jpg", "image/png" }, mimeTypesMessage="format invalide")
     */
    private $photos;

    /**
     * @return string
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * @param string $photos
     */
    public function setPhotos($photos)
    {
        $this->photos = $photos;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="situation_matrimoniale", type="string", length=20, nullable=true)
     */
    private $situationMatrimoniale;

    /**
     * @var string
     *
     * @ORM\Column(name="CIN", type="string", length=50, nullable=true)
     */
    private $cin;



    /**
     * Get idetudiant
     *
     * @return string
     */
    public function getIdetudiant()
    {
        return $this->idetudiant;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Etudiants
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Etudiants
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     * @return Etudiants
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     * @return Etudiants
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set lieuNaissance
     *
     * @param string $lieuNaissance
     * @return Etudiants
     */
    public function setLieuNaissance($lieuNaissance)
    {
        $this->lieuNaissance = $lieuNaissance;

        return $this;
    }

    /**
     * @param string $idetudiant
     */
    public function setIdetudiant(string $idetudiant): void
    {
        $this->idetudiant = $idetudiant;
    }

    /**
     * Get lieuNaissance
     *
     * @return string
     */
    public function getLieuNaissance()
    {
        return $this->lieuNaissance;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return Etudiants
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Etudiants
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set situationMatrimoniale
     *
     * @param string $situationMatrimoniale
     * @return Etudiants
     */
    public function setSituationMatrimoniale($situationMatrimoniale)
    {
        $this->situationMatrimoniale = $situationMatrimoniale;

        return $this;
    }

    /**
     * Get situationMatrimoniale
     *
     * @return string
     */
    public function getSituationMatrimoniale()
    {
        return $this->situationMatrimoniale;
    }

    /**
     * Set cin
     *
     * @param string $cin
     * @return Etudiants
     */
    public function setCin($cin)
    {
        $this->cin = $cin;

        return $this;
    }

    /**
     * Get cin
     *
     * @return string
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * @ORM\PrePersist
     */
    public function setCustomData()
    {
        $this->setCode(random_bytes(15));
        $this->setIdetudiant($this->createId().$this->getSexe());

        $fileName = md5(uniqid()).'.'.$this->getPhotos()->guessExtension();
        try {
            $this->photos->move("../web/uploads/etudiant", $fileName);
        } catch (\Exception $exception) {
            throw $exception;
        }

        $this->setPhotos($fileName);
    }

    /**
     * @ORM\PreUpdate
     */
    public function setData()
    {
        $fileName = md5(uniqid()).'.'.$this->getPhotos()->guessExtension();
        try {
            $this->photos->move("../web/uploads/etudiant", $fileName);
        } catch (\Exception $exception) {
            throw $exception;
        }

        $this->setPhotos($fileName);
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

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->getIdetudiant();
    }

    /**
     * @return string
     */
    public function createId()
    {
        $x = random_int(0,999);
        $y = random_int(0,999);
        $x = $this->getValue($x);
        $y = $this->getValue($y);
        return $x."-".$y;
    }

    /**
     * create custom random
     * @param int
     * @return string
     */
    public function getValue($x)
    {
        switch ($x){
            case ($x>1 && $x<10) :
                $x = '00'.$x;
                break;
            case ($x>10 && $x<100) :
                $x = '0'.$x;
                break;
            default:
                break;
        }
        return $x;
    }
}

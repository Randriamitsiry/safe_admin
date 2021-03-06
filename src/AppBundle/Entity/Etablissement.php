<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Formation;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Etablissement
 *
 * @ORM\Table(name="etablissement")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Etablissement
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_etablissement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEtablissement;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="sigle", type="string", length=100, nullable=true)
     */
    private $sigle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="date", nullable=true)
     */
    private $dateCreation;

    /**
     * @var string
     *
     * @ORM\Column(name="siteweb", type="string", length=100, nullable=true)
     */
    private $siteweb;
    
    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;
    
    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Directeur", inversedBy="Etablissement")
     * @ORM\JoinTable(name="etablissement_directeur",
     *   joinColumns={
     *     @ORM\JoinColumn(name="etablissementid_etablissement", referencedColumnName="id_etablissement")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="directeurID", referencedColumnName="id")
     *   }
     * )
     */
    private $directeur;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="Formation", mappedBy="etablissement", cascade={"persist"})
     */
    private $formations;

    /**
     * @var string
     * @ORM\Column(type="string", options={"default" = "default.png"}))
     * @Assert\File(mimeTypes={ "image/jpeg", "image/jpg", "image/png" }, mimeTypesMessage="format invalide")
     */
    private $logo;

    /**
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->directeur = new \Doctrine\Common\Collections\ArrayCollection();
        $this->formations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get idEtablissement
     *
     * @return integer
     */
    public function getIdEtablissement()
    {
        return $this->idEtablissement;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Etablissement
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
     * Set sigle
     *
     * @param string $sigle
     *
     * @return Etablissement
     */
    public function setSigle($sigle)
    {
        $this->sigle = $sigle;

        return $this;
    }

    /**
     * Get sigle
     *
     * @return string
     */
    public function getSigle()
    {
        return $this->sigle;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Etablissement
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set siteweb
     *
     * @param string $siteweb
     *
     * @return Etablissement
     */
    public function setSiteweb($siteweb)
    {
        $this->siteweb = $siteweb;

        return $this;
    }

    /**
     * Get siteweb
     *
     * @return string
     */
    public function getSiteweb()
    {
        return $this->siteweb;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Etablissement
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Etablissement
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
     * Add directeur
     *
     * @param \AppBundle\Entity\Directeur $directeurim
     *
     * @return Etablissement
     */
    public function addDirecteur(\AppBundle\Entity\Directeur $directeur)
    {
        $this->directeur[] = $directeur;

        return $this;
    }

    /**
     * Remove directeur
     *
     * @param \AppBundle\Entity\Directeur $directeurim
     */
    public function removeDirecteur(\AppBundle\Entity\Directeur $directeur)
    {
        $this->directeur->removeElement($directeur);
    }

    /**
     * Get directeur
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDirecteur()
    {
        return $this->directeur;
    }

    /**
     * Add formationidFormation
     *
     * @param Formation $formationidFormation
     *
     * @return Etablissement
     */
    public function addFormations(Formation $formationidFormation)
    {
        if (!$this->formations->contains($formationidFormation)) {
            $this->formations[] = $formationidFormation;
            $formationidFormation->setEtablissement($this);
        }
        //$this->formations = $formationidFormation;
        return $this;
    }

    /**
     * Remove formationidFormation
     *
     * @param Formation $formationidFormation
     */
    public function removeFormations(Formation $formationidFormation)
    {
        $this->formations->removeElement($formationidFormation);
        $formationidFormation->setEtablissement(NULL);
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $formations
     * @return Etablissement
     */
    public function setFormations(\Doctrine\Common\Collections\Collection $formations)
    {
        foreach ($formations as $formation) {
            $formation->setEtablissement($this);
        }
        $this->formations = $formations;

        return $this;
    }


    /**
     * Get formationidFormation
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFormations()
    {
        return $this->formations;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function setCustomData()
    {
        //$this->setCode(random_bytes(15));

        $fileName = md5(uniqid()).'.'.$this->getLogo()->guessExtension();
        try {
            $this->logo->move("../web/uploads/logo", $fileName);
        } catch (\Exception $exception) {
            throw $exception;
        }

        $this->setLogo($fileName);
    }


    /**
     * @ORM\PostRemove
     */
    public function deletePhoto()
    {
        try {
            unlink("../web/uploads/logo/".$this->getLogo());
        } catch (\Exception $exception) {
        }
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->getSigle() ." | ".$this->getNom();
    }
}

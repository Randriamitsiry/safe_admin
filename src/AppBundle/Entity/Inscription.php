<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inscription
 *
 * @ORM\Table(name="inscription")
 * @ORM\Entity
 */
class Inscription
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_inscription", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idInscription;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_inscription", type="date", nullable=false)
     */
    private $dateInscription;

    /**
     * @var Etablissement
     *
     * @ORM\ManyToOne(targetEntity="Etablissement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_etablissement", referencedColumnName="id_etablissement")
     * })
     */
    private $Etablissement;

    /**
     * @var Formation
     *
     * @ORM\ManyToOne(targetEntity="Formation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_formation", referencedColumnName="id_formation")
     * })
     */
    private $Formation;

    /**
     * @var AnneeScolaire
     *
     * @ORM\ManyToOne(targetEntity="AnneeScolaire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_annee_scolaire", referencedColumnName="id_annee_scolaire")
     * })
     */
    private $AnneeScolaire;

    /**
     * @var Etudiants
     *
     * @ORM\ManyToOne(targetEntity="Etudiants")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEtudiant", referencedColumnName="idEtudiant")
     * })
     */
    private $etudiant;

    /**
     * @var Niveau
     *
     * @ORM\ManyToOne(targetEntity="Niveau")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="niveauid_niveau", referencedColumnName="id_niveau")
     * })
     */
    private $Niveau;

    /**
     * Get idInscription
     *
     * @return integer
     */
    public function getIdInscription()
    {
        return $this->idInscription;
    }

    /**
     * Set numBordereau
     *
     * @param string $numBordereau
     *
     * @return Inscription
     */
    public function setNumBordereau($numBordereau)
    {
        $this->numBordereau = $numBordereau;

        return $this;
    }

    /**
     * Get numBordereau
     *
     * @return string
     */
    public function getNumBordereau()
    {
        return $this->numBordereau;
    }

    /**
     * Set dateInscription
     *
     * @param \DateTime $dateInscription
     *
     * @return Inscription
     */
    public function setDateInscription($dateInscription)
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    /**
     * Get dateInscription
     *
     * @return \DateTime
     */
    public function getDateInscription()
    {
        return $this->dateInscription;
    }

    /**
     * Set etablissement
     *
     * @param \AppBundle\Entity\Etablissement $etablissement
     *
     * @return Inscription
     */
    public function setEtablissement(\AppBundle\Entity\Etablissement $etablissement = null)
    {
        $this->Etablissement = $etablissement;

        return $this;
    }

    /**
     * Get etablissement
     *
     * @return \AppBundle\Entity\Etablissement
     */
    public function getEtablissement()
    {
        return $this->Etablissement;
    }

    /**
     * Set formation
     *
     * @param \AppBundle\Entity\Formation $formation
     *
     * @return Inscription
     */
    public function setFormation(\AppBundle\Entity\Formation $formation = null)
    {
        $this->Formation = $formation;

        return $this;
    }

    /**
     * Get formation
     *
     * @return \AppBundle\Entity\Formation
     */
    public function getFormation()
    {
        return $this->Formation;
    }

    /**
     * Set anneeScolaire
     *
     * @param \AppBundle\Entity\AnneeScolaire $anneeScolaire
     *
     * @return Inscription
     */
    public function setAnneeScolaire(\AppBundle\Entity\AnneeScolaire $anneeScolaire = null)
    {
        $this->AnneeScolaire = $anneeScolaire;

        return $this;
    }

    /**
     * Get anneeScolaire
     *
     * @return \AppBundle\Entity\AnneeScolaire
     */
    public function getAnneeScolaire()
    {
        return $this->AnneeScolaire;
    }

    /**
     * Set etudiant
     *
     * @param \AppBundle\Entity\Etudiants $etudiant
     *
     * @return Inscription
     */
    public function setEtudiant(\AppBundle\Entity\Etudiants $etudiant = null)
    {
        $this->etudiant = $etudiant;

        return $this;
    }

    /**
     * Get etudiant
     *
     * @return \AppBundle\Entity\Etudiants
     */
    public function getEtudiant()
    {
        return $this->etudiant;
    }

    /**
     * Set niveau
     *
     * @param \AppBundle\Entity\Niveau $niveau
     *
     * @return Inscription
     */
    public function setNiveau(\AppBundle\Entity\Niveau $niveau = null)
    {
        $this->Niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return \AppBundle\Entity\Niveau
     */
    public function getNiveau()
    {
        return $this->Niveau;
    }

    public function __toString()
    {
        return $this->getEtablissement()->getSigle() . '/'. $this->getEtudiant()->getIdetudiant();
    }
}

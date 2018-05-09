<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Intl\DateFormatter\DateFormat\YearTransformer;

/**
 * AnneeScolaire
 *
 * @ORM\Table(name="annee_scolaire", indexes={@ORM\Index(name="FKannee_scol317375", columns={"id_etablissement"})})
 * @ORM\Entity
 */
class AnneeScolaire
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_annee_scolaire", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAnneeScolaire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="date", nullable=false)
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="date", nullable=false)
     */
    private $dateFin;

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
     * @ORM\OneToMany(targetEntity="Promo"
     */

    /**
     * Get idAnneeScolaire
     *
     * @return integer
     */
    public function getIdAnneeScolaire()
    {
        return $this->idAnneeScolaire;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return AnneeScolaire
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return AnneeScolaire
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set etablissement
     *
     * @param \AppBundle\Entity\Etablissement $etablissement
     *
     * @return AnneeScolaire
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

    public function __toString()
    {
        $parser = new YearTransformer();
        return $this->getEtablissement()->getSigle()."/".$parser->format($this->dateDebut, 4);
        // TODO: Implement __toString() method.
    }
}

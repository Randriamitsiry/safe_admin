<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formation
 *
 * @ORM\Table(name="formation")
 * @ORM\Entity
 */
class Formation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_formation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFormation;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=50, nullable=false)
     */
    private $libelle;

    /**
     * @ORM\ManyToOne(targetEntity="Etablissement", inversedBy="formations", cascade={"persist"})
     * @ORM\JoinColumn(name="etablissement", referencedColumnName="id_etablissement")
     */
    private $etablissement;

    /**
     * @return Etablissement
     */
    public function getEtablissement()
    {
        return $this->etablissement;
    }

    /**
     * @param string
     * @return  Formation
     */
    public function setEtablissement(Etablissement $etablissement)
    {
        $this->etablissement = $etablissement;

        return $this;
    }

    /**
     * Constructor
     */
    public function __construct()
    {

    }

    /**
     * Get idFormation
     *
     * @return integer
     */
    public function getIdFormation()
    {
        return $this->idFormation;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Formation
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }


    public function __toString()
    {
        return $this->getLibelle();
    }
}

<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Obtention
 *
 * @ORM\Table(name="obtention", indexes={@ORM\Index(name="FKobtention333532", columns={"id_inscription"})})
 * @ORM\Entity
 */
class Obtention
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_obtention", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idObtention;

    /**
     * @var Inscription
     *
     * @ORM\ManyToOne(targetEntity="Inscription")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_inscription", referencedColumnName="id_inscription")
     * })
     */
    private $idInscription;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_obtention", type="date", nullable=false)
     */
    private $dateObtention;

    /**
     * @var string
     *
     * @ORM\Column(name="Mention", type="string", length=50, nullable=false)
     */
    private $mention;



    /**
     * Get idObtention
     *
     * @return integer
     */
    public function getIdObtention()
    {
        return $this->idObtention;
    }

    /**
     * Set dateObtention
     *
     * @param \DateTime $dateObtention
     *
     * @return Obtention
     */
    public function setDateObtention($dateObtention)
    {
        $this->dateObtention = $dateObtention;

        return $this;
    }

    /**
     * Get dateObtention
     *
     * @return \DateTime
     */
    public function getDateObtention()
    {
        return $this->dateObtention;
    }

    /**
     * Set mention
     *
     * @param string $mention
     *
     * @return Obtention
     */
    public function setMention($mention)
    {
        $this->mention = $mention;

        return $this;
    }

    /**
     * Get mention
     *
     * @return string
     */
    public function getMention()
    {
        return $this->mention;
    }

    /**
     * Set idInscription
     *
     * @param \AppBundle\Entity\Inscription $idInscription
     *
     * @return Obtention
     */
    public function setIdInscription(\AppBundle\Entity\Inscription $idInscription = null)
    {
        $this->idInscription = $idInscription;

        return $this;
    }

    /**
     * Get idInscription
     *
     * @return \AppBundle\Entity\Inscription
     */
    public function getIdInscription()
    {
        return $this->idInscription;
    }
}

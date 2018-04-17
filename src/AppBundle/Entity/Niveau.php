<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Niveau
 *
 * @ORM\Table(name="niveau")
 * @ORM\Entity
 */
class Niveau
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_niveau", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idNiveau;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=100, nullable=false)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="diplome_obtenu", nullable=true)
     */
    private $diplome;


    /**
     * Get idNiveau
     *
     * @return integer
     */
    public function getIdNiveau()
    {
        return $this->idNiveau;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Niveau
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

    /**
     * Set diplome
     *
     * @param string $diplome
     *
     * @return Niveau
     */
    public function setDiplome($diplome)
    {
        $this->diplome = $diplome;

        return $this;
    }

    /**
     * Get diplome
     *
     * @return string
     */
    public function getDiplome()
    {
        return $this->diplome;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->getLibelle();
    }
}

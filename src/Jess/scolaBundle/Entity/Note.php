<?php

namespace Jess\scolaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

class Note
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
     * @var Etudiant
     *
     * @ORM\ManyToOne(targetEntity="Etudiant", inversedBy="notes")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="etudiant", referencedColumnName="id")
     * })
     *
     * @Assert\NotBlank()
     */
    private $etudiant;

    /**
     * @var int
     *
     * @ORM\Column(name="valeur", type="integer")
     * @Assert\Range(min=0, max=20,
     *     minMessage="La valeur ne doit pas être negatif",
     *     maxMessage="Valeur max : 20")
     */
    private $valeur;

    /**
     * @var Matiere
     * @ORM\ManyToOne(targetEntity="Matiere", inversedBy="notes")
     * @ORM\JoinColumn(name="matiere_id", referencedColumnName="id")
     *
     * @Assert\NotBlank()
     */
    private $matiere;

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
     * Get etudiant.
     *
     * @return Etudiant
     */
    public function getEtudiant()
    {
        return $this->etudiant;
    }

    /**
     * Set etudiant.
     *
     * @param Etudiant $etudiant
     *
     * @return Note
     */
    public function setEtudiant($etudiant)
    {
        $this->etudiant = $etudiant;

        return $this;
    }

    /**
     * Get valeur.
     *
     * @return int
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * Set valeur.
     *
     * @param int $valeur
     *
     * @return Note
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;

        return $this;
    }

    /**
     * Get matiere.
     *
     * @return Matiere
     */
    public function getMatiere()
    {
        return $this->matiere;
    }

    /**
     * Set matiere.
     *
     * @param Matiere $matiere
     *
     * @return Note
     */
    public function setMatiere($matiere)
    {
        $this->matiere = $matiere;

        return $this;
    }
}

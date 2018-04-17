<?php

namespace Jess\scolaBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

class Matiere
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
     * @ORM\Column(name="nom", type="string", length=100, unique=true)
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="coefficient", type="integer")
     * @Assert\Range(min=1, max=5, minMessage="Valeur requis supérieur ou egal à 1")
     */
    private $coefficient;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Note", mappedBy="matiere")
     * @
     */
    private $notes;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Etudiant", inversedBy="matieres", cascade={"merge", "persist", "remove"})
     * @ORM\JoinTable(name="etudiant_matiere")
     */
    private $etudiants;

    /**
     * Matiere constructor.
     */
    public function __construct()
    {
        $this->notes = new ArrayCollection();
        $this->etudiants = new ArrayCollection();
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
     * @return Matiere
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get coefficient.
     *
     * @return int
     */
    public function getCoefficient()
    {
        return $this->coefficient;
    }

    /**
     * Set coefficient.
     *
     * @param int $coefficient
     *
     * @return Matiere
     */
    public function setCoefficient($coefficient)
    {
        $this->coefficient = $coefficient;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param ArrayCollection $notes
     *
     * @return Matiere
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getEtudiants()
    {
        return $this->etudiants;
    }

    /**
     * @param ArrayCollection $etudiants
     *
     * @return Matiere
     */
    public function setEtudiants($etudiants)
    {
        $this->etudiants = $etudiants;

        return $this;
    }

    /**
     * @param Etudiant $etudiant
     *
     * @return Matiere
     */
    public function addEtudiant(Etudiant $etudiant)
    {
        $this->etudiants->add($etudiant);

        return $this;
    }

    /**
     * @param Etudiant $etudiant
     *
     * @return Matiere
     */
    public function removeEtudiant(Etudiant $etudiant)
    {
        $this->etudiants->removeElement($etudiant);

        return $this;
    }

    /**
     * @param Note $note
     *
     * @return Matiere
     */
    public function addNote(Note $note)
    {
        $this->notes->add($note);

        return $this;
    }

    /**
     * @param Note $note
     *
     * @return Matiere
     */
    public function removeNote(Note $note)
    {
        $this->notes->removeElement($note);

        return $this;
    }
}

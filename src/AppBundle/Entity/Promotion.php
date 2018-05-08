<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\User;

/**
 *
 * @ORM\Table(name="promotion")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PromotionRepository")
 * @UniqueEntity(fields="name", message="Ce nom de liste existe déjà.")
 * @UniqueEntity(fields="codeList", message="Ce code de liste existe déjà.")
 */
class Promotion
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
     * @ORM\Column(name="codeList", type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="Remplissez le code de la liste")
     * @Assert\Length(max=4, exactMessage="Le code de la liste doit contenir 4 chiffres.", maxMessage="Le code de la liste est trop long, veuillez saisir 4 chiffres.", min=4, minMessage="Le code de la liste est trop court, veuillez saisir 4 chiffres.")
     * @Assert\Type("digit", message="Valeur invalide, veuillez saisir des chiffres.")
     */
    private $codeList;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="Remplissez le nom de la liste")
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Etablissement", inversedBy="promotions", cascade={"persist"})
     * @ORM\JoinColumn(referencedColumnName="id_etablissement")
     */
    private $etablissement;

    /**
     *
     * @var type
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\PromotionCours", mappedBy="promotion", cascade="persist")
     */
    private $promotionCours;


    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Examen", mappedBy="promotions", cascade={"persist"})
     */
    private $examens;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->promotionCours = new ArrayCollection();
        $this->examens = new ArrayCollection();
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
     * Set codeList.
     *
     * @param string|null $codeList
     *
     * @return Promotion
     */
    public function setCodeList($codeList = null)
    {
        $this->codeList = $codeList;

        return $this;
    }

    /**
     * Get codeList.
     *
     * @return string|null
     */
    public function getCodeList()
    {
        return $this->codeList;
    }

    /**
     * Set name.
     *
     * @param string|null $name
     *
     * @return Promotion
     */
    public function setName($name = null)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set etablissement.
     *
     * @param \AppBundle\Entity\Etablissement|null $etablissement
     *
     * @return Promotion
     */
    public function setEtablissement(\AppBundle\Entity\Etablissement $etablissement = null)
    {
        $this->etablissement = $etablissement;

        return $this;
    }

    /**
     * Get etablissement.
     *
     * @return \AppBundle\Entity\Etablissement|null
     */
    public function getEtablissement()
    {
        return $this->etablissement;
    }

    /**
     * Add promotionCour.
     *
     * @param \AppBundle\Entity\PromotionCours $promotionCour
     *
     * @return Promotion
     */
    public function addPromotionCour(\AppBundle\Entity\PromotionCours $promotionCour)
    {
        $this->promotionCours[] = $promotionCour;

        return $this;
    }

    /**
     * Remove promotionCour.
     *
     * @param \AppBundle\Entity\PromotionCours $promotionCour
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removePromotionCour(\AppBundle\Entity\PromotionCours $promotionCour)
    {
        return $this->promotionCours->removeElement($promotionCour);
    }

    /**
     * Get promotionCours.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPromotionCours()
    {
        return $this->promotionCours;
    }

    /**
     * Add examen.
     *
     * @param \AppBundle\Entity\Examen $examen
     *
     * @return Promotion
     */
    public function addExamen(\AppBundle\Entity\Examen $examen)
    {
        $this->examens[] = $examen;

        return $this;
    }

    /**
     * Remove examen.
     *
     * @param \AppBundle\Entity\Examen $examen
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeExamen(\AppBundle\Entity\Examen $examen)
    {
        return $this->examens->removeElement($examen);
    }

    /**
     * Get examens.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getExamens()
    {
        return $this->examens;
    }
}

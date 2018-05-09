<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * PromotionCours
 *
 * @ORM\Table(name="promotion_cours")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PromotionCoursRepository")
 *
 */
class PromotionCours
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebut", type="datetime", nullable=true)
     * @Assert\NotNull()
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFin", type="datetime", nullable=true)
     *
     */
    private $dateFin;

    /**
     * @ORM\Column(name="libelle", type="string")
     */
    private $libelle;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Promotion", inversedBy="promotionCours")
     * @ORM\JoinColumn(name="promotion_id", onDelete="CASCADE")
     * @Assert\NotBlank (message="Veuillez sélectionnez la liste des étudiants pour le cours.")
     *
     */
    private $promotion;


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
     * Set dateDebut.
     *
     * @param \DateTime|null $dateDebut
     *
     * @return PromotionCours
     */
    public function setDateDebut($dateDebut = null)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut.
     *
     * @return \DateTime|null
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin.
     *
     * @param \DateTime|null $dateFin
     *
     * @return PromotionCours
     */
    public function setDateFin($dateFin = null)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin.
     *
     * @return \DateTime|null
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set promotion.
     *
     * @param \AppBundle\Entity\Promotion|null $promotion
     *
     * @return PromotionCours
     */
    public function setPromotion(\AppBundle\Entity\Promotion $promotion = null)
    {
        $this->promotion = $promotion;

        return $this;
    }

    /**
     * Get promotion.
     *
     * @return \AppBundle\Entity\Promotion|null
     */
    public function getPromotion()
    {
        return $this->promotion;
    }
}

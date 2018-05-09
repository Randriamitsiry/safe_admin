<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use AppBundle\Resource\TimestampableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\Promotion;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ExamenRepository")
 * @ORM\Table(name="examen")
 * @ORM\HasLifecycleCallbacks()
 */
class Examen
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="message.form.notblank.examen", groups={"admin_user_create", "admin_user_edit", "admin_user_edit_profile"})
     */
    protected $name;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Promotion", inversedBy="examens", cascade={"persist"})
     */
    public $promotions;

    /**
     * @var string
     *
     * @ORM\Column(name="dateOuverture", type="date")
     **/
    public $dateOuverture;

    /**
     * @var string
     *
     * @ORM\Column(name="dateFermeture", type="date")
     */
    public $dateFermeture;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->promotions = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name.
     *
     * @param string|null $name
     *
     * @return Examen
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
     * Set dateOuverture.
     *
     * @param \DateTime $dateOuverture
     *
     * @return Examen
     */
    public function setDateOuverture($dateOuverture)
    {
        $this->dateOuverture = $dateOuverture;

        return $this;
    }

    /**
     * Get dateOuverture.
     *
     * @return \DateTime
     */
    public function getDateOuverture()
    {
        return $this->dateOuverture;
    }

    /**
     * Set dateFermeture.
     *
     * @param \DateTime $dateFermeture
     *
     * @return Examen
     */
    public function setDateFermeture($dateFermeture)
    {
        $this->dateFermeture = $dateFermeture;

        return $this;
    }

    /**
     * Get dateFermeture.
     *
     * @return \DateTime
     */
    public function getDateFermeture()
    {
        return $this->dateFermeture;
    }

    /**
     * Add promotion.
     *
     * @param \AppBundle\Entity\Promotion $promotion
     *
     * @return Examen
     */
    public function addPromotion(\AppBundle\Entity\Promotion $promotion)
    {
        $this->promotions[] = $promotion;

        return $this;
    }

    /**
     * Remove promotion.
     *
     * @param \AppBundle\Entity\Promotion $promotion
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removePromotion(\AppBundle\Entity\Promotion $promotion)
    {
        return $this->promotions->removeElement($promotion);
    }

    /**
     * Get promotions.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPromotions()
    {
        return $this->promotions;
    }

    /**
     * Set promotions.
     *
     * @param \AppBundle\Entity\Promotion|null $promotions
     *
     * @return Examen
     */
    public function setPromotions(\AppBundle\Entity\Promotion $promotions = null)
    {
        $this->promotions = $promotions;

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }
}

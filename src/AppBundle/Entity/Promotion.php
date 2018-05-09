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
     * @ORM\ManyToOne(targetEntity="AnneeScolaire", inversedBy="promotions")
     */
    private $anneecolaire;

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

}

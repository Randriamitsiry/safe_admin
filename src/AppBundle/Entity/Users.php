<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Role;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 * @ORM\Entity
 * @ORM\Table(name="user_data")
 * @ORM\HasLifecycleCallbacks
 */
class Users implements UserInterface, \Serializable
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
     * @ORM\Column(name="last_name", type="string", length=150)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=150)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=200, unique=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="email_secours", type="string", length=200, nullable=true, unique=true)
     */
    private $emailSecours;

    /**
     * @var Etablissement
     * @ORM\ManyToOne(targetEntity="Etablissement")
     * @ORM\JoinColumn(referencedColumnName="id_etablissement")
     */
    private $etablissement;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=100)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     */
    private $plain_password;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_connected", type="boolean")
     */
    private $isConnected;

    /**
     * @var string
     *
     * @ORM\Column(name="avatar", type="string", length=255, nullable=true)
     */
    private $avatar;

    /**
     * @ORM\ManyToMany(targetEntity="Role", inversedBy="users")
     *
     */
    private $roles;

    /**
     * @var string
     *
     * @ORM\Column(name="inscription", type="string", length=19)
     */
    private $inscription;

    public function __construct() {
        $this->isActive     = false;
        $this->isConnected  = false;
        $this->roles = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set emailSecours
     *
     * @param string $emailSecours
     *
     * @return User
     */
    public function setEmailSecours($emailSecours)
    {
        $this->emailSecours = $emailSecours;

        return $this;
    }

    /**
     * Get emailSecours
     *
     * @return string
     */
    public function getEmailSecours()
    {
        return $this->emailSecours;
    }

    /**
     * Set etablissement
     *
     * @param string $etablissement
     *
     * @return User
     */
    public function setEtablissement($etablissement)
    {
        $this->etablissement = $etablissement;

        return $this;
    }

    /**
     * Get etablissement
     *
     * @return Etablissement
     */
    public function getEtablissement()
    {
        return $this->etablissement;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return bool
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set isConnected
     *
     * @param boolean $isConnected
     *
     * @return User
     */
    public function setIsConnected($isConnected)
    {
        $this->isConnected = $isConnected;

        return $this;
    }

    /**
     * Get isConnected
     *
     * @return bool
     */
    public function getIsConnected()
    {
        return $this->isConnected;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     *
     * @return User
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set inscription
     *
     * @param string $inscription
     *
     * @return User
     */
    public function setInscription($inscription)
    {
        $this->inscription = $inscription;

        return $this;
    }

    /**
     * Get inscription
     *
     * @return string
     */
    public function getInscription()
    {
        return $this->inscription;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPlainPassword()
    {
        return $this->plain_password;
    }

    /**
     * @param string $plain_password
     */
    public function setPlainPassword($plain_password)
    {
        $this->plain_password = $plain_password;
    }

    /**
     * String representation of object
     * @link http://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password
        ));
    }

    /**
     * Constructs the object
     * @link http://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            ) = unserialize($serialized);
    }

    /**
     * Returns the roles granted to the user.
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return Role[] The user roles
     */
    public function getRoles()
    {
        return $this->roles->toArray();
    }

    /**
     * @param Role[] $roles
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
    }




    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt() {}

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials() {}
    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function setCustomData()
    {
        $fileName = md5(uniqid()).'.'.$this->getAvatar()->guessExtension();
        try {
            $this->avatar->move("../web/uploads/avatar", $fileName);
        } catch (\Exception $exception) {
            throw $exception;
        }

        $this->setAvatar($fileName);
    }
}
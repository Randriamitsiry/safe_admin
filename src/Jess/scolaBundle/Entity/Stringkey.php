<?php
/**
 * Created by PhpStorm.
 * User: gabriel
 * Date: 4/5/18
 * Time: 9:47 AM
 */

namespace Jess\scolaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
*/
class Stringkey
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     */
    private $identifiant;

    /**
     * StringKey constructor.
     * @param $identifiant
     */
    public function __construct($identifiant)
    {
        $this->identifiant = $identifiant;
    }

    /**
     * @return string
     */
    public function getIdentifiant()
    {
        return $this->identifiant;
    }

    /**
     * @param string $identifiant
     * @return StringKey
     */
    public function setIdentifiant($identifiant)
    {
        $this->identifiant = $identifiant;

        return $this;
    }
}

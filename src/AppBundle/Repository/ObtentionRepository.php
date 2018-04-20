<?php
/**
 * Created by PhpStorm.
 * User: jess
 * Date: 18/04/18
 * Time: 14:44
 */

namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class ObtentionRepository extends EntityRepository
{
    /**
     * @param $idE
     * @return string
     */
    public function getObtention($idE)
    {
        $qb = $this->createQueryBuilder("Ob");
        $query = $qb->join("Ob.idInscription", "inscription")
            ->join("inscription.etudiant", "etudiant")
            ->join("inscription.Formation", "formation")
            ->addSelect("inscription")
            ->addSelect("formation")
            ->addSelect("etudiant")
            ->where("etudiant.idetudiant = :idE")
            ->setParameter("idE", $idE);

        return $query->getQuery()->getArrayResult();
    }
}
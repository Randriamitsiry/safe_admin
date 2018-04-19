<?php
/**
 * Created by PhpStorm.
 * User: jess
 * Date: 19/04/18
 * Time: 10:28
 */

namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class InscriptionRepository extends EntityRepository
{
    public function getInscription($idE)
    {
        $qb = $this->createQueryBuilder("insc");
        $qb->select("insc")
            ->join("insc.Formation", "formation")
            ->addSelect("formation")
            ->join("insc.etudiant", "etudiant")
            ->join("insc.Etablissement", "etablissement")
            ->addSelect("etablissement")
            ->join("insc.AnneeScolaire", "anneeSc")
            ->addSelect("anneeSc")
            ->where("etudiant.idetudiant = :idE")
            ->setParameter("idE", $idE);
        return $qb->getQuery()->getArrayResult();
    }
}
<?php

namespace FunOldies\MainBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class PetRepository extends EntityRepository
{
    public function getPet()
    //$gid is above param passed in if narrowing
    {
        $qb = $this->createQueryBuilder('p')
                ->select('p')
                //->where('g.id = :gid')
                ->addOrderBy('p.id', 'DESC');
                //->setParameter('gid', $gid);
                $qb->setMaxResults(1);
        
        return $qb->getQuery()
                       ->getResult();
    }
}
?>
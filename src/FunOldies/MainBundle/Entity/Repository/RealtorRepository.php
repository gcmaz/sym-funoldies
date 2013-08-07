<?php

namespace FunOldies\MainBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class RealtorRepository extends EntityRepository
{
    public function getListing()
    //$gid is above param passed in if narrowing
    {
        $qb = $this->createQueryBuilder('y')
                ->select('y')
                //->where('g.id = :gid')
                ->addOrderBy('y.id', 'DESC');
                //->setParameter('gid', $gid);
                $qb->setMaxResults(1);
        
        return $qb->getQuery()
                       ->getResult();
    }
}
?>
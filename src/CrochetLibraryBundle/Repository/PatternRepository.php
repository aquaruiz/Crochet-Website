<?php

namespace CrochetLibraryBundle\Repository;

use CrochetLibraryBundle\Entity\Category;

/**
 * PatternRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PatternRepository extends \Doctrine\ORM\EntityRepository
{
    public function findOneByIdJoinedToCategory($productId)
    {
        $query = $this->getEntityManager()
            ->createQuery(
                'SELECT p, c FROM CrochetLibraryBundle:Pattern p
        JOIN paterns_categories c
        WHERE p.id = :id'
            )->setParameter('id', $productId);

        return $query->getOneOrNullResult();
    }
}

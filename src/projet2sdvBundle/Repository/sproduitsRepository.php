<?php

namespace projet2sdvBundle\Repository;

use Doctrine\ORM\Tools\Pagination\Paginator;
/**
 * sproduitsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class sproduitsRepository extends \Doctrine\ORM\EntityRepository
{

    public function getProduits($page, $nbParPage){
		$qb=$this->createQueryBuilder('p');
        $query = $qb->getQuery();
        $query->setFirstResult(($page-1)*$nbParPage)
			->setMaxResults($nbParPage);
        return new Paginator($query, true);
    }

	public function findProductLike($pattern)
	{
		return $qb=$this->createQueryBuilder('p')
			->where('p.nom like :pattern')
			->setParameter('pattern', '%'.$pattern.'%')
			->getQuery()->getResult();
    }
}

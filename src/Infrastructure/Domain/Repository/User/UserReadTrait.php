<?php

namespace School\Infrastructure\Domain\Repository\User;

use Doctrine\ORM\AbstractQuery;

trait UserReadTrait
{
	public function findAllAsArray()
	{
		$qb = $this->createQueryBuilder('u');
		$users = $qb->select('u.name, u.email')->getQuery();

		return $users->getResult(AbstractQuery::HYDRATE_ARRAY);
	}
}
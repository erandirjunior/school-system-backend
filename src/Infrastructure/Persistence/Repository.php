<?php

namespace School\Infrastructure\Persistence;

abstract class Repository extends \Doctrine\ORM\EntityRepository
{
	public function persist($entity)
	{
		$this->getEntityManager()->persist($entity);
	}

	public function flush()
	{
		try {
			$this->getEntityManager()->flush();

			return true;
		} catch (\Exception $e) {
			return false;
		}
	}
}
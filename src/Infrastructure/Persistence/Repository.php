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
			dump($e->getMessage());
			return false;
		}
	}

	public function edit($entity)
	{
		$this->getEntityManager()->merge($entity);

		return $this->flush();
	}
}
<?php

namespace School\Infrastructure\Persistence;

use Doctrine\ORM\EntityRepository;

class Repository extends EntityRepository
{
	public function persist($entity)
	{
		$this->_em->persist($entity);
	}
}
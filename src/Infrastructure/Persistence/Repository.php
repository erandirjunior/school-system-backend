<?php

namespace School\Infrastructure\Persistence;

use Doctrine\ORM\EntityRepository;

/**
 * Class Repository
 * @package School\Infrastructure\Persistence
 */
class Repository extends EntityRepository
{
    /**
     * Insert entity in database.
     *
     * @return bool
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function flush(): bool
    {
        return !$this->_em->flush();
    }

    /**
     * Send entity to be menaged by EntityManager class.
     *
     * @param $entity
     * @return $this
     * @throws \Doctrine\ORM\ORMException
     */
    public function persist($entity): Repository
	{
		$this->_em->persist($entity);

		return $this;
	}
}
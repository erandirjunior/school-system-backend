<?php

namespace School\Infrastructure\Persistence;

use Doctrine\ORM\Mapping\ClassMetadata;
use School\Infrastructure\Factory\FactoryRepository;

class RepositoryCreator implements FactoryRepository
{
	public static function create(string $repository, string $entity)
	{
		$entityDB = new EntityDataBase();

		return new $repository($entityDB->getConnection(), new ClassMetadata($entity));
	}
}
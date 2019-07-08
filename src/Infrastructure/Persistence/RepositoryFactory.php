<?php

namespace School\Infrastructure\Persistence;

class RepositoryFactory
{
	public static function create(string $entityName)
	{
		$manager = EntityManagerFactory::connection();

		return $manager->getRepository($entityName);
	}
}
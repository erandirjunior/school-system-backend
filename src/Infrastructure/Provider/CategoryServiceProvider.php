<?php

namespace School\Infrastructure\Provider;

use School\Domain\Category\CategoryService;
use School\Domain\Category\CategoryValidator;
use School\Infrastructure\Factory\FactoryProvider;
use School\Infrastructure\Persistence\EntityManagerFactory;

class CategoryServiceProvider implements FactoryProvider
{
	public function create()
	{
		$connection = EntityManagerFactory::connection();

		return new CategoryService($connection, new CategoryValidator());
	}
}
<?php

namespace School\Infrastructure\Provider;

use School\Domain\Category\Category;
use School\Domain\Category\CategoryService;
use School\Domain\Category\CategoryValidator;
use School\Infrastructure\Factory\FactoryProvider;
use School\Infrastructure\Persistence\EntityManagerFactory;

class CategoryServiceProvider implements FactoryProvider
{
	public function create()
	{
		$connection = EntityManagerFactory::connection();
		$category 	= $connection->getRepository(Category::class);

		return new CategoryService($category, new CategoryValidator());
	}
}
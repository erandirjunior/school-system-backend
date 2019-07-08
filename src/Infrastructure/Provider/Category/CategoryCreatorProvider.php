<?php

namespace School\Infrastructure\Provider\Category;

use School\Domain\Category\Category;
use School\Domain\Category\CategoryCreatorService;
use School\Domain\Category\CategoryValidator;
use School\Infrastructure\Factory\FactoryProvider;
use School\Infrastructure\Persistence\RepositoryFactory;

class CategoryCreatorProvider implements FactoryProvider
{
	public function getInstance()
	{
		$category = RepositoryFactory::create(Category::class);

		return new CategoryCreatorService($category, new CategoryValidator());
	}
}
<?php

namespace School\Infrastructure\Provider;

use School\Domain\Category\Category;
use School\Domain\User\User;
use School\Domain\User\UserBase;
use School\Infrastructure\Domain\Validator\User\UserValidator;
use School\Infrastructure\Factory\FactoryProvider;
use School\Infrastructure\Persistence\RepositoryFactory;

class UserServiceProvider implements FactoryProvider
{
	public function getInstance()
	{
		$user 		= RepositoryFactory::create(User::class);
		$category 	= RepositoryFactory::create(Category::class);
		$validator	= new UserValidator();

		return new UserBase($user, $validator, $category);
	}
}
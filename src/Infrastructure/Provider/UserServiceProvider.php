<?php

namespace School\Infrastructure\Provider;

use School\Domain\Category\Category;
use School\Domain\User\User;
use School\Domain\User\UserService;
use School\Domain\User\UserValidator;
use School\Infrastructure\Factory\FactoryProvider;
use School\Infrastructure\Persistence\EntityManagerFactory;

class UserServiceProvider implements FactoryProvider
{
	public function create()
	{
		$connection = EntityManagerFactory::connection();
		$user 		= $connection->getRepository(User::class);
		$category 	= $connection->getRepository(Category::class);

		return new UserService($user, new UserValidator(), $category);
	}
}
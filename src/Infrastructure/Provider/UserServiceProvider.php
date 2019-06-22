<?php

namespace School\Application\Factory;

use School\Domain\User\UserService;
use School\Infrastructure\Factory\FactoryProvider;
use School\Infrastructure\Persistence\EntityManagerFactory;
use School\Domain\User\UserValidator;

class UserProviderProvider implements FactoryProvider
{
	public function create()
	{
		$connection = EntityManagerFactory::connection();

		return new UserService($connection, new UserValidator());
	}
}
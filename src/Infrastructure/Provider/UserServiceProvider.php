<?php

namespace School\Infrastructure\Provider\Service;

use School\Domain\User\UserService;
use School\Domain\User\UserValidator;
use School\Infrastructure\Factory\FactoryProvider;
use School\Infrastructure\Persistence\EntityManagerFactory;

class UserServiceProvider implements FactoryProvider
{
	public function create()
	{
		$connection = EntityManagerFactory::connection();

		return new UserService($connection, new UserValidator());
	}
}
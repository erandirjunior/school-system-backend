<?php

namespace School\Application\Factory;

use School\Domain\User\Entities\User;
use School\Domain\User\UserService;
use School\Infrastructure\Domain\Repository\UserRepository;
use School\Infrastructure\Factory\FactoryService;
use School\Infrastructure\Persistence\RepositoryCreator;
use School\Domain\User\UserValidator;

class UserServiceFactory implements FactoryService
{
	public function create()
	{
		$repository = RepositoryCreator::create(UserRepository::class, User::class);

		return new UserService($repository, new UserValidator());
	}
}
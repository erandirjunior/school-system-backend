<?php

namespace School\Infrastructure\Provider\User;

use School\Domain\User\User;
use School\Domain\User\UserShowerService;
use School\Infrastructure\Domain\Validator\User\UserValidator;
use School\Infrastructure\Factory\FactoryProvider;
use School\Infrastructure\Persistence\RepositoryFactory;

class UserShowerProvider implements FactoryProvider
{
	public function getInstance()
	{
		$user 		= RepositoryFactory::create(User::class);
		$validator	= new UserValidator();

		return new UserShowerService($user, $validator);
	}
}
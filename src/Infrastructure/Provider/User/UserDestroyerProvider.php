<?php

namespace School\Infrastructure\Provider\User;

use School\Domain\User\User;
use School\Domain\User\UserDestroyerService;
use School\Infrastructure\Factory\FactoryProvider;
use School\Infrastructure\Persistence\RepositoryFactory;

class UserDestroyerProvider implements FactoryProvider
{
	public function getInstance()
	{
		$user = RepositoryFactory::create(User::class);

		return new UserDestroyerService($user);
	}
}
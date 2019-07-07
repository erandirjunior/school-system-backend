<?php

namespace School\Domain\User;

use Doctrine\ORM\EntityManager;
use School\Domain\Category\Category;
use School\Infrastructure\Domain\Repository\CategoryRepository;
use School\Infrastructure\Domain\Repository\UserRepository;
use School\Infrastructure\Domain\Service\Service;

class UserShowerService extends Service
{
	use UserBase;

	public function show()
	{
		$users = $this->repository->findAllAsArray();

		return $this->setResponse($users)->response();
	}
}
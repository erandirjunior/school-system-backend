<?php

namespace School\Domain\User;

use School\Infrastructure\Service\Service;

class UserShowerService extends Service
{
	use UserBase;

	public function show()
	{
		$users = $this->repository->findAllAsArray();

		return $this->setResponse($users)->response();
	}
}
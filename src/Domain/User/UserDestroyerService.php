<?php

namespace School\Domain\User;

use School\Infrastructure\Domain\Repository\UserRepository;
use School\Infrastructure\Domain\Service\Service;

class UserDestroyerService extends Service
{
	protected $repository;

	public function __construct(UserRepository $userRepository)
	{
		$this->repository = $userRepository;
	}

	public function delete($id)
	{
		$user = $this->repository->find($id);

		$user->setDeletedAt(new \DateTime());

		$this->setResponse(["Error: registry wasn't delete!"], 500);

		if ($this->repository->edit($user)) {
			$this->setResponse(["Registry deleted with success!"], 204);
		}

		return $this->response();
    }
}
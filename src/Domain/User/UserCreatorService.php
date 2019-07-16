<?php

namespace School\Domain\User;

use School\Infrastructure\Domain\Validator\Validator;
use School\Infrastructure\Service\Service;

class UserCreatorService extends Service
{
	use UserBase, UserCheckEmailDuplicate;

	public function create($content)
	{
		$this->validator->validate($content);

		if (!$this->validator->fail()) {
			return $this->setResponse($this->validator->getErrors(), 400)->response();
		}

		return $this->insertIfUniqueEmail($content);
	}

	public function insertIfUniqueEmail($content)
	{
		if ($this->checkIfEmailExists($content['email'])) {
			return $this->setResponse(['Email já está em uso!'], 400)->response();
		}

		return $this->insert($content);
	}

	private function insert($content)
	{
		$user = $this->createObject($content);

		$this->setResponse(['Error'], 500);

		$this->repository->persist($user);

		if ($this->repository->flush($user)) {
			$this->setResponse(['Success'], 201);
		}

		return $this->response();
	}

	private function createObject($content)
	{
		$user = new User();
		$user->setName($content['name'])
			->setPassword($content['password'])
			->setEmail($content['email']);

		return $user;
	}
}
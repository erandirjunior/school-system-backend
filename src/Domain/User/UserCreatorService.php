<?php

namespace School\Domain\User;

use School\Infrastructure\Domain\Validator\Validator;
use School\Infrastructure\Service\Service;

class UserCreatorService extends Service
{
	use UserBase;

	public function create($content)
	{
		$content = [
			'name' => 'antonio-erandir',
			'email' => 'dsdfdfsd',
			'password' => '111'
		];
		$this->validator->validate($content);

		if (!$this->validator->fail()) {
			return $this->setResponse($this->validator->getErrors(), 400)->response();
		}

		//return $this->insert($content);

	}

	private function insert($content)
	{
		$user = $this->createObject($content);

		$this->setResponse(['Error'], 500);

		if ($this->repository->edit($user)) {
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
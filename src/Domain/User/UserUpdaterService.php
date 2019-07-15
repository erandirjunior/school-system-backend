<?php

namespace School\Domain\User;

use School\Infrastructure\Service\Service;

class UserUpdaterService extends Service
{
	use UserBase;

	public function update(array $content)
	{
		$this->validator->validate();

		if (!$this->validator->isValid()) {
			return $this->setResponse([], 400)->response();
		}

		return $this->renew($content);
    }

	private function renew(array $content)
	{
		/** @var User $user */
		$user = $this->repository->find($content['id']);

		$user->setName($content['name'])
			->setEmail($content['email'])
			->setPassword($content['password']);

		if (!$this->repository->edit($user)) {
			return $this->setResponse(['Error'], 500)->response();
		}

		return $this->setResponse([], 204);
    }
}
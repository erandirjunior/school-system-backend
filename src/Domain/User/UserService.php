<?php

namespace School\Domain\User;

use School\Domain\User\Entities\User;
use School\Infrastructure\Domain\Repository\UserRepository;

class UserService
{
	private $repository;

	private $validator;

	public function __construct(UserRepository $userRepository, UserValidator $userValidator)
	{
		$this->repository 	= $userRepository;
		$this->validator	= $userValidator;
	}

	public function create()
	{
		$user = new User();
		$user
			->setName('Erandir')
			->setEmail('teste@teste.com')
			->setPassword(123445);

		dump([$user, $this->repository->findAll()]);

		dump($this->repository->persist($user));
	}
}
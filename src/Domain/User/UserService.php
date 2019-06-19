<?php

namespace School\Domain\User;

use School\Domain\User\Entities\User;
use School\Infrastructure\Domain\Repository\UserRepository;
use School\Infrastructure\Persistence\EntityDataBase;

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
			->setName('Erandir22')
			->setEmail('teste@teste.co.brm')
			->setPassword(123445);


        $this->repository->persist($user);
        dump($this->repository->flush());
        dump([$user, $this->repository->findAll()]);
    }
}
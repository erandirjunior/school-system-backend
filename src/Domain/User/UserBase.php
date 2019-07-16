<?php

namespace School\Domain\User;

use School\Infrastructure\Domain\Repository\User\UserRepository;
use School\Infrastructure\Domain\Validator\User\UserValidator;

trait UserBase
{
	protected $repository;

	protected $validator;

	public function __construct(UserRepository $userRepository,
								UserValidator $userValidator)
	{
		$this->repository 			= $userRepository;
		$this->validator			= $userValidator;
	}
}
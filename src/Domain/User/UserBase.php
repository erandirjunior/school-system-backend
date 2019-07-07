<?php

namespace School\Domain\User;

use School\Infrastructure\Domain\Repository\CategoryRepository;
use School\Infrastructure\Domain\Repository\UserRepository;
use School\Infrastructure\Domain\Validator\User\UserValidator;

trait UserBase
{
	protected $repository;

	protected $validator;

	protected $categoryRepository;

	public function __construct(UserRepository $userRepository,
								UserValidator $userValidator,
								CategoryRepository $categoryRepository)
	{
		$this->repository 			= $userRepository;
		$this->validator			= $userValidator;
		$this->categoryRepository	= $categoryRepository;
	}
}
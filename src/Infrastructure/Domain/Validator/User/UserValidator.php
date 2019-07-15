<?php

namespace School\Infrastructure\Domain\Validator\User;

use School\Infrastructure\Validator\Validator;
use Respect\Validation\Validator as v;

class UserValidator extends Validator
{
	public function __construct()
	{
		$this->rules = [
			'name' 	=> v::notEmpty()->alpha("-'"),
			'email' => v::optional(v::alpha("-'")),
			'password' 	=> v::optional(v::phone())
		];
	}
}
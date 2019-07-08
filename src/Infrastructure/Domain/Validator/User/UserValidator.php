<?php

namespace School\Infrastructure\Domain\Validator\User;

use School\Infrastructure\Domain\Validator\Validator;

class UserValidator extends Validator
{
	protected $rules = [
		'name' => 'string',
		'email' => 'string',
		'password' => 'string',
		'category' => 'string',
	];
}
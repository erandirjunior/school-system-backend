<?php

namespace School\Infrastructure\Validator;

use Dotenv\Exception\ValidationException;
use Respect\Validation\Validator as v;

abstract class Validator
{
	protected $fail = true;

	protected $rules;

	protected $messages = [];

	protected function make($content, $rules)
	{
		foreach ($rules as $key => $value) {
			try {
				$validator = v::key($key, $value);

				if (!$validator->validate($content[$key])) {
					$this->fail = false;
				}

				$validator->assert($content);
			} catch (ValidationException $exception) {
				$this->messages[] = $exception->getMessages()[0];
			}
		}
	}

	public function fail()
	{
		return $this->fail;
	}

	public function getErrors()
	{
		return $this->messages;
	}

	public function validate($content)
	{
		$this->make($content, $this->rules);
	}
}
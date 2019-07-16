<?php

namespace School\Infrastructure\Validator;

use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator as v;

abstract class Validator
{
	protected $rules;

	protected $messages = [];

	protected function make($content, $rules)
	{
		foreach ($rules as $key => $value) {
			try {
				$validator = v::key($key, $value);
				if (!array_key_exists($key, $content)) {
					$this->messages[] = "Campo {$key} deve ser enviado";
					$this->fail = false;
					break;
				}

				$validator->assert($content);
			} catch (ValidationException $exception) {
				$this->messages[] = $exception->getMessages()[0];
			}
		}
	}

	public function fail()
	{
		return !$this->messages;
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
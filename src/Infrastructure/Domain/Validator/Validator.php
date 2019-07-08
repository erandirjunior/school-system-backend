<?php

namespace School\Infrastructure\Domain\Validator;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Illuminate\Validation\Factory;

abstract class Validator
{
	// TODO configurar o validator do laravel.
	/**
	 * Receive all rules validation.
	 *
	 * @var array $rules
	 */
	protected $rules;
	/**
	 * @var Factory
	 */
	protected $validatorFactory;

	protected $validator;

	public function __construct()
	{
		$this->configure();
	}

	/**
	 * Check if data are valids.
	 *
	 * @param array $content
	 *
	 * @return bool
	 */
	public function validate(array $content): Validator
	{
		$this->validator = $this->validatorFactory->make($content, $this->rules);

		return $this;
	}

	/**
	 * Return if data are valids.
	 *
	 * @return bool
	 */
	public function isValid(): bool
	{
		return $this->validator->fails();
	}

	/**
	 * Get errors.
	 *
	 * @return mixed
	 */
	public function getErros()
	{
		return $this->validator->errors()->messages();
	}

	private function configure()
	{
		$filesystem = new Filesystem();
		$loader = new FileLoader(
			$filesystem, dirname(dirname(__FILE__)).'/lang'
		);
		$loader->addNamespace(
			'lang',
			dirname(dirname(__FILE__)).'/lang'
		);

		$loader->load('en', 'validation', 'lang');

		$this->validatorFactory = new Factory(new Translator($loader, 'en'));
	}
}
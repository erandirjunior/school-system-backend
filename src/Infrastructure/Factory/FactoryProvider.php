<?php

namespace School\Infrastructure\Factory;

interface FactoryProvider
{
	/**
	 * return a new Service.
	 *
	 * @return mixed
	 */
	public function create();
}
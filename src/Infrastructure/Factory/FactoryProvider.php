<?php

namespace School\Infrastructure\Factory;

interface FactoryService
{
	/**
	 * return a new Service.
	 *
	 * @return mixed
	 */
	public function create();
}
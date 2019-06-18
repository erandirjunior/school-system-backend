<?php

namespace School\Infrastructure\Factory;

interface FactoryRepository
{
	public static function create(string $repository, string $entity);
}
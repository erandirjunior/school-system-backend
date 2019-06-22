<?php

namespace School\Infrastructure\Persistence;

class EnttityManagerFactory
{
	public static function connection()
	{
		return (new EntityManager())->getConnection();
	}
}
<?php

namespace School\Infrastructure\Persistence;

class EntityManagerFactory
{
	public static function connection()
	{
		return (new EntityManagerDataBase())->getConnection();
	}
}
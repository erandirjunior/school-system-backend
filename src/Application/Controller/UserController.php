<?php

namespace School\Application\Controller;

use Doctrine\ORM\Mapping\ClassMetadata;
use PlugRoute\Http\Request;
use School\Application\Factory\UserServiceFactory;
use School\Infrastructure\Domain\Repository\UserRepository;
use School\Infrastructure\Entities\Setup;
use School\Infrastructure\Entities\TbBanco;
use School\Infrastructure\Entities\TbTeste;
use School\Infrastructure\Persistence\EntityDataBase;

class UserController
{
	/**
	 * @var \School\Domain\User\UserService
	 */
	private $service;

	private $request;

	public function __construct(Request $request, UserServiceFactory $userServiceFactory)
	{
		$this->service = $userServiceFactory->create();
		$this->request = $request;
	}

	public function show()
	{
		/*$a = new UserRepository((new EntityDataBase())->getConnection(), new ClassMetadata(TbTeste::class));
		dump($a->findAll());*/
	}

	public function create()
	{
		$this->service->create();
	}

	public function update()
	{

	}

	public function delete()
	{

	}

	public function showById()
	{

	}
}
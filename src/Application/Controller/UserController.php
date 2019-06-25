<?php

namespace School\Application\Controller;

use PlugRoute\Http\Request;
use School\Infrastructure\Controller\Controller;
use School\Infrastructure\Provider\UserServiceProvider;

class UserController extends Controller
{
	/**
	 * @var \School\Domain\User\CategoryService
	 */
	private $service;

	private $request;

	public function __construct(Request $request,
								UserServiceProvider $userServiceProvider)
	{
		$this->service = $userServiceProvider->create();
		$this->request = $request;
	}

	public function show()
	{
		echo $this->json($this->service->show());
	}

	public function create()
	{
		$content 	= $this->request->all();
		$response 	= $this->service->create($content);

		echo $this->json($response);
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
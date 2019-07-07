<?php

namespace School\Application\Controller\User;

use PlugRoute\Http\Request;
use School\Infrastructure\Controller\Controller;
use School\Infrastructure\Provider\User\UserCreatorProvider;

class UserCreatorAction extends Controller
{
	protected $service;

	protected $request;

	public function __construct(Request $request,
								UserCreatorProvider $userCreatorProvider)
	{
		$this->service = $userCreatorProvider->getInstance();
		$this->request = $request;
	}

	public function createAction()
	{
		$content 	= $this->request->all();
		$response 	= $this->service->create($content);

		echo $this->json($response);
	}
}
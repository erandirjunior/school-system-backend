<?php

namespace School\Application\Controller\User;

use PlugRoute\Http\Request;
use School\Infrastructure\Controller\Controller;
use School\Infrastructure\Provider\User\UserDestroyerProvider;

class UserDestroyerAction extends Controller
{
	protected $service;

	protected $request;

	public function __construct(Request $request,
								UserDestroyerProvider $userDestroyerProvider)
	{
		$this->service = $userDestroyerProvider->getInstance();
		$this->request = $request;
	}

	public function destroyAction()
	{
		$id = $this->request->parameter('id');
		$response = $this->service->delete($id);

		echo $this->json($response);
	}
}